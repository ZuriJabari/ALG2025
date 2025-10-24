<?php

namespace App\Filament\Resources\SessionResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class ItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'items';

    protected static ?string $title = 'Session Items';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(2)->schema([
                    Forms\Components\TextInput::make('title')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('subtitle')
                        ->maxLength(255),
                    Forms\Components\Textarea::make('description')
                        ->rows(4)
                        ->columnSpanFull(),
                    Forms\Components\Select::make('moderator_id')
                        ->relationship('moderator', 'name')
                        ->label('Moderator')
                        ->searchable(),
                    Forms\Components\TextInput::make('ordering')
                        ->numeric()
                        ->default(0),
                ]),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('subtitle')->limit(40),
                Tables\Columns\TextColumn::make('moderator.name')->label('Moderator'),
                Tables\Columns\TextColumn::make('ordering')->sortable(),
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
