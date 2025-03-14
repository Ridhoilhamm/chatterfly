<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\post_video;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Uploadvideo extends Component
{
    use WithFileUploads,LivewireAlert;

    public $video;
    public $caption;

    public function save()
    {
        // dd($this->video);
        if (!Auth::check()) {
            session()->flash('message', 'Anda harus login untuk mengunggah video.');
            return;
        }
        $this->validate([
            'video' => 'required|mimes:mp4,mov,avi,wmv|max:10240',
            'caption' => 'nullable|string|max:255',
        ]);


        $path = $this->video->store('videos', 'public');

        post_video::create([
            'user_id' => auth()->id(),
            'video_path' => $path,
            'caption' => $this->caption ?? 'Tidak ada caption',
        ]);

        $this->alert('success', 'Video berhasil diunggah.');
    }

    public function render()
    {
        return view('livewire.uploadvideo');
    }
}
