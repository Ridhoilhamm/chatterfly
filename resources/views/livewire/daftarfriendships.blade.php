<div>
    <div class="mt-0 bg-white" style="padding-bottom:20px;">
        @if (empty($pendingRequests) || $pendingRequests->isEmpty())
            <p class="text-muted text-center">Tidak ada permintaan pertemanan saat ini.</p>
        @else
            @foreach ($pendingRequests as $request)
            {{-- <a href="{{ route('detailpengguna', $request->id) }}"> --}}
                <div class="container d-flex align-items-center justify-content-center p-1 mb-1 rounded shadow-sm">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('storage/users-avatar/' . $request->avatar) }}"
                            alt="Avatar {{ $request->name }}" width="90" height="90" class="rounded-circle me-2"
                            style="margin-right: 10px;">

                        <div>
                            <span class="fw-bold mb-2">{{ $request->name }}</span>
                           
                            @if (!empty($request->mutualFriends) && $request->mutualFriends->count() > 0)
                                <p class="text-muted small mb-0">
                                    <strong>Teman dari:</strong>
                                </p>
                                <div class="d-flex flex-wrap gap-1 mb-0">
                                    @php
                                        $maxDisplay = 1; // Jumlah maksimal teman yang ditampilkan
                                        $totalMutual = count($request->mutualFriends);
                                    @endphp

                                    @foreach ($request->mutualFriends->take($maxDisplay) as $mutual)
                                        <img src="{{ asset('storage/users-avatar/' . $mutual->avatar) }}"
                                            alt="Avatar {{ $mutual->name }}" width="20" height="20"
                                            class="rounded-circle me-2">
                                        <p class="text-center mb-1">{{ Str::limit($mutual->name, 6, '...') }}</p>
                                    @endforeach

                                    @if ($totalMutual > $maxDisplay)
                                        <p class="text-center mb-1">+{{ $totalMutual - $maxDisplay }} teman lainnya</p>
                                    @endif
                                </div>
                            @endif

                            <div class="d-flex mt-0">
                                <button class="btn btn-outline-secondary btn-sm px-3"
                                    style="margin-right:10px; width: 130px; height: 40px;"
                                    wire:click="rejectRequest({{ $request->id }})">
                                    Urungkan
                                </button>
                                <button class="btn"
                                    style="background: linear-gradient(to right, rgba(68, 173, 159, 0.9), rgba(68, 173, 159, 0.7), rgba(68, 173, 159, 0.3)); 
                                    color:white; border:none; width: 120px; height: 40px;"
                                    wire:click="acceptRequest({{ $request->id }})">
                                    Terima
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            
            @endforeach
        @endif
    </div>
</div>
