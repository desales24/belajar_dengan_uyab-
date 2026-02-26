<?php

namespace App\Filament\Resources\Homes\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class HomeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('image_1')
                    ->disk('public')
                    ->image(),
                FileUpload::make('image_2')
                    ->disk('public')
                    ->image(),
                TextInput::make('greeting')
                    ->default(null),
                TextInput::make('introduction')
                    ->default(null),
                TextInput::make('button_text')
                    ->default(null),
            ]);
    }
}
