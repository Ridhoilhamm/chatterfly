<div>
    <div>
        <div class="container fixed-top d-flex align-items-center bg-white p-1 justify-content-center ">
            <a href="/page">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left mt-1" style="color: black" >
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M15 6l-6 6l6 6" />
                </svg>
            </a>
            <p class="container mt-3" style="font-size: 16px;" style="color:rgba(0, 0, 0, 0.686)">Postingan</p>
        </div>
    </div>
    <div style="position: relative; width: 100%; max-width: 600px; margin-top: 40px;">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(116).webp" alt="Foto Besar"
            style="width: 100%; height: 280px; object-fit: cover; margin-top:20px; border-radius: 0px;">
        <div class="d-flex justify-content-center"
            style="position: absolute; bottom: 10px; left: 15%; transform: translateX(-50%);
                    display: flex; align-items: center; gap: 8px; background: rgba(0,0,0,0.5);
                    padding: 5px 10px; border-radius: 20px; color: white;">

            <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(112).webp" alt="Avatar"
                class="rounded-circle" style="width: 35px; height: 35px; object-fit: cover; border: 2px solid white;">

            <p style="margin: 0; font-size: 12px;">Ridho Ilham</p>
        </div>

        <div
            style="position: absolute; bottom: 20px; right: 10px; 
               display: flex; flex-direction: column; align-items: center; 
               gap: 10px; background: 
            linear-gradient(to top, rgba(68, 173, 159, 0.908), rgba(68, 173, 159, 0.726), rgba(68, 173, 159, 0.141)) bottom; 
               padding: 10px; border-radius: 10px; color: white;">

            <div style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                <i class="fas fa-heart" style="color: red; cursor: pointer; font-size: 20px;"></i>
                <p style="margin: 2px 0 0; font-size: 10px; text-align: center;">Like</p>
            </div>

            <div style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                <i class="fas fa-comment" style="color: white; cursor: pointer; font-size: 20px;" data-toggle="modal"
                    data-target="#exampleModal"></i>
                <p style="margin: 2px 0 0; font-size: 10px; text-align: center;">Komen</p>
            </div>

            <div style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                <i class="fas fa-share" style="color: white; cursor: pointer; font-size: 20px;"></i>
                <p style="margin: 2px 0 0; font-size: 10px; text-align: center;">Share</p>
            </div>

        </div>
    </div>
    {{-- modals komentar --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-slide-up">
            <div class="modal-content">
                <div class="modal-header d-flex">
                    <h5 class="modal-title text-center w-100 " style="font-size:14px" id="exampleModalLabel">Komentar</h5>
                    <p><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-adjustments-horizontal"data-toggle="modal"
                            data-target="#modal-setting">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M14 6m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                            <path d="M4 6l8 0" />
                            <path d="M16 6l4 0" />
                            <path d="M8 12m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                            <path d="M4 12l2 0" />
                            <path d="M10 12l10 0" />
                            <path d="M17 18m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                            <path d="M4 18l11 0" />
                            <path d="M19 18l1 0" />
                        </svg></p>
                </div>
                <div class="modal-body">

                    <div class="d-flex align-items-start mb-3">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(112).webp"
                            class="rounded-circle me-2"
                            style="width: 40px; height: 40px; object-fit: cover; margin-right:10px;">
                        <div>
                            <div class="p-3 rounded bg-light d-flex flex-column"
                                style="max-width: 70%; border-radius: 20px 20px 20px 5px; position: relative;">
                                <strong style="font-size:12px;">Ridho Ilham</strong>
                                <p class="mb-1" style="font-size: 12px;">Halo! Bagaimana kabarmu hari ini?</p>
                                <small class="text-end"
                                    style="align-self: flex-end; font-size: 10px; color: gray;">10:45
                                    AM</small>
                            </div>
                            <div class="d-flex  gap-3 mt-1">
                                <p style="font-size: 12px; color: gray; cursor: pointer; margin-right: 10px; ">Balas</p>
                                <p style="font-size: 12px; color: gray; cursor: pointer; margin: 0;">Sembunyikan</p>
                            </div>
                        </div>

                    </div>
                    <p></p>
                    <div class="d-flex align-items-start mb-3">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(112).webp"
                            class="rounded-circle me-2" style="width: 40px; height: 40px; object-fit: cover;">
                        <div class="p-3 rounded bg-light" style="max-width: 70%; border-radius: 20px 20px 20px 5px;">
                            <strong>Ridho Ilham</strong>
                            <p class="mb-1" style="font-size:12px;">Halo! Bagaimana kabarmu hari ini?</p>
                            <small class="text-end" style="align-self: flex-end; font-size: 10px; color: gray;">10:45
                                AM</small>
                        </div>

                    </div>
                    <div class="d-flex align-items-start mb-3">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(112).webp"
                            class="rounded-circle me-2" style="width: 40px; height: 40px; object-fit: cover;">
                        <div class="p-3 rounded bg-light" style="max-width: 70%; border-radius: 20px 20px 20px 5px;">
                            <strong>Ridho Ilham</strong>
                            <p class="mb-1">Halo! Bagaimana kabarmu hari ini?</p>
                            <small class="text-muted">10:45 AM</small>
                        </div>
                    </div>

                    <div class="d-flex align-items-start justify-content-end mb-3">
                        <!-- Chat Bubble -->
                        <div class="p-3 rounded text-white bg-primary"
                            style="max-width: 70%; border-radius: 20px 20px 5px 20px;">
                            <strong>Kamu</strong>
                            <p class="mb-1">Hai! Aku baik-baik saja, bagaimana denganmu?</p>
                            <small class="text-white-50">10:46 AM</small>
                        </div>

                        <!-- Avatar -->
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(116).webp"
                            class="rounded-circle ms-2" style="width: 40px; height: 40px; object-fit: cover;">
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{--  --}}
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-right">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M9 6l6 6l-6 6" />
                            </svg>
                        </span>
                    </div>
                
                    <div class="d-flex justify-content-between align-items-center py-2">
                        <p class="mb-0" style="font-size:12px;">Batasi Komentar</p>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-right">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M9 6l6 6l-6 6" />
                            </svg>
                        </span>
                    </div>
                
                    <div class="d-flex justify-content-between align-items-center py-2">
                        <p class="mb-0" style="font-size:12px;">Nonaktifkan Komentar</p>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
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



    <div x-data="{ expanded: false }" class="content-box"
        style="background: white; padding: 5px; border-radius: 8px; box-shadow: 0px 4px 10px rgba(0,0,0,0.1); max-width: 600px; margin: auto;">
        <p x-bind:class="expanded ? 'expanded' : 'collapsed'" class="text mb-0"
            style="transition: max-height 0.4s ease-in-out; font-size: 14px; line-height: 1.6; color: #333;">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante
            dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris.
            Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent
            taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
        </p>
        <div style="display: flex; justify-content: flex-end;">
            <button @click="expanded = !expanded" class="btn-toggle"
                style="background: none; border: none; color: #007bff; font-size: 14px; cursor: pointer; padding: 5px;">
                <span x-text="expanded ? 'Tampilkan Lebih Sedikit' : 'Baca Selengkapnya'"></span>
            </button>
        </div>
    </div>
    <div style="position: relative; width: 100%; max-width: 600px;">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(117).webp" alt="Foto Besar"
            style="width: 100%; height: 280px; object-fit: cover;  border-radius: 5px;">
        <div class="d-flex justify-content-center"
            style="position: absolute; bottom: 10px; left: 16%; transform: translateX(-50%);
                    display: flex; align-items: center; gap: 8px; background: rgba(0,0,0,0.5);
                    padding: 5px 10px; border-radius: 20px; color: white;">

            <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(112).webp" alt="Avatar"
                class="rounded-circle" style="width: 35px; height: 35px; object-fit: cover; border: 2px solid white;">

            <p style="margin: 0; font-size: 12px;">Indra Ridho</p>
        </div>

        <div
            style="position: absolute; bottom: 20px; right: 10px; 
               display: flex; flex-direction: column; align-items: center; 
               gap: 10px; background: 
    linear-gradient(to top, rgba(68, 173, 159, 0.908), rgba(68, 173, 159, 0.726), rgba(68, 173, 159, 0.141)) bottom; 
               padding: 10px; border-radius: 10px; color: white;">

            <div style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                <i class="fas fa-heart" style="color: red; cursor: pointer; font-size: 20px;"></i>
                <p style="margin: 2px 0 0; font-size: 10px; text-align: center;">Like</p>
            </div>

            <div style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                <i class="fas fa-comment" style="color: white; cursor: pointer; font-size: 20px;"></i>
                <p style="margin: 2px 0 0; font-size: 10px; text-align: center;">Komen</p>
            </div>

            <div style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                <i class="fas fa-share" style="color: white; cursor: pointer; font-size: 20px;"></i>
                <p style="margin: 2px 0 0; font-size: 10px; text-align: center;">Share</p>
            </div>

        </div>
    </div>
    <div x-data="{ expanded: false }" class="content-box"
        style="background: white; padding: 5px; border-radius: 8px; box-shadow: 0px 4px 10px rgba(0,0,0,0.1); max-width: 600px; margin: auto;">
        <p x-bind:class="expanded ? 'expanded' : 'collapsed'" class="text mb-0"
            style="transition: max-height 0.4s ease-in-out; font-size: 14px; line-height: 1.6; color: #333;">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante
            dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris.
            Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent
            taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
        </p>
        <div style="display: flex; justify-content: flex-end;">
            <button @click="expanded = !expanded" class="btn-toggle"
                style="background: none; border: none; color: #007bff; font-size: 14px; cursor: pointer; padding: 5px;">
                <span x-text="expanded ? 'Tampilkan Lebih Sedikit' : 'Baca Selengkapnya'"></span>
            </button>
        </div>
    </div>

    <style>
        .collapsed {
            max-height: 60px;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 1
            ;
            -webkit-box-orient: vertical;
        }

        .expanded {
            max-height: 500px;
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
            height: 100%;
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

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>



</div>
