<?php

namespace App\Filament\Resources\BandingLaporanUserResource\Pages;

use App\Filament\Resources\BandingLaporanUserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBandingLaporanUsers extends ListRecords
{
    protected static string $resource = BandingLaporanUserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
