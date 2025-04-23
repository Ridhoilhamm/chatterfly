<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use App\Models\User;

class Gender extends Widget
{
    protected static string $view = 'filament.widgets.gender';


    public $perempuanCount;
    public $laki_lakiCount;

    public function mount(): void
    {
        $this->perempuanCount = User::where('jenis_kelamin', 'perempuan')->count();
        $this->laki_lakiCount = User::where('jenis_kelamin', 'laki-laki')->count();
    }
}
