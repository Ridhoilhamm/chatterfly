<?php

namespace App\Filament\Widgets;

use App\Models\Laporan;
use App\Models\LaporanVideo;
use Filament\Widgets\Widget;

class totalLaporan extends Widget
{
    protected static string $view = 'filament.widgets.total-laporan';

    public int $userCount;
    public int $laporanvideo;

    public function mount(): void   
    {
        $this->userCount = Laporan::count();
        $this->laporanvideo = LaporanVideo::count();
    }
}
