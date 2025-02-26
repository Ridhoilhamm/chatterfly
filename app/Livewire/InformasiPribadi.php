<?php

namespace App\Livewire;

use Livewire\Component;

class InformasiPribadi extends Component
{


    public function mount()
    {
        session()->put('hideNavbar', true);
        session()->put('hideFooter', true); 
    }

    public function render()
    {
        return view('livewire.informasi-pribadi')
        ->extends('layouts.app')
        ->section('content');
    }
}
