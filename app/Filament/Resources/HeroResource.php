<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeroResource\Pages;
use App\Models\Domain\Hero;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class HeroResource extends Resource
{
    protected static ?string $model = Hero::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationLabel = 'Hero Content';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Hero Details')
                    ->columns(2)
                    ->schema([
                        Forms\Components\Select::make('event_id')
                            ->label('Event (optional)')
                            ->relationship('event', 'title')
                            ->searchable(),
                        Forms\Components\TextInput::make('title')->maxLength(255),
                        Forms\Components\Textarea::make('description')->rows(3)->columnSpanFull(),
                        Forms\Components\TextInput::make('cta_label')->maxLength(255),
                        Forms\Components\TextInput::make('cta_url')->url()->maxLength(2048),
                        Forms\Components\Toggle::make('active')->default(true),
                        Forms\Components\TextInput::make('ordering')->numeric()->default(0),
                    ]),
                Forms\Components\Section::make('Media Type')
                    ->columns(2)
                    ->schema([
                        Forms\Components\Select::make('content_type')
                            ->label('Content Type')
                            ->options([
                                'image' => 'Image',
                                'video' => 'Video',
                            ])
                            ->default('image')
                            ->required()
                            ->live()
                            ->columnSpanFull(),
                        Forms\Components\Select::make('video_type')
                            ->label('Video Source')
                            ->options([
                                'youtube' => 'YouTube',
                                'vimeo' => 'Vimeo',
                                'local' => 'Local File',
                            ])
                            ->default('youtube')
                            ->visible(fn (Forms\Get $get) => $get('content_type') === 'video')
                            ->live()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('video_url')
                            ->label('Video URL')
                            ->placeholder('https://www.youtube.com/watch?v=... or https://vimeo.com/...')
                            ->maxLength(2048)
                            ->visible(fn (Forms\Get $get) => $get('content_type') === 'video' && $get('video_type') !== 'local')
                            ->columnSpanFull(),
                        Forms\Components\FileUpload::make('local_video')
                            ->label('Upload Local Video')
                            ->acceptedFileTypes(['video/mp4', 'video/webm', 'video/ogg'])
                            ->maxSize(12288) // 12MB (server limit)
                            ->disk('public')
                            ->directory('videos')
                            ->visibility('public')
                            ->storeFileNamesIn('video_url')
                            ->afterStateUpdated(function ($state, Forms\Set $set) {
                                if ($state) {
                                    $set('video_url', '/storage/videos/' . $state);
                                }
                            })
                            ->visible(fn (Forms\Get $get) => $get('content_type') === 'video' && $get('video_type') === 'local')
                            ->columnSpanFull(),
                    ]),
                Forms\Components\Section::make('Media')
                    ->schema([
                        Forms\Components\SpatieMediaLibraryFileUpload::make('hero')
                            ->collection('hero')
                            ->image()
                            ->imageEditor()
                            ->label('Hero Image')
                            ->columnSpanFull(),
                        Forms\Components\SpatieMediaLibraryFileUpload::make('pattern')
                            ->collection('pattern')
                            ->image()
                            ->imageEditor()
                            ->label('Pattern Background')
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('event.title')->label('Event')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('title')->limit(40)->searchable(),
                Tables\Columns\IconColumn::make('active')->boolean(),
                Tables\Columns\TextColumn::make('ordering')->sortable(),
                Tables\Columns\TextColumn::make('updated_at')->since()->label('Updated'),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('active')->label('Active'),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHeroes::route('/'),
            'create' => Pages\CreateHero::route('/create'),
            'edit' => Pages\EditHero::route('/{record}/edit'),
        ];
    }
}
