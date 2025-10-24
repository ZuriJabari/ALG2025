<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Models\Domain\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationLabel = 'ALG Events';
    protected static ?string $navigationGroup = 'Events';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Event Information')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('year')
                            ->label('Year (numeric)')
                            ->numeric()
                            ->minValue(1900)
                            ->maxValue(3000)
                            ->required(),
                        Forms\Components\TextInput::make('display_year')
                            ->label('Year (display text)')
                            ->placeholder('e.g., 2025 Annual Leaders Gathering')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('subtitle')
                            ->label('Theme')
                            ->maxLength(255),
                        Forms\Components\DateTimePicker::make('start_at')
                            ->label('Date & Time')
                            ->required(),
                        Forms\Components\TextInput::make('location')
                            ->label('Venue')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('hashtag')
                            ->label('Hashtag')
                            ->prefix('#')
                            ->maxLength(255),
                        Forms\Components\Toggle::make('is_featured')
                            ->label('Featured')
                            ->default(true),
                        Forms\Components\Select::make('status')
                            ->options([
                                'upcoming' => 'Upcoming',
                                'past' => 'Past',
                            ])
                            ->required(),
                    ]),

                

                Forms\Components\Section::make('Hero Media')
                    ->description('Choose between image or YouTube video for hero section')
                    ->columns(2)
                    ->schema([
                        Forms\Components\Select::make('hero_content_type')
                            ->label('Content Type')
                            ->options([
                                'image' => 'Image',
                                'youtube' => 'YouTube Video',
                            ])
                            ->default('image')
                            ->required()
                            ->live()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('hero_video_url')
                            ->label('YouTube Video URL')
                            ->placeholder('https://www.youtube.com/watch?v=...')
                            ->url()
                            ->maxLength(2048)
                            ->visible(fn (Forms\Get $get) => $get('hero_content_type') === 'youtube')
                            ->columnSpanFull(),
                    ]),

                // Inline Speakers (disabled)
                Forms\Components\Section::make('Speakers (optional)')
                    ->description('Create speakers from People → Speakers')
                    ->hidden(TRUE)
                    ->schema([
                        Forms\Components\Repeater::make('new_speakers')
                            ->label('New Speakers')
                            ->addActionLabel('Add Speaker')
                            ->columns(2)
                            ->schema([
                                Forms\Components\FileUpload::make('headshot')
                                    ->label('Headshot')
                                    ->image()
                                    ->imageEditor()
                                    ->disk('public')
                                    ->directory('tmp/headshots')
                                    ->columnSpanFull(),
                                Forms\Components\TextInput::make('name')->required()->maxLength(255),
                                Forms\Components\TextInput::make('title')->maxLength(255),
                                Forms\Components\TextInput::make('company')->maxLength(255),
                                Forms\Components\TextInput::make('category')->label('Global Category')->maxLength(255),
                                Forms\Components\TextInput::make('event_role')->label('Category (this event)')->maxLength(255),
                                Forms\Components\TextInput::make('ordering')->numeric()->default(0),
                                Forms\Components\Textarea::make('short_bio')
                                    ->label('Short Bio')
                                    ->rows(4)
                                    ->columnSpanFull(),
                                Forms\Components\TextInput::make('twitter')->url()->maxLength(2048),
                                Forms\Components\TextInput::make('linkedin')->url()->maxLength(2048),
                                Forms\Components\TextInput::make('website')->url()->maxLength(2048),
                            ])
                            ->default([])
                            ->columnSpanFull(),
                    ]),

                // Inline Days removed: handled in Speaker flow
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('year')->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->limit(40)
                    ->searchable(),
                Tables\Columns\TextColumn::make('subtitle')
                    ->label('Theme')
                    ->limit(40)
                    ->searchable(),
                Tables\Columns\TextColumn::make('start_at')
                    ->label('Date')
                    ->dateTime('M d, Y g:i A')
                    ->sortable(),
                Tables\Columns\TextColumn::make('location')
                    ->label('Venue')
                    ->limit(30),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'success' => 'upcoming',
                        'gray' => 'past',
                    ])
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'upcoming' => 'Upcoming',
                        'past' => 'Past',
                    ]),
                Tables\Filters\TernaryFilter::make('is_featured')
                    ->label('Featured'),
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
            RelationManagers\SpeakersRelationManager::class,
            RelationManagers\SessionsRelationManager::class,
            RelationManagers\FeaturesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
