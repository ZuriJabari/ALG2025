<?php
namespace App\Filament\Resources;

use App\Filament\Resources\SeatReservationResource\Pages;
use App\Mail\AttendanceConfirmationRequest;
use App\Models\SeatReservation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

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
            Forms\Components\Radio::make('is_fellow')
                ->label('Are you a fellow?')
                ->options(['1' => 'Yes', '0' => 'No'])
                ->inline()
                ->default('0')
                ->required(),
            Forms\Components\Select::make('fellowship')
                ->options([
                    'YELP' => 'YELP',
                    'HUDUMA' => 'HUDUMA',
                    'The Griot Fellowship' => 'The Griot Fellowship',
                ])
                ->visible(fn (\Filament\Forms\Get $get) => $get('is_fellow') === '1')
                ->required(fn (\Filament\Forms\Get $get) => $get('is_fellow') === '1'),
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
                Tables\Columns\IconColumn::make('is_fellow')->boolean()->label('Fellow'),
                Tables\Columns\TextColumn::make('fellowship')->label('Fellowship'),
                Tables\Columns\TextColumn::make('attendance_mode')
                    ->label('Attendance')
                    ->formatStateUsing(function ($state) {
                        return match ($state) {
                            'physical' => 'In person',
                            'virtual' => 'Virtual',
                            default => null,
                        };
                    })
                    ->badge()
                    ->colors([
                        'success' => 'physical',
                        'info' => 'virtual',
                    ]),
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
                Tables\Actions\BulkAction::make('sendAttendanceEmail')
                    ->label('Send attendance email')
                    ->icon('heroicon-o-envelope')
                    ->color('primary')
                    ->requiresConfirmation()
                    ->action(function (Collection $records): void {
                        foreach ($records as $reservation) {
                            if (! $reservation->attendance_token) {
                                $reservation->attendance_token = (string) Str::uuid();
                                $reservation->save();
                            }

                            $url = URL::route('attendance.show', ['t' => $reservation->attendance_token]);

                            Mail::to($reservation->email)->send(
                                new AttendanceConfirmationRequest($reservation->full_name, $url)
                            );
                        }
                    }),
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
