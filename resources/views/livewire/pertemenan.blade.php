<div>
    @php
        $viewedUser = \App\Models\User::find($userId);
    @endphp

    <div class="bg-white d-flex align-items-center position-relative border-bottom" style="height: 50px;">
        <!-- Tombol Back -->
        <a href="/profile" class="position-absolute start-0 ms-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M15 6l-6 6l6 6" />
            </svg>
        </a>
        <div style="margin-left:20px;">
            <p class="m-0 fw-bold"  >
                Pertemanan
            </p>
        </div>
    </div>


    <div class="pt-1 full-height bg-white">

        @php $shownFriends = []; @endphp

        @foreach ($friendships as $friendship)
            @php
                $friend = $friendship->user_id == $userId ? $friendship->friend : $friendship->user;
                if (!$friend || in_array($friend->id, $shownFriends)) {
                    continue;
                }
            @endphp

            {{-- <a style="color: inherit; text-decoration: none;" href="{{ route('detailpengguna', $friend->id) }}"> --}}
            <div
                class="d-flex align-items-center justify-content-between bg-white p-2 rounded w-100 border-bottom shadow-sm ">
                <!-- Avatar dan Nama -->
                <div class="d-flex align-items-center">
                    <img src="{{ asset('storage/users-avatar/' . $friend->avatar) }}" alt="{{ $friend->name }}"
                        width="40" height="40" class="rounded-circle border border-white me-2">
                    <span class="fw-bold">{{ $friend->name }}</span>
                </div>

                <div class="d-flex align-items-center gap-2">
                    <button class="btn btn-primary">Pesan</button>

                    <button class="btn btn-light p-0 border-0 d-flex justify-content-center"
                        wire:click="hapusPertemanan({{ $friend->id }})" wire:loading.attr="disabled">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-x">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M18 6l-12 12" />
                            <path d="M6 6l12 12" />
                        </svg>
                    </button>

                </div>
            </div>
            {{-- </a> --}}


            @php $shownFriends[] = $friend->id; @endphp
        @endforeach
    </div>
    <style>
        .full-height {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        a {
                color: inherit;
                text-decoration: none;
            }
    </style>
</div>
