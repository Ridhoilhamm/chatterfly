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
                    data-bs-toggle="modal" data-bs-target="#exampleModal">
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
                        const offset = 150; // Sesuaikan sesuai kebutuhan

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
</div>
