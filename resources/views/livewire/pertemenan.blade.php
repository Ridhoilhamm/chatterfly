<div>
    @php
        $viewedUser = \App\Models\User::find($userId);
    @endphp

    <div class="bg-white d-flex align-items-center fixed-top justify-content-between p-3 border-bottom shadow-sm ">
        <div class="d-flex align-items-center">
            <a href="/bio" class="mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left me-2">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M15 6l-6 6l6 6" />
                </svg>
            </a>
            <p class="mb-0  me-2 " style="margin-right:10px; font-size:18px;">Pertemanan</p>

            <span class="px-3 py-1 rounded text-white"
                style="
            background: linear-gradient(to top, rgba(68, 173, 159, 0.908), rgba(68, 173, 159, 0.726), rgba(68, 173, 159, 0.141));">
                 {{ $totalPertemanan }}
            </span>
        </div>
    </div>


    <div class="pt-1 full-height bg-white" style="margin-top:65px;">

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
                class="d-flex align-items-center justify-content-between bg-white p-2 rounded w-100 border-bottom shadow-sm">
                <!-- Avatar dan Nama -->
                <div class="d-flex align-items-center">
                    <img src="{{ asset('storage/users-avatar/' . $friend->avatar) }}" alt="{{ $friend->name }}"
                        width="40" height="40" class="rounded-circle border border-white me-2">
                    <span class="fw-bold ml-2">{{ $friend->name }}</span>
                </div>

                <div class="d-flex align-items-center gap-2">
                    <button class="btn"
                        style="background: linear-gradient(to right, rgba(68, 173, 159, 0.9), rgba(68, 173, 159, 0.7), rgba(68, 173, 159, 0.3));  color: white; border: none; padding: 10px 20px; border-radius: 8px; font-weight: bold; margin-right:10px;">Pesan</button>

                    <button class="btn btn-light p-0 border-0 d-flex justify-content-center align-items-center bg-white"
                        wire:click="hapusPertemanan({{ $friend->id }})" wire:loading.attr="disabled">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash mr-2">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 7l16 0" />
                            <path d="M10 11l0 6" />
                            <path d="M14 11l0 6" />
                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
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
