<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\ChartWidget;

class UserRegistrationChart extends ChartWidget
{
    protected static ?string $heading = 'User Mendaftar';
    protected static ?string $maxHeight = '300px';
    protected static ?int $sort = 11;

    protected function getData(): array
    {
        $registrations = User::selectRaw('DATE(created_at) as date, count(*) as count')
            ->groupByRaw('DATE(created_at)')
            ->orderBy('date', 'asc')
            ->get();
        $labels = $registrations->pluck('date');
        $data = $registrations->pluck('count');

        return [
            'labels' => $labels->toArray(),
            'datasets' => [
                [
                    'label' => 'User Mendaftar',
                    'data' => $data->toArray(),
                    'backgroundColor' => 'rgba(75, 192, 75, 0.2)', // Warna latar belakang hijau muda
                    'borderColor' => 'rgb(75, 192, 75)', // Warna border hijau tua
                    'borderWidth' => 1,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar'; // Jenis grafik batang
    }
}

