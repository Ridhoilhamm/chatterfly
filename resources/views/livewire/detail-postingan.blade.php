<div>
    <div>
        <div class="container fixed-top d-flex align-items-center bg-white p-1 justify-content-center ">
            <a href="{{ route('detailpengguna', $user->id) }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left mt-1" style="color: black">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M15 6l-6 6l6 6" />
                </svg>
            </a>
            <p class="container mt-3" style="font-size: 16px;" style="color:rgba(0, 0, 0, 0.686)">Postingan</p>
        </div>
    </div>
    <div style="margin-top:65px">
        @foreach ($posts as $post)
            <div style="position: relative; width: 100%; max-width: 600px;">
                <img src="{{ asset('storage/' . $post->image_path) }}" alt="Foto Besar"
                    style="width: 100%; height: auto; object-fit: contain; border-radius: 0px;">
                <div class="d-flex justify-content-center ml-4"
                    style="position: absolute; bottom: 10px; left: 15%; transform: translateX(-50%);
                            display: flex; align-items: center; gap: 8px; background: rgba(0,0,0,0.5);
                            padding: 5px 10px; border-radius: 20px; color: white;">

                    <img src="{{ asset('storage/users-avatar/' . $user->avatar) }}" alt="Avatar"
                        class="rounded-circle"
                        style="width: 35px; height: 35px; object-fit: cover; border: 2px solid white;">

                    <p style="margin: 0; font-size: 12px;">{{ $user->name }}</p>

                </div>
                <div
                    style="position: absolute; bottom: 20px; right: 10px; 
                       display: flex; flex-direction: column; align-items: center; 
                       gap: 10px; background: 
                    linear-gradient(to top, rgba(68, 173, 159, 0.908), rgba(68, 173, 159, 0.726), rgba(68, 173, 159, 0.141)) bottom; 
                       padding: 10px; border-radius: 10px; color: white;">

                    <div class="mb-0">
                        <livewire:post-like :post="$post" />
                    </div>

                    <div style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                        <i class="fas fa-comment" style="color: white; cursor: pointer; font-size: 20px;"
                            data-toggle="modal" data-target="#commentModal-{{ $post->id }}"></i>
                        <p style="margin: 2px 0 0; font-size: 10px; text-align: center;">
                            {{ $post->comments()->count() }}
                        </p>
                    </div>

                    <div style="display: flex; flex-direction: column; align-items: center; justify-content: center;"
                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fas fa-share" style="color: white; cursor: pointer; font-size: 20px;"></i>
                        <p style="margin: 2px 0 0; font-size: 10px; text-align: center;">Share</p>
                    </div>
                    <div style="display: flex; flex-direction: column; align-items: center; justify-content: center;"
                        data-bs-toggle="modal" data-bs-target="#laporkan">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-message-report">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12z" />
                            <path d="M12 8v3" />
                            <path d="M12 14v.01" />
                        </svg>

                        <p style="margin: 2px 0 0; font-size: 10px; text-align: center;">laporkan</p>
                    </div>
                </div>
            </div>

            <div x-data="{ expanded: false }" class="content-box"
                style="background: white; padding: 5px; border-radius: 8px; box-shadow: 0px 4px 10px rgba(0,0,0,0.1); max-width: 600px; margin: auto;">
                <p x-bind:class="expanded ? 'expanded' : 'collapsed'" class="text mb-0"
                    style="transition: max-height 0.4s ease-in-out; font-size: 14px; line-height: 1.6; color: #333;">
                    @php
                        $maxDisplay = 1; // Jumlah maksimal user yang ditampilkan
                        $totalLikes = count($post->likes);
                    @endphp
                    @if ($totalLikes > 0)
                        <div class="d-flex flex-wrap gap-1 mb-0 ">
                            @foreach ($post->likes->take($maxDisplay) as $like)
                                <img src="{{ asset('storage/users-avatar/' . $like->user->avatar) }}"
                                    alt="Avatar {{ $like->user->name }}" width="35" height="35"
                                    class="rounded-circle" style="object-fit: cover; border: 2px solid white;">
                                <div class="d-flex mt-2">

                                    <p class=" ml-2 mr-2">disukai oleh</p>
                                    <p class="text-center mb-1">{{ Str::limit($like->user->name, 6, '...') }}</p>
                            @endforeach

                            @if ($totalLikes > $maxDisplay)
                                <p class="text-center mb-1 ml-1" data-bs-toggle="modal" data-bs-target="#alldisukai">dan
                                    <span>{{ $totalLikes - $maxDisplay }}</span> lainnya
                                </p>
                            @endif
                        </div>
            </div>
        @else
        @endif
        <p class="ml-2">

            {{ $post->caption }}
        </p>
        </p>
        <div style="display: flex; justify-content: flex-end;">
            <button @click="expanded = !expanded" class="btn-toggle"
                style="background: none; border: none; color: #007bff; font-size: 14px; cursor: pointer; padding: 5px;">
                <span x-text="expanded ? 'Tampilkan Lebih Sedikit' : 'Baca Selengkapnya'"></span>
            </button>
        </div>
    </div>

    {{-- modals disukai --}}
    <div class="modal fade" id="alldisukai" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-slide-up">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-center">
                    <h5 class="modal-title" id="exampleModalLabel">Disukai</h5>
                </div>
                <div class="modal-body" style="padding-bottom: 0px;">

                    {{-- Input pencarian --}}
                    <input type="text" id="searchLike" class="form-control mb-3" placeholder="Cari pengguna...">

                    {{-- Daftar pengguna yang menyukai --}}
                    <div id="likeList">
                        @foreach ($post->likes as $like)
                            <div class="border-bottom like-item">
                                <div class="d-flex align-items-center pb-2">
                                    <img src="{{ asset('storage/users-avatar/' . $like->user->avatar) }}"
                                        alt="Avatar" class="rounded-circle"
                                        style="width: 45px; height: 45px; object-fit: cover; border: 2px solid white;">
                                    <p class="ml-3 mt-2 user-name">{{ $like->user->name }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- Script untuk pencarian --}}
    <script>
        document.getElementById('searchLike').addEventListener('input', function() {
            let searchValue = this.value.toLowerCase();
            let likeItems = document.querySelectorAll('.like-item');

            likeItems.forEach(item => {
                let userName = item.querySelector('.user-name').textContent.toLowerCase();
                if (userName.includes(searchValue)) {
                    item.style.display = "block";
                } else {
                    item.style.display = "none";
                }
            });
        });
    </script>


    {{-- Modal Komentar --}}
    <div class="modal fade" id="commentModal-{{ $post->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-slide-up">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center w-100" style="font-size: 14px;">Komentar</h5>
                </div>
                <div class="modal-body">
                    <livewire:post.comment :post="$post" />
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
{{-- modals laporkan --}}
<div wire:ignore.self class="modal fade" id="laporkan" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered custom-height-modal">
        <div class="modal-content" style="border-radius: 15px; overflow: hidden;">
            <div class="d-flex justify-content-center mt-2">
                <div class="d-flex align-items-center justify-content-center rounded-circle shadow bg-gradient"
                    style="width: 60px; height: 60px; background: linear-gradient(to right, rgba(68, 173, 159, 0.9), rgba(68, 173, 159, 0.7), rgba(68, 173, 159, 0.3)); color:white;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-alert-square-rounded">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z" />
                        <path d="M12 8v4" />
                        <path d="M12 16h.01" />
                    </svg>
                </div>
            </div>
            <div class="mt-2 mb-2 d-flex justify-content-center">
                Apakah Anda Yakin Untuk Melaporkan?
            </div>
            <div class="mb-3 justify-content-center align-items-center text-center ">
                <button class="btn"
                    style="background: linear-gradient(to right, rgba(68, 173, 159, 0.9), rgba(68, 173, 159, 0.7), rgba(68, 173, 159, 0.3)); 
                       color: white; border: none; padding: 10px 20px; border-radius: 8px; font-weight: bold; margin-right:10px;"
                    data-bs-dismiss="modal">
                    Batal
                </button>

                <button class="btn" wire:click="logout"
                    style="background: linear-gradient(to right, rgba(255, 69, 58, 0.9), rgba(255, 69, 58, 0.7), rgba(255, 69, 58, 0.3)); 
                       color: white; border: none; padding: 10px 20px; border-radius: 8px; font-weight: bold;">
                    Laporkan
                </button>
            </div>
        </div>
    </div>
</div>


{{-- pengaturan komentar  --}}
<div class="modal fade" id="modal-setting" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-slide-half" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center w-100 " style="font-size: 14px;" id="exampleModalLabel">
                    Kontrol Komentar</h5>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-between align-items-center py-2">
                    <p class="mb-0" style="font-size:12px;">Izinkan Semua Komentar</p>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-right">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M9 6l6 6l-6 6" />
                        </svg>
                    </span>
                </div>

                <div class="d-flex justify-content-between align-items-center py-2">
                    <p class="mb-0" style="font-size:12px;">Batasi Komentar</p>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-right">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M9 6l6 6l-6 6" />
                        </svg>
                    </span>
                </div>

                <div class="d-flex justify-content-between align-items-center py-2">
                    <p class="mb-0" style="font-size:12px;">Nonaktifkan Komentar</p>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-right">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M9 6l6 6l-6 6" />
                        </svg>
                    </span>
                </div>
            </div>

        </div>
    </div>
</div>
{{-- modals share postingan --}}
@php
    use App\Models\Friendship;
    use App\Models\User;

    $friends = Friendship::where(function ($query) {
        $query->where('user_id', auth()->id())->orWhere('friend_id', auth()->id());
    })
        ->where('status', 'approved')
        ->get();
@endphp

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-slide-up">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-center ">
                <h5 class="modal-title" id="exampleModalLabel ">Share</h5>
            </div>
            <div class="modal-body" style="padding-bottom: 0px;">
                <div class="d-flex flex-wrap">
                    @foreach ($friends as $friend)
                        @php
                            $friendUser = $friend->user_id == auth()->id() ? $friend->friend : $friend->user;
                        @endphp
                        <div class="friend-item text-center" onclick="selectFriend(this)">
                            <img src="{{ asset('storage/users-avatar/' . $friendUser->avatar) }}"
                                alt="Avatar {{ $friendUser->name }}" width="80" height="80"
                                class="rounded-circle friend-avatar me-2">
                            <p>{{ Str::limit($friendUser->name, 5, '') }}</p>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center pt-3 mb-2" style="margin-top:100px; gap: 20px;">


                    <div class="d-flex align-items-center justify-content-center border border-dark rounded-circle p-2"
                        style="width: 50px; height: 50px;">
                        <a href="https://wa.me/08970915625">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-brand-whatsapp">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9" />
                                <path
                                    d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1" />
                            </svg>

                        </a>
                    </div>
                    <div
                        class="d-flex align-items-center justify-content-center border border-dark rounded-circle p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-link">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M9 15l6 -6" />
                            <path d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464" />
                            <path
                                d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463" />
                        </svg>
                    </div>
                    <div
                        class="d-flex align-items-center justify-content-center border border-dark rounded-circle p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-download">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                            <path d="M7 11l5 5l5 -5" />
                            <path d="M12 4l0 12" />
                        </svg>
                    </div>
                </div>

                <div class="d-flex justify-content-center border-top pt-2">
                    <button id="shareButton" class="btn w-100"
                        style="background: linear-gradient(to right, rgba(68, 173, 159, 0.9), rgba(68, 173, 159, 0.7), rgba(68, 173, 159, 0.3)); 
                   color: white; border: none; padding: 10px 20px; border-radius: 8px; font-weight: bold; margin-right:10px;">Bagikan</button>
                </div>


            </div>

        </div>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const shareButton = document.getElementById("shareButton");
        const iconContainer = document.querySelector(".d-flex.justify-content-center.pt-3");

        function toggleShareButton(show) {
            if (show) {
                shareButton.classList.remove("d-none");
            } else {
                shareButton.classList.add("d-none");
            }
        }

        document.querySelectorAll(".friend-item").forEach(item => {
            item.addEventListener("click", function() {
                toggleShareButton(true);
            });
        });

        const observer = new MutationObserver(() => {
            if (shareButton.classList.contains("d-none")) {
                iconContainer.style.marginTop = "0px";
            } else {
                iconContainer.style.marginTop = "20px";
            }
        });

        observer.observe(shareButton, {
            attributes: true,
            attributeFilter: ["class"]
        });
    });

    function selectFriend(element) {
        document.querySelectorAll('.friend-item').forEach(el => el.classList.remove('selected'));
        element.classList.add('selected');

        document.getElementById('shareButton').style.display = 'block';
    }
</script>

<style>
    .friend-item {
        cursor: pointer;
        display: inline-block;
        padding: 5px;
    }

    .friend-avatar {
        border: 2px solid transparent;
        transition: border 0.3s ease-in-out;
    }

    .friend-item.selected .friend-avatar {
        border: 3px solid #44AD9F;
    }

    #laporkan .modal-dialog {
        max-height: 400px;
    }

    #laporkan .modal-content {
        overflow-y: auto;
    }

    .modal-dialog-slide-up {
        position: fixed;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 100%;
        max-width: 500px;
        animation: slideUp 0.3s ease-out;
    }

    @keyframes slideUp {
        from {
            transform: translate(-50%, 100%);
        }

        to {
            transform: translate(-50%, 0);
        }
    }

    .custom-height-modal .modal-content {
        border-radius: 15px;
        overflow: hidden;
        max-height: 180px;
    }


    a {
        color: inherit;
        text-decoration: none;
    }

    .collapsed {
        max-height: 60px;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }

    .expanded {
        max-height: 600px;
        overflow: visible;
    }

    .modal-dialog-slide-up {
        position: fixed;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%) translateY(100%);
        transition: transform 0.3s ease-in-out;
        width: 100%;
        max-width: 600px;
        height: 60vh;
        margin: 0;
    }

    .modal-dialog-slide-half {
        position: fixed;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%) translateY(100%);
        transition: transform 0.3s ease-in-out;
        width: 100%;
        max-width: 600px;
        height: 40vh;
        margin: 0;
    }

    .modal.fade.show .modal-dialog-slide-up {
        transform: translateX(-50%) translateY(0);
    }

    .modal.fade.show .modal-dialog-slide-half {
        transform: translateX(-50%) translateY(0);
    }

    .modal-content {
        height: 650px;
        display: flex;
        flex-direction: column;
    }

    .modal-body {
        flex: 1;
        overflow-y: auto;
    }

    @media (max-width: 576px) {
        .modal-content {
            border-radius: 15px 15px 0 0;
        }
    }
</style>


</div>
