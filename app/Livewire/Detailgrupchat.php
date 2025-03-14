<?php

namespace App\Livewire;

use Livewire\Component;

class Detailgrupchat extends Component
{

    public function mount()
    {
        session()->put('hideNavbar', true);
        session()->put('hideFooter', true); 
    }
    public function render()
    {
        return view('livewire.detailgrupchat')
        ->extends('layouts.app')->section('content');
    }
}
