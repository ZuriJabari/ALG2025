<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsletterSubscriptionResource\Pages;
use App\Models\NewsletterSubscription;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class NewsletterSubscriptionResource extends Resource
{
    protected static ?string $model = NewsletterSubscription::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    protected static ?string $navigationGroup = 'Marketing';

    protected static ?int $navigationSort = 10;

    protected static ?string $modelLabel = 'Newsletter Subscription';

    protected static ?string $pluralModelLabel = 'Newsletter Subscriptions';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form;
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->copyable(),
                TextColumn::make('source')
                    ->badge()
                    ->sortable(),
                TextColumn::make('ip_address')
                    ->label('IP')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->label('Subscribed At')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                // add filters later if needed
            ])
            ->actions([
                // read-only
            ])
            ->bulkActions([
                // none for read-only
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNewsletterSubscriptions::route('/'),
        ];
    }
}
