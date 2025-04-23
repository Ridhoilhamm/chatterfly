<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class LoginWithPin extends Component
{

    use LivewireAlert;
    public $pinArray = ['', '', '', '', '', ''];
    public $email, $newPin, $confirmPin;


    public function mount()
    {
        session()->put('hideNavbar', true);
        session()->put('hideFooter', true);
    }

    public function updatePin($index, $value)
    {
        $this->pinArray[$index] = $value;
        $this->checkPinCompletion();
    }

    protected $rules = [
        'email' => 'required|email|exists:users,email',
        'newPin' => 'required|digits:6',
        'confirmPin' => 'required|same:newPin',
    ];

    public function sendResetLink()
    {
        $this->validate();

        $user = User::where('email', $this->email)->first();

        if (!$user) {
            session()->flash('error', 'Email tidak ditemukan!');
            return;
        }

        $user->pin = $this->newPin;
        $user->save();

        $this->alert('success', 'Pin Berhasil Diperbarui');

        $this->reset(['email', 'newPin', 'confirmPin']);
    }


    public function getPinProperty()
    {
        return implode('', $this->pinArray);
    }

    public function checkPinCompletion()
    {
        $pin = implode('', $this->pinArray);

        if (strlen($pin) === 6) {
            $this->alert('success', 'Berhasil Login');
            $this->login($pin);
        }
    }

    public function login($pin)
    {
        $this->validate([
            'pinArray.*' => 'required|digits:1',
        ]);

        if (strlen($pin) !== 6 || !ctype_digit($pin)) {
            session()->flash('error', 'PIN harus terdiri dari 6 angka!');
            $this->reset('pinArray');
            return;
        }

        $user = User::where('pin', $pin)->first();
        if ($user) {
            Auth::login($user);
            session()->regenerate();
            $this->alert('success', 'Berhasil Login');
            return redirect('/chatterfly');

        }

        $this->alert('error', 'PIN yang Anda masukkan salah!');
        $this->reset('pinArray');
    }


    public function render()
    {
        return view('livewire.login-with-pin')->extends('layouts.app')->section('content');
    }
}
