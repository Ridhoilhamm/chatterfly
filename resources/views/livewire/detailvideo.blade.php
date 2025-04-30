<div>
    {{-- Header --}}
    <div class="container fixed-top d-flex align-items-center bg-white p-1 justify-content-center">
        <a href="{{ route('detailpengguna', $user->id) }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M15 6l-6 6l6 6" />
            </svg>
        </a>
        <p class="container mt-3 text-center" style="font-size: 16px; color:rgba(0, 0, 0, 0.686)">Video</p>
    </div>

    {{-- Content --}}
    <div class="container bg-white" style="margin-top:65px;">
        <div class="row justify-content-center pt-2">
            @if ($posts->isEmpty())
                <p class="text-center text-black">Belum ada video yang diunggah oleh pengguna ini.</p>
            @else
                @foreach ($posts as $video)
                    <div class="col-12 col-sm-6 col-md-4 d-flex flex-column align-items-center mb-2 position-relative">
                        <video class="video-responsive" controls>
                            <source src="{{ asset('storage/' . $video->video_path) }}" type="video/mp4">
                            Browser Anda tidak mendukung pemutaran video.
                        </video>

                        {{-- Overlay Tombol --}}
                        <div class="position-absolute"
                            style="bottom: 110px; right: 20px; display: flex; flex-direction: column; align-items: center; gap: 10px; background: linear-gradient(to top, rgba(68, 173, 159, 0.9), rgba(68, 173, 159, 0.7), rgba(68, 173, 159, 0.1)); padding: 10px; border-radius: 10px; color: white;">
                            {{-- Komentar --}}
                            <div style="display: flex; flex-direction: column; align-items: center; justify-content: center;"
                                data-bs-toggle="modal" data-bs-target="#commentModal-{{ $video->id }}">
                                <i class="fas fa-comment" style="color: white; cursor: pointer; font-size: 20px;"></i>
                                <p style="margin: 2px 0 0; font-size: 10px; text-align: center;">
                                    {{ $video->comments()->count() }}
                                </p>
                            </div>


                            {{-- Share --}}
                            <div data-bs-toggle="modal" data-bs-target="#modalshare"
                                class="d-flex flex-column align-items-center">
                                <i class="fas fa-share" style="color: white; cursor: pointer; font-size: 20px;"></i>
                                <p style="margin: 2px 0 0; font-size: 10px; text-align: center;">Share</p>
                            </div>

                            {{-- Laporkan --}}
                            <div data-bs-toggle="modal" data-bs-target="#laporkanModal-{{ $video->id }}"
                                class="d-flex flex-column align-items-center">
                                <i class="fas fa-exclamation-triangle"
                                    style="color: white; cursor: pointer; font-size: 20px;"></i>
                                <p style="margin: 2px 0 0; font-size: 10px; text-align: center;">Laporkan</p>
                            </div>
                        </div>

                        {{-- Caption --}}
                        <p class="text-center mt-2">{{ $video->caption }}</p>

                        {{-- Modal Laporkan - HARUS DI DALAM LOOP --}}
                        <div wire:ignore.self class="modal fade" id="laporkanModal-{{ $video->id }}" tabindex="-1"
                            aria-labelledby="laporkanModalLabel-{{ $video->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content"
                                    style="border-radius: 15px; overflow: hidden; max-height: 40vh;">

                                    {{-- Icon SVG --}}
                                    <div class="d-flex justify-content-center mt-3">
                                        <div class="d-flex align-items-center justify-content-center rounded-circle shadow"
                                            style="width: 60px; height: 60px; 
                                                background: linear-gradient(to right, rgba(68, 173, 159, 0.9), rgba(68, 173, 159, 0.7), rgba(68, 173, 159, 0.3)); 
                                                color:white;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-alert-circle">
                                                <circle cx="12" cy="12" r="10" />
                                                <line x1="12" y1="8" x2="12" y2="12" />
                                                <line x1="12" y1="16" x2="12.01" y2="16" />
                                            </svg>
                                        </div>
                                    </div>

                                    {{-- Livewire Component --}}
                                    <div class="p-3">
                                        <livewire:laporkan-postingan-video :post-id="$video->id" :key="$video->id" />
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Modal Komentar -->
                        <div class="modal fade" id="commentModal-{{ $video->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-slide-up modal-lg">
                                {{-- bisa pakai modal-lg untuk lebar juga --}}
                                <div class="modal-content mb-3" style="min-height: 800px;"> {{-- atur tinggi di sini --}}
                                    <div class="modal-header">
                                        <h5 class="modal-title w-100 text-center" style="font-size: 14px;">Komentar</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body overflow-auto">
                                        <div class="d-flex justify-content-center">
                                            <livewire:comment-video :post="$video" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                @endforeach
            @endif
        </div>
    </div>

    {{-- Modal Share --}}
    <div class="modal fade" id="modalshare" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-center">
                    <h5 class="modal-title" id="exampleModalLabel">Share</h5>
                </div>
                <div class="modal-body">...</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .video-responsive {
            width: 100%;
            max-width: 385px;
            height: auto;
            border-radius: 15px;
        }

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
