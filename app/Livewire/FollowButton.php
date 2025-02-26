<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FollowButton extends Component
{

    public $user;
    public $isFollowing;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->isFollowing = Auth::user()->isFollowing($this->user);
    }

    public function toggleFollow()
    {
        $authUser = Auth::user();

        if ($this->isFollowing) {
            $authUser->following()->detach($this->user->id);
        } else {
            $authUser->following()->attach($this->user->id);
        }

        $this->isFollowing = !$this->isFollowing;
    }
    public function render()
    {
        return view('livewire.follow-button');
    }
}
