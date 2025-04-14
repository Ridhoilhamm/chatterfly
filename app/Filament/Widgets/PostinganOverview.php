<?php

namespace App\Filament\Widgets;

use App\Models\post_foto;
use App\Models\PostFoto; // ganti dengan model yang kamu pakai
use Filament\Widgets\Widget;

class PostinganOverview extends Widget
{
    protected static string $view = 'filament.widgets.postingan-overview';

    public $totalPostingan;

    public function mount(): void
    {
        $this->totalPostingan = post_foto::count(); // atau Post::count()
    }
}
