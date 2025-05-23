<div>
    <div>
        <div class="container fixed-top d-flex align-items-center bg-white p-1 justify-content-center ">
            <a href="/profile">
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
    <div style="margin-top:40px">
        @forelse($taggedPosts as $post)
            <div id="post-{{ $post->id }}" class="post-card">
                <div style="position: relative; width: 100%; max-width: 600px; " class="min-vh-100">
                    <img src="{{ asset('storage/' . $post->image_path) }}" class="card-img-top img-fluid" alt="Foto"
                        style="width: 100%; height: auto; max-height: 100vh; object-fit: cover;">
                    <a href="{{ $post->user ? route('detailpengguna', $post->user->id) : '#' }}">
                        <div class="d-flex justify-content-center"
                            style="position: absolute; bottom: 10px; left: 13%; transform: translateX(-50%);
                        display: flex; align-items: center; gap: 8px; background: rgba(0,0,0,0.5);
                        padding: 5px 10px; border-radius: 20px; color: white;">
                            <img src="{{ asset('storage/users-avatar/' . $post->user->avatar) }}" alt="Avatar"
                                class="rounded-circle"
                                style="width: 35px; height: 35px; object-fit: cover; border: 2px solid white;">

                            <p style="margin: 0; font-size: 12px;">{{ ucfirst(Str::limit($post->user->name, 5, '..')) }}
                            </p>
                    </a>
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
                        data-bs-toggle="modal" data-bs-target="#sharemodals">
                        <i class="fas fa-share" style="color: white; cursor: pointer; font-size: 20px;"></i>
                        <p style="margin: 2px 0 0; font-size: 10px; text-align: center;">Share</p>
                    </div>
                </div>
            </div>
    </div>

    <div x-data="{ expanded: false }" class="content-box"
        style="background: white; padding: 5px; border-radius: 8px; box-shadow: 0px 4px 10px rgba(0,0,0,0.1); max-width: 600px; margin: auto;">
        <p x-bind:class="expanded ? 'expanded' : 'collapsed'" class="text mb-0"
            style="transition: max-height 0.4s ease-in-out; font-size: 14px; line-height: 1.6; color: #333;">
            {{ $post->caption }}
        </p>
        <div style="display: flex; justify-content: flex-end;">
            <button @click="expanded = !expanded" class="btn-toggle"
                style="background: none; border: none; color: #007bff; font-size: 14px; cursor: pointer; padding: 5px;">
                <span x-text="expanded ? 'Tampilkan Lebih Sedikit' : 'Baca Selengkapnya'"></span>
            </button>
        </div>
    </div>



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
    {{-- modals share --}}

    {{-- query digunakan ketikan user yang sudah bertemanan --}}
    @php
        $friends = \App\Models\Friendship::where(function ($query) {
            $query->where('user_id', auth()->id())->orWhere('friend_id', auth()->id());
        })
            ->where('status', 'approved')
            ->get();
    @endphp




    <div class="modal fade" id="sharemodals" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-slide-up">
            <div class="modal-content custom-share-modal">
                <div class="modal-header d-flex justify-content-center ">
                    <h5 class="modal-title">Share</h5>
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-link">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M9 15l6 -6" />
                                <path d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464" />
                                <path
                                    d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463" />
                            </svg>
                        </div>
                        <div
                            class="d-flex align-items-center justify-content-center border border-dark rounded-circle p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
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
@empty
    <p class="text-muted">Belum ada postingan yang menandai kamu.</p>
    @endforelse
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(() => {
                const postId = "{{ request()->route('postId') }}";
                if (postId) {
                    const target = document.getElementById('post-' + postId);
                    if (target) {
                        const targetPosition = target.offsetTop;
                        const offset = 150;

                        window.requestAnimationFrame(() => {
                            window.scrollTo({
                                top: targetPosition - offset,
                                behavior: 'smooth'
                            });
                        });
                        console.log("Scrolling to:", targetPosition - offset);
                    }
                }
            }, 300);
        });
    </script>
</div>

<style>
    <style>.friend-item {
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

    #exampleModal .modal-dialog {
        max-height: 400px;
    }

    #exampleModal .modal-content {
        overflow-y: auto;
    }

    #editCaptionModal .modal-dialog {
        max-height: 350px;
    }

    #editCaptionModal .modal-content {
        overflow-y: auto;
    }

    a {
        color: inherit;
        text-decoration: none;
    }

    a {
        color: inherit;
        text-decoration: none;
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
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var modalElement = document.getElementById("hapuspostingan");
        var modalElement = document.getElementById("arsippostingan");
        var modalElement = document.getElementById("editCaptionModal");
        modalElement.addEventListener("hidden.bs.modal", function() {
            document.body.classList.remove("modal-open");
            document.querySelector(".modal-backdrop")?.remove();
        });
    });
</script>

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
</div>
