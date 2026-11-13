<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Judul Project')
                    ->required()
                    ->maxLength(255),

                TextInput::make('demo_url')
                    ->label('Link Demo')
                    ->url()
                    ->placeholder('https://')
                    ->maxLength(255),

                Textarea::make('description')
                    ->label('Deskripsi Singkat')
                    ->required()
                    ->rows(4)
                    ->columnSpanFull(),

                FileUpload::make('image')
                    ->label('Gambar / Screenshot')
                    ->image()
                    ->disk('public')
                    ->directory('projects')
                    ->visibility('public')
                    ->helperText('Disarankan rasio 16:9 supaya tidak terpotong.')
                    ->columnSpanFull(),

                TextInput::make('repo_url')
                    ->label('Link Repository (GitHub)')
                    ->url()
                    ->placeholder('https://')
                    ->maxLength(255),

                TextInput::make('sort_order')
                    ->label('Urutan')
                    ->required()
                    ->numeric()
                    ->default(0)
                    ->helperText('Angka kecil tampil lebih dulu.'),

                Toggle::make('is_published')
                    ->label('Tampilkan di website')
                    ->default(true),
            ]);
    }
}