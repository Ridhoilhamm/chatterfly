<?php

namespace App\Livewire;

use Livewire\Component;

class LockPage extends Component
{
    public function render()
    {   
        return view('livewire.lock-page')
        ->extends('layouts.app')
        ->section('content');
    }
}
