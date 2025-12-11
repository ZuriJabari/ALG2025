<?php
namespace App\Filament\Resources;

use App\Filament\Resources\SeatReservationResource\Pages;
use App\Mail\AttendanceConfirmationRequest;
use App\Mail\KeynoteAttendanceReminder;
use App\Mail\AfricanChampionsBreakfastInvite;
use App\Mail\GeneralALGInvite;
use App\Models\SeatReservation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
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
            ->filters([
                Tables\Filters\SelectFilter::make('fellowship')
                    ->options([
                        'YELP' => 'YELP',
                        'HUDUMA' => 'HUDUMA',
                        'The Griot Fellowship' => 'The Griot Fellowship',
                        'KAS Network' => 'KAS Network',
                        'Africa Champions Invite' => 'Africa Champions Invite',
                        'Member of Faculty' => 'Member of Faculty',
                        'Board/Management' => 'Board/Management',
                        'Partner/Affiliate' => 'Partner/Affiliate',
                    ])
                    ->label('Fellowship/Category'),
                Tables\Filters\SelectFilter::make('attendance_mode')
                    ->options([
                        'physical' => 'In Person',
                        'virtual' => 'Virtual',
                    ])
                    ->label('Attendance Mode'),
                Tables\Filters\TernaryFilter::make('attendance_token')
                    ->label('Has QR Code')
                    ->nullable()
                    ->trueLabel('Has QR Code')
                    ->falseLabel('No QR Code')
                    ->queries(
                        true: fn ($query) => $query->whereNotNull('attendance_token'),
                        false: fn ($query) => $query->whereNull('attendance_token'),
                    ),
            ])
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
                    ->successNotificationTitle('Attendance emails have been sent (one per email address).')
                    ->action(function (Collection $records): void {
                        // Ensure we only send one email per email address in this bulk run
                        $uniqueByEmail = $records->unique('email');

                        $uniqueByEmail->each(function (SeatReservation $reservation) {
                            if (! $reservation->attendance_token) {
                                $reservation->attendance_token = (string) Str::uuid();
                                $reservation->save();
                            }

                            $url = URL::route('attendance.show', ['t' => $reservation->attendance_token]);

                            try {
                                Mail::to($reservation->email)->send(
                                    new AttendanceConfirmationRequest($reservation->full_name, $url)
                                );
                            } catch (\Throwable $e) {
                                Log::warning('Attendance email failed for reservation ID '.$reservation->id.': '.$e->getMessage());
                            }
                        });
                    }),

                Tables\Actions\BulkAction::make('sendKeynoteReminderEmail')
                    ->label('Send keynote + reminder email')
                    ->icon('heroicon-o-megaphone')
                    ->color('secondary')
                    ->requiresConfirmation()
                    ->successNotificationTitle('Keynote reminder emails have been sent to attendees (one per email address).')
                    ->action(function (Collection $records): void {
                        // Ensure we only send one email per email address in this bulk run
                        $uniqueByEmail = $records->unique('email');

                        $uniqueByEmail->each(function (SeatReservation $reservation) {
                            if (! $reservation->attendance_token) {
                                $reservation->attendance_token = (string) Str::uuid();
                                $reservation->save();
                            }

                            $url = URL::route('attendance.show', ['t' => $reservation->attendance_token]);

                            try {
                                Mail::to($reservation->email)->send(
                                    new KeynoteAttendanceReminder($reservation->full_name, $url)
                                );
                            } catch (\Throwable $e) {
                                Log::warning('Keynote reminder email failed for reservation ID '.$reservation->id.': '.$e->getMessage());
                            }
                        });
                    }),

                Tables\Actions\BulkAction::make('sendAfricanChampionsEmail')
                    ->label('🎫 Send Africa Champions Breakfast Email')
                    ->icon('heroicon-o-star')
                    ->color('warning')
                    ->requiresConfirmation()
                    ->modalHeading('Send Africa Champions Breakfast Invitation')
                    ->modalDescription('This will send the Africa Champions Breakfast invitation email with QR code to the selected participants.')
                    ->successNotificationTitle('Africa Champions emails have been sent!')
                    ->action(function (Collection $records): void {
                        $uniqueByEmail = $records->unique('email');

                        $uniqueByEmail->each(function (SeatReservation $reservation) {
                            // Generate token if missing
                            if (! $reservation->attendance_token) {
                                $reservation->attendance_token = Str::random(32);
                                $reservation->save();
                            }

                            try {
                                Mail::to($reservation->email)->send(
                                    new AfricanChampionsBreakfastInvite($reservation)
                                );
                            } catch (\Throwable $e) {
                                Log::warning('Africa Champions email failed for reservation ID '.$reservation->id.': '.$e->getMessage());
                            }
                        });
                    }),

                Tables\Actions\BulkAction::make('sendGeneralALGEmail')
                    ->label('📧 Send General ALG 2025 Email')
                    ->icon('heroicon-o-envelope')
                    ->color('success')
                    ->requiresConfirmation()
                    ->modalHeading('Send General ALG 2025 Invitation')
                    ->modalDescription('This will send the general ALG 2025 invitation email with QR code to the selected participants.')
                    ->successNotificationTitle('ALG 2025 emails have been sent!')
                    ->action(function (Collection $records): void {
                        $uniqueByEmail = $records->unique('email');

                        $uniqueByEmail->each(function (SeatReservation $reservation) {
                            // Generate token if missing
                            if (! $reservation->attendance_token) {
                                $reservation->attendance_token = Str::random(32);
                                $reservation->save();
                            }

                            try {
                                Mail::to($reservation->email)->send(
                                    new GeneralALGInvite($reservation)
                                );
                            } catch (\Throwable $e) {
                                Log::warning('General ALG email failed for reservation ID '.$reservation->id.': '.$e->getMessage());
                            }
                        });
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
