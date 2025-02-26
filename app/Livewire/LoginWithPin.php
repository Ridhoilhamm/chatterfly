<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\User;

class LoginWithPin extends Component
{
    public $pinArray = ['', '', '', '', '', ''];

    public function updatePin($index, $value)
    {
        $this->pinArray[$index] = $value;
    }

    public function getPinProperty()
    {
        return implode('', $this->pinArray);
    }
    
    public function login()
    {
        $this->validate([
            'pinArray.*' => 'required|digits:1',
        ]);

        $pin = $this->pin;

        if (strlen($pin) !== 6 || !ctype_digit($pin)) {
            session()->flash('error', 'PIN harus terdiri dari 6 angka!');
            return;
        }

        $user = User::where('pin', $pin)->first();

        if ($user) {
            Auth::login($user);
            session()->regenerate();
            return redirect()->route('private');
        }

        session()->flash('error', 'PIN salah!');
    }

    public function render()
    {
        return view('livewire.login-with-pin')->extends('layouts.app')->section('content');
    }
}
