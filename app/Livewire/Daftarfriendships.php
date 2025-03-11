<?php

namespace App\Livewire;

use App\Models\Friendship;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Daftarfriendships extends Component
{
    use LivewireAlert;

    public $friendships = [];
    public $userId;
    public $friendshipsCount = [];
    public $pendingRequests = [];
    public $recommendedRequests = [];

    public function mount()
    {
        $this->userId = Auth::id();
        session()->put('hideNavbar', true);
        // session()->put('hideFooter', true);

        // Ambil daftar teman yang sudah berteman (approved)
        $this->friendships = User::whereIn('id', function ($query) {
            $query->select('friend_id')
                ->from('friendships')
                ->where('status', 'approved')
                ->where('user_id', $this->userId)
                ->union(
                    DB::table('friendships')
                        ->select('user_id')
                        ->where('status', 'approved')
                        ->where('friend_id', $this->userId)
                );
        })
            ->select('id', 'name', 'avatar')
            ->get();

        // Hitung jumlah teman berdasarkan user_id
        $this->friendshipsCount = Friendship::where('status', 'approved')
            ->where(function ($query) {
                $query->where('user_id', $this->userId)
                    ->orWhere('friend_id', $this->userId);
            })
            ->count();

        // Ambil permintaan pertemanan yang masih pending
        $this->pendingRequests = User::whereIn('id', function ($query) {
            $query->select('user_id')
                ->from('friendships')
                ->where('status', 'pending')
                ->where('friend_id', $this->userId);
        })
            ->select('id', 'name', 'avatar')
            ->get();

        // Ambil mutual friends untuk setiap pending request
        foreach ($this->pendingRequests as $request) {
            $request->mutualFriends = $this->getMutualFriends($request->id);
        }

        // Dapatkan rekomendasi teman
        $this->recommendedRequests = $this->friendsOfFriendsRequests();
    }

    public function getMutualFriends($userId)
    {
        // Ambil semua teman dari user yang login
        $authUserFriends = Friendship::where('status', 'approved')
            ->where(function ($query) {
                $query->where('user_id', $this->userId)
                    ->orWhere('friend_id', $this->userId);
            })
            ->get()
            ->map(function ($friendship) {
                return $friendship->user_id == auth()->id() ? $friendship->friend_id : $friendship->user_id;
            })
            ->toArray();

        // Debug apakah teman user login sudah benar
        // dd($authUserFriends);

        // Ambil semua teman dari pengguna lain yang mengirim permintaan pertemanan
        $otherUserFriends = Friendship::where('status', 'approved')
            ->where(function ($query) use ($userId) {
                $query->where('user_id', $userId)
                    ->orWhere('friend_id', $userId);
            })
            ->get()
            ->map(function ($friendship) use ($userId) {
                return $friendship->user_id == $userId ? $friendship->friend_id : $friendship->user_id;
            })
            ->toArray();

        // Debug apakah teman user lain sudah benar
        // dd($otherUserFriends);

        // Cari teman yang sama (mutual)
        $mutualFriendIds = array_intersect($authUserFriends, $otherUserFriends);

        // Debug apakah ada mutual friends
        // dd($mutualFriendIds);

        // Ambil data user dari mutual friends
        return User::whereIn('id', $mutualFriendIds)
            ->select('id', 'name', 'avatar')
            ->get();
    }


    public function friendsOfFriendsRequests()
    {
        // Ambil semua teman langsung dari user yang login
        $friendIds = Friendship::where(function ($query) {
            $query->where('user_id', $this->userId)
                ->orWhere('friend_id', $this->userId);
        })
            ->where('status', 'approved')
            ->pluck('friend_id')
            ->toArray();

        // Ambil semua pengguna yang mengirim permintaan ke user (status pending)
        $pendingRequestIds = Friendship::where('friend_id', $this->userId)
            ->where('status', 'pending')
            ->pluck('user_id')
            ->toArray();

        // Cek apakah pengirim permintaan berteman dengan salah satu teman kita (dan sudah "approved")
        $recommendedRequests = Friendship::whereIn('user_id', $pendingRequestIds)
            ->whereIn('friend_id', $friendIds)
            ->where('status', 'approved')
            ->pluck('user_id')
            ->unique()
            ->toArray();

        return User::whereIn('id', $recommendedRequests)->select('id', 'name', 'avatar')->get();
    }
    public function acceptRequest($requestId)
    {
        $updated = Friendship::where('user_id', $requestId)
            ->where('friend_id', $this->userId)
            ->where('status', 'pending')
            ->update(['status' => 'approved']);

        if ($updated) {
            $this->alert('success', 'Permintaan pertemanan diterima!');
            $this->mount();
        } else {
            $this->alert('error', 'Permintaan tidak ditemukan atau sudah diproses.');
        }
    }

    public function rejectRequest($requestId)
    {
        $deleted = Friendship::where('user_id', $requestId)
            ->where('friend_id', $this->userId)
            ->where('status', 'pending')
            ->delete();

        if ($deleted) {
            $this->alert('error', 'Permintaan pertemanan ditolak!');
            $this->mount(); // Refresh data
        } else {
            $this->alert('error', 'Permintaan tidak ditemukan atau sudah diproses.');
        }
    }

    public function render()
    {
        return view('livewire.daftarfriendships', [
            'friendshipStatus' => $this->friendshipsCount,
            'userId' => $this->userId,
            'pendingRequests' => $this->pendingRequests,
            'recommendedRequests' => $this->recommendedRequests,
        ]);
    }
}
