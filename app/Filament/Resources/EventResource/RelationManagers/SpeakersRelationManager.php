<?php

namespace App\Filament\Resources\EventResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class SpeakersRelationManager extends RelationManager
{
    protected static string $relationship = 'speakers';

    protected static ?string $title = 'Speakers';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('pivot.role')
                    ->label('Speaker Category (this event)')
                    ->maxLength(255),
                Forms\Components\TextInput::make('pivot.ordering')
                    ->numeric()
                    ->default(0),
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
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('title')->limit(40),
                Tables\Columns\TextColumn::make('company')->limit(30),
                Tables\Columns\BadgeColumn::make('pivot.role')->label('Category'),
                Tables\Columns\TextColumn::make('pivot.ordering')->label('Order')->sortable(),
            ])
            ->headerActions([
                Tables\Actions\AttachAction::make()
                    ->preloadRecordSelect()
                    ->recordSelectSearchColumns(['name','title','company'])
                    ->form([
                        Forms\Components\TextInput::make('role')->label('Speaker Category (this event)'),
                        Forms\Components\TextInput::make('ordering')->numeric()->default(0),
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DetachAction::make(),
            ])
            ->reorderable('pivot.ordering')
            ->defaultSort('pivot.ordering');
    }
}
