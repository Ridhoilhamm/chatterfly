<?php

namespace App\Filament\Widgets;

use App\Models\post_foto;
use App\Models\post_video;
use Filament\Widgets\ChartWidget;

class PostTypeChart extends ChartWidget
{
    protected static ?int $sort = 10;
    protected static ?string $heading = 'Postingan';
    protected static ?string $maxHeight = '300px';
    public static function canView(): bool
    {
        return true;
    }

    protected function getData(): array
    {
        $photoCount = post_foto::count();
        $videoCount = post_video::count();
        return [
            'datasets' => [
                [
                    'data' => [$photoCount, $videoCount],
                    'backgroundColor' => ['#3b82f6', '#10b981'],
                ],
            ],
            'labels' => ['Foto', 'Video'],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
