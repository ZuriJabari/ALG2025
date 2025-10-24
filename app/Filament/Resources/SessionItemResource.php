<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SessionItemResource\Pages;
use App\Filament\Resources\SessionItemResource\RelationManagers;
use App\Models\Domain\SessionItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SessionItemResource extends Resource
{
    protected static ?string $model = SessionItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-bar';

    protected static ?string $navigationLabel = 'Session Items';

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Item Details')
                    ->schema([
                        Forms\Components\Select::make('session_id')
                            ->relationship('session', 'title')
                            ->required()
                            ->searchable(),
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->placeholder('e.g., Opening Remarks'),
                        Forms\Components\TextInput::make('subtitle')
                            ->placeholder('e.g., Setting the Tone for the ALG 2024'),
                        Forms\Components\Textarea::make('description')
                            ->rows(3),
                        Forms\Components\Select::make('moderator_id')
                            ->relationship('moderator', 'name')
                            ->searchable()
                            ->label('Moderator'),
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
                Tables\Columns\TextColumn::make('session.title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('moderator.name')
                    ->label('Moderator'),
                Tables\Columns\TextColumn::make('ordering')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('session')
                    ->relationship('session', 'title'),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSessionItems::route('/'),
            'create' => Pages\CreateSessionItem::route('/create'),
            'edit' => Pages\EditSessionItem::route('/{record}/edit'),
        ];
    }
}
