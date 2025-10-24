<?php

namespace App\Filament\Resources\SessionResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class SpeakersRelationManager extends RelationManager
{
    protected static string $relationship = 'speakers';

    protected static ?string $title = 'Session Speakers';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('pivot.role')->label('Role')->maxLength(255),
                Forms\Components\TextInput::make('pivot.ordering')->numeric()->default(0),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\ImageColumn::make('headshot')
                    ->getStateUsing(fn ($record) => $record->getFirstMediaUrl('headshot'))
                    ->circular(),
                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('title')->limit(40),
                Tables\Columns\TextColumn::make('company')->limit(40),
                Tables\Columns\BadgeColumn::make('pivot.role')->label('Role'),
                Tables\Columns\TextColumn::make('pivot.ordering')
                    ->label('Order')
                    ->sortable(query: function (Builder $query, string $direction): Builder {
                        return $query->orderBy('session_speaker.ordering', $direction);
                    }),
            ])
            ->headerActions([
                Tables\Actions\AttachAction::make()
                    ->preloadRecordSelect()
                    ->recordSelectSearchColumns(['name','title','company'])
                    ->form([
                        Forms\Components\TextInput::make('role')->label('Role'),
                        Forms\Components\TextInput::make('ordering')->numeric()->default(0),
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DetachAction::make(),
            ])
            ->reorderable('session_speaker.ordering')
            ->defaultSort('session_speaker.ordering');
    }
}
