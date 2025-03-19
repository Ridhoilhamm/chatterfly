<?php

namespace App\Livewire;

use Livewire\Component;

class Anggotagrup extends Component
{
    public function mount()
    {
        session()->put('hideNavbar', true);
        session()->put('hideFooter', true); 
    }
    public function render()
    {
        return view('livewire.anggotagrup')
        ->extends('layouts.app')->section('content');
    }
}
