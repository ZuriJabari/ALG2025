<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SessionResource\Pages;
use App\Filament\Resources\SessionResource\RelationManagers;
use App\Models\Domain\Session;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Domain\EventDay;

class SessionResource extends Resource
{
    protected static ?string $model = Session::class;

    protected static ?string $navigationGroup = 'Program';

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    protected static ?string $navigationLabel = 'Program Sessions';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Session Details')
                    ->schema([
                        Forms\Components\Select::make('event_id')
                            ->relationship('event', 'title')
                            ->required()
                            ->searchable()
                            ->reactive(),
                        Forms\Components\Select::make('day_id')
                            ->relationship('day', 'title')
                            ->label('Day')
                            ->options(function (Get $get) {
                                $eventId = $get('event_id');
                                if (! $eventId) return [];
                                return EventDay::where('event_id', $eventId)
                                    ->orderBy('ordering')
                                    ->pluck('title', 'id');
                            })
                            ->searchable(),
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->placeholder('e.g., Session I'),
                        Forms\Components\TextInput::make('theme')
                            ->placeholder('e.g., Building Together for Impact'),
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

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('event.title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('day.title')
                    ->label('Day')
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('theme')
                    ->searchable(),
                Tables\Columns\TextColumn::make('start_time')
                    ->time(),
                Tables\Columns\TextColumn::make('end_time')
                    ->time(),
                Tables\Columns\TextColumn::make('ordering')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('event')
                    ->relationship('event', 'title'),
                Tables\Filters\SelectFilter::make('day')
                    ->relationship('day', 'title'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('ordering');
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\SpeakersRelationManager::class,
            RelationManagers\ItemsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSessions::route('/'),
            'create' => Pages\CreateSession::route('/create'),
            'edit' => Pages\EditSession::route('/{record}/edit'),
        ];
    }
}
