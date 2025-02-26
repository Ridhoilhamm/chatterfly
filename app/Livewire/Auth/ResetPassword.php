<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Livewire\Component;

class ResetPassword extends Component
{
    public $email, $password, $password_confirmation, $token;

    public function mount($token)
    {
        $this->token = $token;
        session()->put('hideNavbar', true);
        session()->put('hideFooter', true); 

    }

    public function resetPassword()
    {
        $this->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $status = Password::reset(
            [
                'email' => $this->email,
                'password' => $this->password,
                'password_confirmation' => $this->password_confirmation,
                'token' => $this->token,
            ],
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();

                Auth::login($user);
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            session()->flash('message', 'Password berhasil direset. Anda telah login.');
            return redirect()->route('login');
        } else {
            session()->flash('error', 'Token tidak valid atau sudah kedaluwarsa.');
        }
    }
    public function render()
    {
        return view('livewire.auth.reset-password')
        ->extends('layouts.app')
        ->section('content');
    }
}
