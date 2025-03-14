<div>
    <form wire:submit.prevent="uploadPhoto" enctype="multipart/form-data">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        <label class="mt-2">Pilih Foto:</label>
        <input type="file" wire:model="photo" class="form-control">
        @if ($photo)
            <img src="{{ $photo->temporaryUrl() }}" class="img-fluid mt-2" style="max-height: 200px;">
        @endif
        <textarea wire:model.defer="caption" class="form-control mt-2" placeholder="Tambahkan caption..."></textarea>
        <label class="mt-2">Tag Teman:</label>
        <select wire:model.defer="selectedFriends" multiple class="form-control">
            @foreach($friends as $friend)
                <option value="{{ $friend->id }}">{{ $friend->name }}</option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-primary mt-2">Unggah Foto</button>
    </form>
</div>
