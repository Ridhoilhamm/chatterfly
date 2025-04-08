<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use App\Models\User;

class UserOverview extends Widget
{
    protected static string $view = 'filament.widgets.user-overview';

    // Gunakan public property
    public int $userCount;

    public function mount(): void
    {
        $this->userCount = User::count();
    }
}

