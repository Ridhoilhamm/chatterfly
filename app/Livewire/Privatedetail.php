<?php

namespace App\Livewire;

use Livewire\Component;

class Privatedetail extends Component
{
    public function render()
    {
        return view('livewire.privatedetail')->extends('layouts.app')->section('content');
    }
}
