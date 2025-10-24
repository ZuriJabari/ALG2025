<?php

namespace App\Filament\Resources\EventResource\RelationManagers;

use App\Models\Domain\EventDay;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class SessionsRelationManager extends RelationManager
{
    protected static string $relationship = 'sessions';

    protected static ?string $title = 'Sessions';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(2)->schema([
                    Forms\Components\TextInput::make('title')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('theme')
                        ->maxLength(255),
                    Forms\Components\Select::make('day_id')
                        ->label('Day')
                        ->options(function () {
                            $eventId = $this->getOwnerRecord()->id;
                            return EventDay::where('event_id', $eventId)
                                ->orderBy('ordering')
                                ->pluck('title', 'id');
                        })
                        ->searchable(),
                    Forms\Components\TimePicker::make('start_time')
                        ->required(),
                    Forms\Components\TimePicker::make('end_time')
                        ->required(),
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
                Tables\Columns\TextColumn::make('day.title')->label('Day')->sortable(),
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\TextColumn::make('theme')->searchable(),
                Tables\Columns\TextColumn::make('start_time')->time(),
                Tables\Columns\TextColumn::make('end_time')->time(),
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
