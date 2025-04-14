<div class=" bg-white pb-4" >
    <div class="bg-white d-flex align-items-center fixed-top justify-content-between p-1 border-bottom shadow-sm ">
        <div class="d-flex align-items-center">
            <a href="{{ url()->previous() }}" class="mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left me-2">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M15 6l-6 6l6 6" />
                </svg>
            </a>
            <p class="mb-0  me-2 " style="margin-right:10px; font-size:18px;">Laporan</p>
            <span class="px-3 py-1 rounded text-white"
                style="
            background: linear-gradient(to top, rgba(68, 173, 159, 0.908), rgba(68, 173, 159, 0.726), rgba(68, 173, 159, 0.141));">{{ $countLaporan }}
            </span>
        </div>
    </div>
    @if ($laporanList->count())
        @foreach ($laporanList as $laporan)
            <div class="mb-4 border-bottom rounded p-2 " style="margin-top:48px;">
                @if ($laporan->post?->image_path)
                <div class="d-flex justify-content-center rounded-xl">
                    <img src="{{ asset('storage/' . $laporan->post->image_path) }}" class="img-fluid rounded mb-2" style="max-height: 200px;">
                </div>
                @endif
                <p class="mb-0">Caption: {{ $laporan->post->caption ?? '-' }}</p>
                <p>Alasan Laporan: {{ $laporan->reason ?? '-' }}</p>

                @if (!$laporan->appeal)
                <form wire:submit.prevent="submitBanding({{ $laporan->id }})">
                    <div class="mb-3">
                        <label>Alasan Banding</label>
                        <textarea wire:model.defer="bandingMessages.{{ $laporan->id }}" class="form-control" rows="3"></textarea>
                        @error("bandingMessages.$laporan->id") 
                            <small class="text-danger">{{ $message }}</small> 
                        @enderror
                    </div>
                
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn" style="background: linear-gradient(to right, rgba(68, 173, 159, 0.9), rgba(68, 173, 159, 0.7), rgba(68, 173, 159, 0.3)); 
                           color: white; border: none; padding: 10px 20px; border-radius: 8px; font-weight: bold;">
                            Ajukan Banding
                        </button>
                    </div>
                </form>
                
                @else
                    <div class="alert alert-info mt-2 text-white" style="background-color: #2ecc70ab">
                        Banding sudah diajukan.
                    </div>
                @endif
            </div>
        @endforeach
    @else
        <div class="alert alert-warning text-center">
            Tidak ada laporan terhadap postingan Anda saat ini.
        </div>
    @endif

    <style>
         a {
            color: inherit;
            text-decoration: none;
        }
    </style>
</div>
