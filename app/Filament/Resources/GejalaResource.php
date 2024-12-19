<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GejalaResource\Pages;
use App\Models\Gejala;
use Filament\Forms;
use Filament\Forms\Components\TextInput; // Import TextInput
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class GejalaResource extends Resource
{
    protected static ?string $model = Gejala::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('kode') // Nama field sesuai dengan database
                    ->label('Kode')
                    ->required()
                    ->unique(),

                TextInput::make('gejala')
                    ->label('Gejala')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kode')->label('Kode'),
                Tables\Columns\TextColumn::make('gejala')->label('Gejala'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGejalas::route('/'),
            'create' => Pages\CreateGejala::route('/create'),
            'edit' => Pages\EditGejala::route('/{record}/edit'),
        ];
    }
}
