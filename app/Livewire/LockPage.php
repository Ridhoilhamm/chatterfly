<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LockPage extends Component
{

    public function render()
    {   
        
        return view('livewire.lock-page',[
            'user' => Auth::user()
        ])
        ->extends('layouts.app')
        ->section('content');
    }
}
