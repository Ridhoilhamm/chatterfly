<?php

namespace App\Livewire;

use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Login extends Component implements HasForms
{
    use LivewireAlert;
    use \Filament\Forms\Concerns\InteractsWithForms;

    public $email, $password;

    public function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('email')
                ->label('Email')
                ->email()
                ->required(),
            TextInput::make('password')
                ->label('Password')
                ->password()
                ->required(),
        ]);
    }
    public function mount()
    {
        session()->put('hideNavbar', true);
        session()->put('hideFooter', true); 
    }

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->regenerate();

            // Alert sukses login
            $this->alert('success', 'Berhasil login');

            return redirect()->route('chatterfly');
        }

        // Alert gagal login
        $this->alert('error', 'Email atau password salah');

        Notification::make()
            ->title('Login Gagal!')
            ->danger()
            ->send();
    }

    public function render()
    {
        return view('livewire.login')
            ->extends('layouts.app')

            ->section('content');
    }
}
