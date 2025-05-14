<div x-data="{
    photoPreview: '',
    showModal() {
        const modal = new bootstrap.Modal(document.getElementById('photoModal'));
        modal.show();
    }
}">

    <!-- Tombol pilih foto -->
    <button type="button" onclick="document.getElementById('photoInput').click()"
        style="background: none; border: none; padding: 0; font-size: 1.5rem; cursor: pointer;">
        📷
    </button>

    <!-- Input File -->
    <input type="file" id="photoInput" wire:model="photo" class="d-none" accept="image/*"
        x-on:change="
        if ($event.target.files.length) {
            let reader = new FileReader();
            reader.onload = (e) => { 
                photoPreview = e.target.result; 
                showModal();
            };
            reader.readAsDataURL($event.target.files[0]);
        }
    ">
    <div class="modal fade" id="photoModal" tabindex="-1" aria-labelledby="photoModalLabel" aria-hidden="true"
        wire:ignore>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <!-- Preview Foto -->
                    <template x-if="photoPreview">
                        <img :src="photoPreview" class="img-fluid mb-3" style="max-height: 300px;"
                            alt="Preview Foto">
                    </template>

                    <div x-show="!photoPreview">
                        <p>Memuat foto...</p>
                    </div>

                    <textarea wire:model.defer="caption" class="form-control mb-2 mt-2" placeholder="Tambahkan caption..."></textarea>

                    <!-- Tag Teman -->
                    <label>Tag Teman:</label>
                    <select wire:model.defer="selectedFriends" multiple class="form-control">
                        @foreach ($friends as $friend)
                            <option value="{{ $friend->id }}">{{ $friend->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Tombol Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-success" wire:click="uploadPhoto">Unggah Foto</button>
                </div>
            </div>
        </div>
        <style>
            .modal-backdrop {
                background-color: transparent !important;
            }

        </style>
    </div>

</div>
