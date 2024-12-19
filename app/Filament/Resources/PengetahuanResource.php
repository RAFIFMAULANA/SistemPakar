<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengetahuanResource\Pages;
use App\Models\Pengetahuan;
use App\Models\Penyakit;
use App\Models\Gejala;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class PengetahuanResource extends Resource
{
    protected static ?string $model = Pengetahuan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Dropdown untuk memilih Penyakit
                Select::make('penyakit_id') // Gunakan penyakit_id untuk relasi
                    ->label('Penyakit')
                    ->options(Penyakit::all()->pluck('nama', 'penyakit_id')) // Ambil data penyakit
                    ->required(),

                // Dropdown untuk memilih Gejala
                Select::make('gejala_id') // Gunakan gejala_id untuk relasi
                    ->label('Gejala')
                    ->options(Gejala::all()->pluck('gejala', 'gejala_id')) // Ambil data gejala
                    ->required(),

                // Input untuk densitas
                TextInput::make('densitas')
                    ->label('Densitas')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('penyakit.nama')->label('Penyakit'),
                Tables\Columns\TextColumn::make('gejala.gejala')->label('Gejala'),
                Tables\Columns\TextColumn::make('densitas')->label('Densitas'),
            ])
            ->query(Pengetahuan::with(['penyakit', 'gejala'])) // Eager loading untuk memuat relasi
            ->filters([/* your filters */])
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
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
            'index' => Pages\ListPengetahuans::route('/'),
            'create' => Pages\CreatePengetahuan::route('/create'),
            'edit' => Pages\EditPengetahuan::route('/{record}/edit'),
        ];
    }
}
