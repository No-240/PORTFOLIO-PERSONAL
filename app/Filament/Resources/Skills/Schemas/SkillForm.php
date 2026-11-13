<?php

namespace App\Filament\Resources\Skills\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SkillForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Skill')
                    ->required()
                    ->maxLength(255),

                TextInput::make('category')
                    ->label('Kategori')
                    ->placeholder('Contoh: Web, Mobile, Database')
                    ->maxLength(255),

                FileUpload::make('icon')
                    ->label('Logo / Ikon')
                    ->image()
                    ->disk('public')
                    ->directory('skills')
                    ->visibility('public')
                    ->helperText('Disarankan PNG/SVG persegi dengan latar transparan.')
                    ->columnSpanFull(),

                TextInput::make('level')
                    ->label('Level (0-100)')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100)
                    ->default(80)
                    ->helperText('Dasar sekitar 55-60, Menengah sekitar 70-75.'),

                TextInput::make('sort_order')
                    ->label('Urutan')
                    ->required()
                    ->numeric()
                    ->default(0)
                    ->helperText('Angka kecil tampil lebih dulu.'),
            ]);
    }
}