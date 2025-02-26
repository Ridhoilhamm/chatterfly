<?php

namespace App\Livewire;

use Livewire\Component;

class Group extends Component
{
    public function render()
    {
        return view('livewire.group')
        ->extends('layouts.app')->section('content');
    }
}
