<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="save">
        <div class="mb-3">
            <label for="video" class="form-label">Upload Video</label>
            <input type="file" wire:model="video" class="form-control" accept="video/*">
            @error('video')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="caption" class="form-label">Caption</label>
            <textarea wire:model="caption" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn " style="background: linear-gradient(to right, rgba(68, 173, 159, 0.9), rgba(68, 173, 159, 0.7), rgba(68, 173, 159, 0.3)); 
                               color: white; border: none; padding: 10px 20px; border-radius: 8px; font-weight: bold;">Upload</button>
    </form>

    @if ($video instanceof \Livewire\TemporaryUploadedFile)
        <video width="320" height="240" controls>
            <source src="{{ $video->temporaryUrl() }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    @endif
</div>
