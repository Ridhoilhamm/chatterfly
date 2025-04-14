<?php

namespace App\Livewire;

use App\Models\Laporan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LaporkanPostingan extends Component
{
    public $postId;
    public $reason;

    protected $rules = [
        'reason' => 'required|string|max:1000',
    ];

    public function submit()
    {
        $this->validate();

        Laporan::create([
            'user_id' => Auth::id(),
            'post_id' => $this->postId,
            'reason' => $this->reason,
            'status' => 'pending',
        ]);

        $this->reset('reason');
        session()->flash('success', 'Postingan berhasil dilaporkan.');
    }

    public function render()
    {
        return view('livewire.laporkan-postingan');
    }
}
