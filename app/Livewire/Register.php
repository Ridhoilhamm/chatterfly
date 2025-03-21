<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Register extends Component
{
    public $name, $email, $password, $password_confirmation,$phone_number,$gender;

    public function register()
    {
        $this->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'phone_number' => ['required', 'numeric', 'digits_between:11,15'],
            'gender' => ['required', 'in:laki-laki,perempuan'],
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'phone_number' =>$this->phone_number,
            'gender' => $this->gender,
        ]);

        Auth::login($user);

        return redirect()->route('profile');
    }
    public function render()
    {
        return view('livewire.register')
        ->extends('layouts.app')
        ->section('content');
    }
}
