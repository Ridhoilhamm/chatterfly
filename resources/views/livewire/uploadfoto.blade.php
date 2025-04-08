<div>
    <form wire:submit.prevent="uploadPhoto" enctype="multipart/form-data">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <label class="mt-2">Pilih Foto:</label>
        <input type="file" wire:model="photo" class="form-control custom-file-input">
        @if ($photo)
            <img src="{{ $photo->temporaryUrl() }}" class="img-fluid mt-2" style="max-height: 200px;">
        @endif
        <textarea wire:model.defer="caption" class="form-control mt-2" placeholder="Tambahkan caption..."></textarea>
        <label class="mt-2">Tag Teman:</label>
        <select wire:model.defer="selectedFriends" multiple class="form-control">
            @foreach ($friends as $friend)
                <option value="{{ $friend->id }}">{{ $friend->name }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn mt-2" style="background: linear-gradient(to right, rgba(68, 173, 159, 0.9), rgba(68, 173, 159, 0.7), rgba(68, 173, 159, 0.3)); 
                               color: white; border: none; padding: 10px 20px; border-radius: 8px; font-weight: bold;">Unggah Foto</button>
    </form>
</div>
