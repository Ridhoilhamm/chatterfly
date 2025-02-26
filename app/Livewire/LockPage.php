<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class LockPage extends Component
{

    use LivewireAlert;

    public $name, $email, $bio, $alamat, $oldPassword, $newPassword, $confirmPassword, $pin;

    public function mount()
    {
        session()->put('hideNavbar', true);
        session()->forget('hideFooter'); //
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->bio = $user->bio;
        $this->alamat = $user->alamat;
    }


    public function updateProfile()
    {
        $user = Auth::user();
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'bio' => 'nullable|string',
            'alamat' => 'nullable|string',
        ]);

        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'bio' => $this->bio,
            'alamat' => $this->alamat,
        ]);

        $this->alert('success', 'Berhasil Update Informasi Pribadi');
        return redirect()->route('bio');
        
    }


    public function updatePassword()
    {
        $user = Auth::user();

        $this->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required|min:6',
            'confirmPassword' => 'required|same:newPassword',
        ], [
            'oldPassword.required' => 'Password lama harus diisi.',
            'newPassword.required' => 'Password baru harus diisi.',
            'newPassword.min' => 'Password baru minimal 6 karakter.',
            'confirmPassword.required' => 'Konfirmasi password harus diisi.',
            'confirmPassword.same' => 'Konfirmasi password tidak cocok dengan password baru.',
        ]);

        if (!Hash::check($this->oldPassword, $user->password)) {
            session()->flash('error', 'Password lama salah!');
            return;
        }

        $user->update([
            'password' => Hash::make($this->newPassword),
        ]);

        // Reset form
        $this->reset(['oldPassword', 'newPassword', 'confirmPassword']);

        session()->flash('message', 'Password berhasil diubah!');
    }

    public function sendResetLink()
    {
        $this->validate([
            'email' => 'required|email'
        ]);

        $status = Password::sendResetLink(['email' => $this->email]);

        if ($status === Password::RESET_LINK_SENT) {
            session()->flash('message', 'Link reset password telah dikirim!');
        } else {
            session()->flash('error', 'Email tidak ditemukan.');
        }
    }
    
    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect('/login');
    }

    

    public function savePin()
    {
        $this->validate([
            'pin' => 'required|numeric|digits:6', // Validasi agar PIN hanya angka dan 6 digit
        ]);

        $user = Auth::user();
        $user->pin = $this->pin;
        $user->save();

        session()->flash('message', 'PIN berhasil disimpan.');
        $this->reset('pin'); // Reset input setelah berhasil
    }
    
    public function render()
    {   
        
        return view('livewire.lock-page',[
            'user' => Auth::user()
        ])
        ->extends('layouts.app')
        ->section('content');
    }
}
