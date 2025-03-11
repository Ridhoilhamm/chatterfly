<div>
    <div>
        <div class="container fixed-top d-flex align-items-center bg-white p-1 justify-content-center">
            <a href="{{ route('detailpengguna', $user->id) }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left mt-1" style="color: black">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M15 6l-6 6l6 6" />
                </svg>
            </a>
            <p class="container mt-3 text-center" style="font-size: 16px; color:rgba(0, 0, 0, 0.686)">Video</p>
        </div>

        <div class="container bg-white" style="margin-top:65px;">
            <div class="row justify-content-center" style="padding-top: 10px;">
                @if ($videos->isEmpty())
                    <p class="text-center text-black">Belum ada video yang diunggah oleh pengguna ini.</p>
                @else
                    @foreach ($videos as $video)
                        <div class="col-12 col-sm-6 col-md-4 d-flex flex-column align-items-center mb-2 "">
                            <video class="video-responsive" controls>
                                <source src="{{ asset('storage/' . $video->video_path) }}" type="video/mp4">
                                Browser Anda tidak mendukung pemutaran video.
                            </video>
                            <div
                                style="position: absolute; bottom: 110px; right: 20px; 
                       display: flex; flex-direction: column; align-items: center; 
                       gap: 10px; background: 
                    linear-gradient(to top, rgba(68, 173, 159, 0.908), rgba(68, 173, 159, 0.726), rgba(68, 173, 159, 0.141)) bottom; 
                       padding: 10px; border-radius: 10px; color: white;">

                                <div class="mb-0">
                                </div>

                                <div
                                    style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                                    <i class="fas fa-comment" style="color: white; cursor: pointer; font-size: 20px;"
                                        data-bs-toggle="modal" data-bs-target="#modalkomentar"></i>
                                    <p style="margin: 2px 0 0; font-size: 10px; text-align: center;">
                                        {{-- {{ $post->comments()->count() }} --}}
                                    </p>
                                </div>

                                <div style="display: flex; flex-direction: column; align-items: center; justify-content: center;"
                                    data-bs-toggle="modal" data-bs-target="#modalshare">
                                    <i class="fas fa-share" style="color: white; cursor: pointer; font-size: 20px;"></i>
                                    <p style="margin: 2px 0 0; font-size: 10px; text-align: center;">Share</p>
                                </div>

                            </div>
                            <p class="text-center mt-2">{{ $video->caption }}</p>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        {{-- modals komentar --}}
        <div class="modal fade" id="modalkomentar" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-center">
                        <h5 class="modal-title" id="exampleModalLabel">Komentar</h5>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- modals share --}}
        <div class="modal fade" id="modalshare" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-center">
                        <h5 class="modal-title" id="exampleModalLabel">Share</h5>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
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
                /* Batasi agar tidak terlalu besar */
                height: auto;
                border-radius: 15px;
            }
        </style>

    </div>
</div>
