<?php

namespace App\Livewire;

use App\Models\Banners;
use App\Models\Friendship;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class Page extends Component
{
    public $users = [];
    public $rekomendasi;
    public $selebritis;
    public $selectedUserId;
    public $query = '';

    public function mount()
    {
        session()->put('hideNavbar', true);
        session()->put('hideFooter', true);

        // Ambil user yang bukan diri sendiri
        $this->users = User::where('id', '!=', Auth::id())->take(10)->get();
        $this->rekomendasi = User::take(10)->get();
        $this->selebritis = User::take(3)->get();
    }

    public function selectUser($userId)
    {
        return Redirect::route('detailpengguna', ['userId' => $userId]);
    }

    public function searchUser()
    {
        if (!empty($this->query)) {
            $this->users = User::where('name', 'LIKE', '%' . $this->query . '%')
                ->take(10) // Batasi jumlah pencarian
                ->get();
        } else {
            $this->users = User::where('id', '!=', Auth::id())->take(10)->get();
        }
    }

    public function render()
    {
        return view('livewire.page', [
            'banners' => Banners::take(10)->get(),
        ])->extends('layouts.app')->section('content');
    }
}
