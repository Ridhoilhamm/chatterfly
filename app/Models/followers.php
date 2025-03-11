<?php

namespace App\Livewire;

use App\Models\User;
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
        $this->isRequested = Auth::user()->followRequests()->where('followed_id', $this->user->id)->exists();
    }

    public function toggleFollowRequest()
    {
        $authUser = Auth::user();

        if ($this->isRequested) {
            // Batalkan permintaan follow
            $authUser->followRequests()->where('followed_id', $this->user->id)->delete();
            $this->isRequested = false;
        } else {
            // Kirim permintaan follow
            $authUser->followRequests()->create(['followed_id' => $this->user->id]);
            $this->isRequested = true;
        }
    }

    public function acceptFollowRequest()
    {
        $authUser = Auth::user();

        if ($authUser->pendingFollowRequests()->where('follower_id', $this->user->id)->exists()) {
            // Konfirmasi permintaan follow
            $authUser->followers()->attach($this->user->id);
            $authUser->pendingFollowRequests()->where('follower_id', $this->user->id)->delete();
            $this->isFollowing = true;
        }
    }

    public function render()
    {
        return view('livewire.follow-button');
    }
}
