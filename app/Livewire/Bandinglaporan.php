<?php

namespace App\Livewire;

use App\Models\Appeal;
use App\Models\Laporan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Bandinglaporan extends Component
{
    public $laporanList = [];
    public $bandingMessages = [];
    public $countLaporan;

    public function mount()
    {
        $this->laporanList = Laporan::with('post')
        ->whereHas('post', fn($q) => $q->where('user_id', Auth::id()))
        ->latest('id')
        ->get();
      
        $this->countLaporan = Laporan::whereHas('post', function ($query) {
            $query->where('user_id', Auth::id());
        })->count();
        
    
    }
    public function submitBanding($laporanId)
    {
        $this->validate([
            "bandingMessages.$laporanId" => 'required|string|min:3',
        ]);

        $laporan = Laporan::with('post')->findOrFail($laporanId);
        if ($laporan->post->user_id !== Auth::id()) {
            abort(403);
        }
        if ($laporan->appeal) {
            session()->flash('error', 'Sudah pernah ajukan banding untuk laporan ini.');
            return;
        }

        Appeal::create([
            'laporan_id' => $laporan->id,
            'user_id' => Auth::id(),
            'message' => $this->bandingMessages[$laporanId],
            'status' => 'pending',
        ]);

        session()->flash('success', 'Banding berhasil diajukan.');
        $this->bandingMessages[$laporanId] = '';
        $this->mount();
    }

    public function render()
    {
        return view('livewire.bandinglaporan')
            ->extends('layouts.app')
            ->section('content');
    }
}
