<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\FollowRequest;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FollowButton extends Component
{
    public $user;
    public $isFollowing;
    public $isRequested;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->isFollowing = Auth::user()->isFollowing($this->user);
        $this->isRequested = Auth::user()->hasSentFollowRequestTo($this->user);
    }

    public function toggleFollowRequest()
    {
        $authUser = Auth::user();

        if ($this->isRequested) {
            FollowRequest::where('follower_id', $authUser->id)
                ->where('followed_id', $this->user->id)
                ->delete();
            $this->isRequested = false;
        } else {
            FollowRequest::create([
                'follower_id' => $authUser->id,
                'followed_id' => $this->user->id,
            ]);
            $this->isRequested = true;
        }
    }

    public function acceptFollowRequest()
    {
        $authUser = Auth::user();

        if ($authUser->hasPendingFollowRequestFrom($this->user)) {
            $authUser->followers()->attach($this->user->id);
            FollowRequest::where('follower_id', $this->user->id)
                ->where('followed_id', $authUser->id)
                ->delete();
            $this->isFollowing = true;
        }
    }

    public function render()
    {
        return view('livewire.follow-button');
    }
}

