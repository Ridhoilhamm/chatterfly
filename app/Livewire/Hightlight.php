<?php

namespace App\Livewire;

use App\Models\highlights;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Hightlight extends Component
{
    use WithFileUploads, LivewireAlert;

    public $title, $image, $highlightId, $oldImage;
    public $showEditModal = false;
    public $highlights = [];
    public $currentIndex = 0;
    public $selectedUserId;
    public $userId;
    public $selectedHighlight;


    public function mount($userId = null)
    {
        // Jika userId tidak dikirim, gunakan ID user yang sedang login
        $this->selectedUserId = $userId ?? Auth::id();
        $this->loadHighlights($this->selectedUserId);
    }

    public function loadHighlights()
    {
        $user = \App\Models\User::find($this->selectedUserId);

        $isPrivate = $user ? $user->is_private : false;

        // Cek apakah user yang login adalah teman dari user yang sedang dilihat
        $isFriend = \App\Models\Friendship::where(function ($query) {
            $query->where('user_id', Auth::id())
                ->where('friend_id', $this->selectedUserId)
                ->where('status', 'approved');
        })
            ->orWhere(function ($query) {
                $query->where('user_id', $this->selectedUserId)
                    ->where('friend_id', Auth::id())
                    ->where('status', 'approved');
            })
            ->exists();
        // Ambil highlight berdasarkan status privasi dan pertemanan
        $this->highlights = \App\Models\Highlights::where('user_id', $this->selectedUserId)
            ->latest()
            ->get()
            ->map(function ($highlight) use ($isPrivate, $isFriend) {
                // Hanya pemilik akun, teman, atau akun publik yang bisa melihat highlight
                $highlight->canView = Auth::id() === $this->selectedUserId || !$isPrivate || $isFriend;
                return $highlight;
            });
    }


    public function nextHighlight()
    {
        if (!empty($this->highlights)) {
            $this->currentIndex = ($this->currentIndex + 1) % count($this->highlights);
            $this->showEditModal = true;
        }
    }

    public function save()
    {
        $this->validate([
            'image' => 'required|image|max:2048'
        ]);

        $path = $this->image->store('highlights', 'public');

        highlights::create([
            'user_id' => Auth::id(),
            'title' => $this->title ?? 'Sorotan',
            'image' => $path
        ]);

        $this->reset(['title', 'image']);
        $this->loadHighlights(Auth::id());

        session()->flash('message', 'Sorotan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $highlight = highlights::findOrFail($id);
        $this->selectedHighlight = highlights::with('user')->find($id); 
        $this->highlightId = $highlight->id;
        $this->title = $highlight->title;
        $this->oldImage = $highlight->image;
        $this->showEditModal = true;
    }

    public function update()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $highlight = highlights::findOrFail($this->highlightId);

        if ($this->image) {
            $path = $this->image->store('highlights', 'public');
            $highlight->image = $path;
        }

        $highlight->title = $this->title;
        $highlight->save();

        $this->reset(['title', 'image', 'highlightId', 'oldImage', 'showEditModal']);
        $this->loadHighlights($this->selectedUserId);
        $this->alert('success', 'Sorotan berhasil diperbarui!');
    }

    public function closeModal()
    {
        $this->reset(['title', 'image', 'highlightId', 'oldImage', 'showEditModal']);
    }

    public function render()
    {
        return view('livewire.hightlight', [
            'highlights' => Highlights::where('user_id', Auth::id())->get()
        ]);
    }
}
