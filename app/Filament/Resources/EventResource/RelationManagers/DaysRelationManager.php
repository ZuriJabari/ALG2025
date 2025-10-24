<?php

namespace App\Filament\Resources\EventResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class DaysRelationManager extends RelationManager
{
    protected static string $relationship = 'days';

    protected static ?string $title = 'Days';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->label('Day Title')->maxLength(255),
                Forms\Components\TextInput::make('theme')->label('Theme')->maxLength(255),
                Forms\Components\TextInput::make('date_text')->label('Date (text)')->maxLength(255),
                Forms\Components\DatePicker::make('date')->label('Date (optional)'),
                Forms\Components\TextInput::make('ordering')->numeric()->default(0),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('ordering')->sortable()->label('#'),
                Tables\Columns\TextColumn::make('title')->label('Title')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('theme')->label('Theme')->limit(40),
                Tables\Columns\TextColumn::make('date_text')
                    ->label('Date')
                    ->formatStateUsing(fn ($state, $record) => $state ?: ($record->date?->format('M d, Y'))),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->reorderable('ordering')
            ->defaultSort('ordering');
    }
}
