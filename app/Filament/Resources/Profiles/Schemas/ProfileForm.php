<?php

namespace App\Filament\Resources\Profiles\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;   
use Filament\Forms\Components\FileUpload;

class ProfileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('headline')
                    ->required(),
                Textarea::make('hero_description')
                    ->label('Deskripsi Hero (singkat)')
                    ->rows(3)
                    ->maxLength(200)
                    ->columnSpanFull(),
                FileUpload::make('photo')
                    ->image()
                    ->disk('public')
                    ->directory('profiles'),
                FileUpload::make('about_photo')
                    ->label('Foto Tentang Saya')
                    ->image()
                    ->disk('public')
                    ->directory('profiles'),
                Textarea::make('about')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->default(null),
                TextInput::make('github_url')
                    ->url()
                    ->default(null),
                TextInput::make('linkedin_url')
                    ->url()
                    ->default(null),
            ]);
    }
}
