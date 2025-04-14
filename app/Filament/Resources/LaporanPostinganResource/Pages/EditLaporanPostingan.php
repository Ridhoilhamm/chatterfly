<?php

namespace App\Filament\Resources\LaporanPostinganResource\Pages;

use App\Filament\Resources\LaporanPostinganResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLaporanPostingan extends EditRecord
{
    protected static string $resource = LaporanPostinganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
