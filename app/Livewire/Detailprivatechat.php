<?php

namespace App\Livewire;

use Livewire\Component;

class Detailprivatechat extends Component
{
    public function mount()
    {
        session()->put('hideNavbar', true);
        session()->put('hideFooter', true); 
    }

    public function render()
    {
        return view('livewire.detailprivatechat')
        ->extends('layouts.app')->section('content');
    }
}
