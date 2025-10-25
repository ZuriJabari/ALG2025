<?php
namespace App\Filament\Resources;

use App\Filament\Resources\SeatReservationResource\Pages;
use App\Models\SeatReservation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Tables\Actions\Action;

class SeatReservationResource extends Resource
{
    protected static ?string $model = SeatReservation::class;

    protected static ?string $navigationIcon = 'heroicon-o-ticket';
    protected static ?string $navigationLabel = 'Seat Reservations';
    protected static ?string $pluralModelLabel = 'Seat Reservations';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('full_name')->required(),
            Forms\Components\Select::make('sector')->options([
                'Media' => 'Media',
                'Public/Government' => 'Public/Government',
                'Corporate' => 'Corporate',
                'Business' => 'Business',
                'Civil Society' => 'Civil Society',
            ])->required(),
            Forms\Components\TextInput::make('email')->email()->required(),
            Forms\Components\TextInput::make('phone'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('full_name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('sector')->sortable(),
                Tables\Columns\TextColumn::make('email')->searchable(),
                Tables\Columns\TextColumn::make('phone')->searchable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->filters([])
            ->headerActions([
                Action::make('exportCsv')
                    ->label('Export CSV')
                    ->url(fn () => route('admin.export.seat-reservations'))
                    ->openUrlInNewTab()
                    ->color('success'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSeatReservations::route('/'),
        ];
    }
}
