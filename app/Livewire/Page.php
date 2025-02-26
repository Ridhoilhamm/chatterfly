<?php

namespace App\Livewire;

use App\Models\banners;
use App\Models\postingan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class Page extends Component
{
    public $users;
    public $rekomendasi;
    public $selebritis; 
    public $selectedUserId;
    public $query = '';

    public function mount()
    {
        session()->put('hideNavbar', true);
        session()->put('hideFooter', true); 
        $this->users = User::where('id', '!=', Auth::id())->get();
    }

    public function selectUser($userId)
    {
        return Redirect::route('detailpengguna', ['userId' => $userId]);
    }
    public function searchUser()
    {
        if (strlen($this->query) > 0) {
            $this->users = User::where('name', 'LIKE', '%' . $this->query . '%')->get();
        } else {
            $this->users = [];
        }
        
    
    }


    public function render()
    {
        $users = Auth::user();
        $banners = banners::all();
        $rekomendasi=user::all();
        $selebritis=user::all();
       
        $users = User::where('name', 'LIKE', '%'.$this->query.'%')->get();
        return view('livewire.page',compact('users','banners','rekomendasi','selebritis'))
        ->extends('layouts.app')
        ->section('content');
    }
}
