<div class="flex justify-center items-center ">
    <div class="w-full max-w-md mb-2">
        @if (session()->has('success'))
            <div class="text-green-500 mb-2 text-center">{{ session('success') }}</div>
        @endif

        <form wire:submit.prevent="submit">
            <div class="mb-2 d-flex w-full justify-content-center mt-1">
                <textarea wire:model.defer="reason" placeholder="Tulis alasan laporan..." class="w-full border p-2 rounded"></textarea>
                @error('reason')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="text-center">
                <button type="submit" class=btn"
                    style="background: linear-gradient(to right, rgba(68, 173, 159, 0.9), rgba(68, 173, 159, 0.7), rgba(68, 173, 159, 0.3)); 
                       color: white; border: none; padding: 10px 20px; border-radius: 8px; font-weight: bold;">Laporkan</button>
            </div>
        </form>
    </div>
</div>
