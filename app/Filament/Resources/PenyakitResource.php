<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PenyakitResource\Pages;
use App\Filament\Resources\PenyakitResource\RelationManagers;
use App\Models\Penyakit;
use Filament\Forms;
use Filament\Forms\Components\TextInput; // Import TextInput
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PenyakitResource extends Resource
{
    protected static ?string $model = Penyakit::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
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
                Tables\Columns\TextColumn::make('kode')->label('Kode'),
                Tables\Columns\TextColumn::make('nama')->label('Nama Penyakit'),
                Tables\Columns\TextColumn::make('solusi')->label('Solusi'),
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
            'index' => Pages\ListPenyakits::route('/'),
            'create' => Pages\CreatePenyakit::route('/create'),
            'edit' => Pages\EditPenyakit::route('/{record}/edit'),
        ];
    }
}
