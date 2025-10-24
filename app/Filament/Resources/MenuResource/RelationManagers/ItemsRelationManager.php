<?php

namespace App\Filament\Resources\MenuResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class ItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'allItems';

    protected static ?string $title = 'Menu Items';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('label')->required()->maxLength(255),
                Forms\Components\TextInput::make('url')->label('URL')->maxLength(2048),
                Forms\Components\Select::make('parent_id')
                    ->label('Parent')
                    ->relationship(name: 'parent', titleAttribute: 'label')
                    ->searchable(),
                Forms\Components\Toggle::make('active')->default(true),
                Forms\Components\Select::make('target')
                    ->options([
                        '_self' => 'Same Tab',
                        '_blank' => 'New Tab',
                    ])->default('_self'),
                Forms\Components\TextInput::make('ordering')->numeric()->default(0),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('ordering')->label('#')->sortable(),
                Tables\Columns\TextColumn::make('label')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('url')->limit(40),
                Tables\Columns\TextColumn::make('parent.label')->label('Parent'),
                Tables\Columns\IconColumn::make('active')->boolean(),
                Tables\Columns\TextColumn::make('target')->label('Target'),
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
