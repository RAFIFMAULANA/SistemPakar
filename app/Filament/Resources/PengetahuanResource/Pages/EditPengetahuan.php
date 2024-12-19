<?php

namespace App\Filament\Resources\PengetahuanResource\Pages;

use App\Filament\Resources\PengetahuanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPengetahuan extends EditRecord
{
    protected static string $resource = PengetahuanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}