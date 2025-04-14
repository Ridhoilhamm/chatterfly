<?php

namespace App\Filament\Resources\LaporanPostinganResource\Pages;

use App\Filament\Resources\LaporanPostinganResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLaporanPostingans extends ListRecords
{
    protected static string $resource = LaporanPostinganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
