<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PenyakitResource\Pages;
use App\Models\Penyakit;
use Filament\Forms;
use Filament\Forms\Components\TextInput; // Import TextInput
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PenyakitResource extends Resource
{
    protected static ?string $model = Penyakit::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                // Tidak perlu kolom 'penyakit_id' karena itu adalah primary key yang otomatis
                TextInput::make('kode') // Nama field sesuai dengan database
                    ->label('Kode')
                    ->required(),

                TextInput::make('nama')
                    ->label('Nama Penyakit')
                    ->required(),

                TextInput::make('solusi')
                    ->label('Solusi')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Menghapus kolom 'penyakit_id' karena itu adalah primary key
                Tables\Columns\TextColumn::make('kode')->label('Kode'),
                Tables\Columns\TextColumn::make('nama')->label('Nama Penyakit'),
                Tables\Columns\TextColumn::make('solusi')->label('Solusi'),
            ])
            ->filters([
                // Tambahkan filter jika diperlukan
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
            // Definisikan relasi jika diperlukan
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPenyakits::route('/'),
            'create' => Pages\CreatePenyakit::route('/create'),
            'edit' => Pages\EditPenyakit::route('/{record}/edit'),
        ];
    }
}
