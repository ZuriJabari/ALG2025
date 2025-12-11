<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SpeakerResource\Pages;
use App\Filament\Resources\SpeakerResource\RelationManagers;
use App\Models\Domain\Speaker;
use App\Models\Domain\EventDay;
use App\Models\Domain\Event;
use App\Models\Domain\Session;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SpeakerResource extends Resource
{
    protected static ?string $model = Speaker::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'People';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Quick Event Assignment')
                    ->description('Select which events this speaker appears in. You can select multiple events.')
                    ->schema([
                        Forms\Components\CheckboxList::make('event_ids')
                            ->label('Events')
                            ->options(fn () => Event::query()->orderByDesc('year')->pluck('year','id'))
                            ->columns(4)
                            ->gridDirection('row')
                            ->required()
                            ->helperText('Select all events where this speaker appears'),
                    ])
                    ->collapsible(),
                Forms\Components\Section::make('Speaker Details')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('name')->required()->maxLength(255),
                        Forms\Components\TextInput::make('title')->maxLength(255),
                        Forms\Components\TextInput::make('company')->maxLength(255),
                        Forms\Components\Select::make('category')
                            ->label('Speaker Category')
                            ->options([
                                'Keynote' => 'Keynote',
                                'Panel' => 'Panel',
                                'Panelist' => 'Panelist',
                                'Speaker' => 'Speaker',
                                'Moderator' => 'Moderator',
                                'Host' => 'Host',
                                'Co-Host' => 'Co-Host',
                            ])
                            ->searchable()
                            ->helperText('Category determines how the speaker is displayed on the website'),
                        Forms\Components\Textarea::make('short_bio')->rows(4)->columnSpanFull(),
                        Forms\Components\Textarea::make('quote')->label('Quote / Statement')->rows(3)->columnSpanFull(),
                    ]),
                Forms\Components\Section::make('Socials & Ordering')
                    ->columns(3)
                    ->schema([
                        Forms\Components\TextInput::make('twitter')->url()->maxLength(2048),
                        Forms\Components\TextInput::make('linkedin')->url()->maxLength(2048),
                        Forms\Components\TextInput::make('website')->url()->maxLength(2048),
                        Forms\Components\TextInput::make('ordering')->numeric()->default(0),
                    ]),
                Forms\Components\Section::make('Media')
                    ->schema([
                        Forms\Components\SpatieMediaLibraryFileUpload::make('headshot')
                            ->collection('headshot')
                            ->image()
                            ->imageEditor()
                            ->label('Headshot')
                            ->columnSpanFull(),
                    ]),
                Forms\Components\Section::make('Event Appearances')
                    ->description('Assign this speaker to specific event days with a per-day category and ordering, and optionally attach to a specific session.')
                    ->schema([
                        Forms\Components\Repeater::make('appearances')
                            ->label('Appearances')
                            ->addActionLabel('Add Appearance')
                            ->columns(3)
                            ->schema([
                                Forms\Components\Select::make('event_id')
                                    ->label('Event')
                                    ->options(\App\Models\Domain\Event::query()->orderByDesc('year')->pluck('year','id'))
                                    ->searchable()
                                    ->reactive()
                                    ->required(),
                                Forms\Components\Select::make('day_id')
                                    ->label('Day')
                                    ->options(fn (callable $get) => $get('event_id')
                                        ? EventDay::query()
                                            ->where('event_id', (int) $get('event_id'))
                                            ->orderBy('ordering')
                                            ->pluck('title', 'id')
                                        : [])
                                    ->searchable()
                                    ->reactive()
                                    ->afterStateUpdated(fn ($state, callable $set) => $set('session_id', null))
                                    ->createOptionForm([
                                        Forms\Components\TextInput::make('title')->label('Day Title')->required()->maxLength(255),
                                        Forms\Components\TextInput::make('theme')->label('Day Theme')->maxLength(255),
                                        Forms\Components\TextInput::make('ordering')->numeric()->default(0),
                                    ])
                                    ->createOptionUsing(function (array $data, callable $get) {
                                        $eventId = (int) $get('event_id');
                                        $day = EventDay::create([
                                            'event_id' => $eventId,
                                            'title' => $data['title'],
                                            'theme' => $data['theme'] ?? null,
                                            'ordering' => isset($data['ordering']) ? (int) $data['ordering'] : 0,
                                        ]);
                                        return $day->getKey();
                                    })
                                    ->required(),
                                Forms\Components\TextInput::make('role')
                                    ->label('Role (this day)')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('ordering')
                                    ->numeric()
                                    ->default(0),
                                Forms\Components\Select::make('session_id')
                                    ->label('Session')
                                    ->options(fn (callable $get) => $get('day_id')
                                        ? Session::query()
                                            ->where('day_id', (int) $get('day_id'))
                                            ->orderBy('ordering')
                                            ->pluck('title', 'id')
                                        : [])
                                    ->searchable()
                                    ->reactive()
                                    ->visible(fn (callable $get) => (bool) $get('day_id'))
                                    ->required()
                                    ->createOptionForm([
                                        Forms\Components\TextInput::make('title')->label('Session Title')->required()->maxLength(255),
                                        Forms\Components\TextInput::make('theme')->label('Session Theme')->maxLength(255),
                                        Forms\Components\TimePicker::make('start_time')->label('Start Time')->seconds(false),
                                        Forms\Components\TimePicker::make('end_time')->label('End Time')->seconds(false),
                                        Forms\Components\TextInput::make('ordering')->numeric()->default(0),
                                    ])
                                    ->createOptionUsing(function (array $data, callable $get) {
                                        $dayId = (int) $get('day_id');
                                        $day = EventDay::find($dayId);
                                        $session = Session::create([
                                            'event_id' => $day?->event_id,
                                            'day_id' => $dayId,
                                            'title' => $data['title'],
                                            'theme' => $data['theme'] ?? null,
                                            'start_time' => isset($data['start_time']) && $data['start_time'] ? $data['start_time'] . ':00' : '09:00:00',
                                            'end_time' => isset($data['end_time']) && $data['end_time'] ? $data['end_time'] . ':00' : '10:00:00',
                                            'ordering' => isset($data['ordering']) ? (int) $data['ordering'] : 0,
                                        ]);
                                        return $session->getKey();
                                    })
                                    ->columnSpanFull(),
                                Forms\Components\TextInput::make('session_role')
                                    ->label('Role (this session)')
                                    ->maxLength(255),
                            ])
                            ->default([])
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('headshot')
                    ->label('')
                    ->getStateUsing(fn ($record) => $record->getFirstMediaUrl('headshot'))
                    ->circular(),
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('title')->limit(30),
                Tables\Columns\TextColumn::make('company')->limit(30),
                Tables\Columns\BadgeColumn::make('category')->colors(['teal']),
                Tables\Columns\TextColumn::make('ordering')->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')->label('Category')
                    ->options(fn () => Speaker::query()->whereNotNull('category')->distinct()->pluck('category','category')->toArray()),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Attach to events via EventResource relation manager
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSpeakers::route('/'),
            'edit' => Pages\EditSpeaker::route('/{record}/edit'),
        ];
    }
}
