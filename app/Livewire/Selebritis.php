<?php

namespace App\Livewire;

use Livewire\Component;

class Selebritis extends Component
{
    public function render()
    {
        return view('livewire.selebritis')
        ->extends('layouts.app')->section('content');
    }
}
