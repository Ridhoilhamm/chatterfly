<?php

namespace App\Filament\Resources\LaporanPostinganVideoResource\Pages;

use App\Filament\Resources\LaporanPostinganVideoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLaporanPostinganVideo extends EditRecord
{
    protected static string $resource = LaporanPostinganVideoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
