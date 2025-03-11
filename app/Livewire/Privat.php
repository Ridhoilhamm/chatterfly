<?php

namespace App\Livewire;

use Livewire\Component;

class Privat extends Component
{

    public function mount()
    {
        session()->put('hideNavbar', true);
        session()->forget('hideFooter');

    }
    public function render()
    {
        return view('livewire.privat')
        ->extends('layouts.app')->section('content');
    }
}
