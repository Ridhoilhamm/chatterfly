<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

class ReportPost extends Component
{
    public $postId;
    public $alreadyReported = false;

    public function mount($postId)
    {
        $this->postId = $postId;
        $this->alreadyReported = Report::where('reporter_id', Auth::id())
            ->where('post_foto_id', $postId)
            ->exists();
    }

    public function report()
    {
        if (!$this->alreadyReported) {
            Report::create([
                'reporter_id' => Auth::id(),
                'post_foto_id' => $this->postId,
                'alasan' => 'Konten tidak pantas',
            ]);
            $this->alreadyReported = true;
            session()->flash('message', 'Postingan berhasil dilaporkan.');
        }
    }

    public function render()
    {
        return view('livewire.report-post');
    }
}

