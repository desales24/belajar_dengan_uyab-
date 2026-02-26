<?php

namespace App\Filament\Resources\Homes\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class HomeInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                ImageEntry::make('image_1')
                    ->disk('public')
                    ->placeholder('-'),
                ImageEntry::make('image_2')
                    ->disk('public')
                    ->placeholder('-'),
                TextEntry::make('greeting')
                    ->placeholder('-'),
                TextEntry::make('introduction')
                    ->placeholder('-'),
                TextEntry::make('button_text')
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
