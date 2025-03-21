<div class="bg-white min-vh-100 mb-5">
    <div class="d-flex align-items-center justify-content-between px-2 " style="padding-top:10px;">
        <div>
            <a href="{{ route('detailchatgroup') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M15 6l-6 6l6 6" />
                </svg>
            </a>
        </div>
        <div class="flex-grow-1 text-center">
            <p class="m-0">Group</p>
        </div>
        <div data-bs-toggle="modal" data-bs-target="#edit" style="width: 24px; margin-right:15px;">
            Edit
        </div>
    </div>
    <div class="py-4">
        <div class=" d-flex justify-content-center ">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-5.webp" alt="Gambar Grup "
                class="rounded-circle">
        </div>
        <div class="d-flex justify-content-center">
            <P>Komunitas BKK</P>
        </div>
        <div class="px-3">
            <div class=" border rounded p-2 pb-5" style="background-color: hsl(210, 17%, 93%);">
                <p class="px-1">Mohon Admin Grup Memasukkan Bio...</p>

            </div>
        </div>
    </div>
    <div class="container d-flex align-items-center justify-content-between w-100 border-bottom pb-2">
        <p class="mb-0">16 Anggota</p>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="icon icon-tabler icons-tabler-outline icon-tabler-search">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
            <path d="M21 21l-6 -6" />
        </svg>
    </div>
    <div class="container">
        <div class="px-4 pt-2 pb-2 mt-2 rounded" style="background-color: hsl(210, 17%, 93%);">
            <div class="border-bottom">
                <div class="d-flex align-items-center pb-1 ">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp" alt="icon foto"
                        class="rounded-circle" style="width:50px; height:50px; ">
                    <p style="margin-left:10px">Anda</p>
                </div>
            </div>
            <div class="border-bottom mt-2">
                <div class="d-flex align-items-center pb-1">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp" alt="icon foto"
                        class="rounded-circle" style="width:50px; height:50px; ">
                    <p style="margin-left:10px">Jhoen Doe</p>
                </div>
            </div>
            <div class="border-bottom mt-2">
                <div class="d-flex align-items-center pb-1">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp" alt="icon foto"
                        class="rounded-circle" style="width:50px; height:50px; ">
                    <p style="margin-left:10px">Doe Jhoen</p>
                </div>
            </div>
            <div class="border-bottom mt-2">
                <div class="d-flex align-items-center pb-1">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp" alt="icon foto"
                        class="rounded-circle" style="width:50px; height:50px; ">
                    <p style="margin-left:10px">Assep Muhammad</p>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <p class="mb-0 mt-2 pb-2 pt-1" data-bs-toggle="modal" data-bs-target="#changePassword">Lihat Semua</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-right" data-bs-toggle="modal"
                    data-bs-target="#changePassword">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M9 6l6 6l-6 6" />
                </svg>
            </div>
        </div>
    </div>

    {{-- modals lihat semua anggota --}}
    <div wire:ignore.self class="modal fade" id="changePassword" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content px-3" style="border-radius: 15px; overflow: hidden;">
            <div class="modal-body d-flex flex-column justify-content-center align-items-center text-center">
                <p class="mb-2 mt-2" style="font-size:18px;">Anggota</p>
            </div>
            <div class="container" style="max-height: 300px; overflow-y: auto;">
                <div class="border-bottom">
                    <div class="d-flex align-items-center pb-1">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp" alt="icon foto"
                            class="rounded-circle" style="width:50px; height:50px;">
                        <p style="margin-left:10px">Ikram</p>
                    </div>
                </div>
                <div class="border-bottom mt-2">
                    <div class="d-flex align-items-center pb-1">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp" alt="icon foto"
                            class="rounded-circle" style="width:50px; height:50px;">
                        <p style="margin-left:10px">Jhoen Doe</p>
                    </div>
                </div>
                <div class="border-bottom mt-2">
                    <div class="d-flex align-items-center pb-1">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp" alt="icon foto"
                            class="rounded-circle" style="width:50px; height:50px;">
                        <p style="margin-left:10px">Doe Jhoen</p>
                    </div>
                </div>
                <div class="border-bottom mt-2">
                    <div class="d-flex align-items-center pb-1">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp" alt="icon foto"
                            class="rounded-circle" style="width:50px; height:50px;">
                        <p style="margin-left:10px">Assep Muhammad</p>
                    </div>
                </div>
                <div class="border-bottom">
                    <div class="d-flex align-items-center pb-1">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp" alt="icon foto"
                            class="rounded-circle" style="width:50px; height:50px;">
                        <p style="margin-left:10px">Sholihin</p>
                    </div>
                </div>
                <div class="border-bottom mt-2">
                    <div class="d-flex align-items-center pb-1">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp" alt="icon foto"
                            class="rounded-circle" style="width:50px; height:50px;">
                        <p style="margin-left:10px">Jhoen Doe</p>
                    </div>
                </div>
                <div class="border-bottom mt-2">
                    <div class="d-flex align-items-center pb-1">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp" alt="icon foto"
                            class="rounded-circle" style="width:50px; height:50px;">
                        <p style="margin-left:10px">Doe Jhoen</p>
                    </div>
                </div>
                <div class="border-bottom mt-2">
                    <div class="d-flex align-items-center pb-1">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp" alt="icon foto"
                            class="rounded-circle" style="width:50px; height:50px;">
                        <p style="margin-left:10px">Assep Muhammad</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    {{-- modals logout  --}}
    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
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
                    Apakah Anda Yakin Untuk Keluar?
                </div>
                <div class="mb-3 justify-content-center align-items-center text-center ">
                    <button class="btn" data-bs-dismiss="modal"
                        style="background: transparent; 
   color: rgba(0, 0, 0, 0.712); 
   border: 1px solid rgba(0, 0, 0, 0.712); 
   padding: 10px 20px; 
   border-radius: 8px; 
   font-weight: bold; 
   margin-right: 10px;">
                        Batal
                    </button>

                    <button class="btn" wire:click="logout"
                        style="background: linear-gradient(to right, rgba(255, 69, 58, 0.9), rgba(255, 69, 58, 0.7), rgba(255, 69, 58, 0.3)); 
                   color: white; border: none; padding: 10px 20px; border-radius: 8px; font-weight: bold;">
                        Keluar
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- modals laporkan --}}




    <div class="pb-5 px-3 mt-3">
        <div class="container border rounded p-2" style="background-color: hsl(210, 17%, 93%);">
            <div class="d-flex justify-content-between align-items-center" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                <p class="mb-0">Keluar dari Grup</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-right">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M9 6l6 6l-6 6" />
                </svg>
            </div>
            <hr>
            <p class="mb-0" data-bs-toggle="modal" data-bs-target="#reportgrup">Laporkan Grup</p>

        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="reportgrup" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 15px; overflow: hidden;">
                <div class="modal-body d-flex flex-column justify-content-center align-items-center text-center">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-alert-triangle">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 9v4" />
                            <path
                                d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z" />
                            <path d="M12 16h.01" />
                        </svg>
                    </div>
                    <p class="mb-1 mt-2" style="font-size:18px;">Laporkan Grup?</p>
                    <p class="text-secondary" style="font-size: 14px;">5 Pesan terakhir akan dikirimkan ke Chatterfly.
                        Tidak ada peserta grup ini yang diberitahu.</p>
                </div>
                <div class="border-bottom">
                    <div class="mt-2 mb-3 d-flex justify-content-start px-5">
                        Apakah Anda Yakin Dengan Keputusan?
                    </div>
                </div>
                <div class="px-5 border-bottom">
                    <div class=" d-flex justify-content-between  align-items-center">

                        <p class="mb-0 mt-2 pt-1 align-items-center">Laporkan
                            dan Keluar</p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-logout " style="color: red">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                            <path d="M9 12h12l-3 -3" />
                            <path d="M18 15l3 -3" />
                        </svg>
                    </div>
                </div>
                <div class=" d-flex justify-content-between align-items-center px-5">
                    <p class="mb-0 mt-2 pb-4">Laporkan
                    </p>
                    <div class=" mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-alert-triangle" style="color: red">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 9v4" />
                            <path
                                d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z" />
                            <path d="M12 16h.01" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modals edit profil dan nama grup --}}
    <div wire:ignore.self class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 15px; overflow: hidden;">
                <div class="d-flex justify-content-center mt-4">
                    <div class="d-flex justify-content-center position-relative">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-5.webp" 
                            alt="Gambar Grup" class="rounded-circle" style="width: 80px; height: 80px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-edit position-absolute"
                            style="bottom: 0; right: 0; background: white; border-radius: 50%; padding: 4px;">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"/>
                            <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"/>
                            <path d="M16 5l3 3"/>
                        </svg>
                    </div>         
                </div>
                <div class="px-5">
                    <div class="mt-2 mb-2 p-2 d-flex justify-content-start border rounded"
                        style="background-color: hsl(210, 17%, 93%);">
                        Komunitas BKK
                    </div>
                </div>
                <div class="pb-4 pt-2 justify-content-center align-items-center text-center ">
                    <button class="btn" data-bs-dismiss="modal"
                        style="background: transparent; 
       color: rgba(0, 0, 0, 0.712); 
       border: 1px solid rgba(0, 0, 0, 0.712); 
       padding: 5px 20px; 
       border-radius: 8px; 
       font-weight: bold; 
       margin-right: 10px;">
                        Batal
                    </button>
                    <button class="btn" wire:click="updatePassword"
                    style="background: linear-gradient(to right, rgba(68, 173, 159, 0.9), rgba(68, 173, 159, 0.7), rgba(68, 173, 159, 0.3)); 
                       color: white; border: none; padding: 6px 20px; border-radius: 8px; font-weight: bold;">
                    Simpan
                </button>
                </div>
            </div>
        </div>
    </div>
    <style>
        a {
            color: inherit;
            text-decoration: none;
        }
    </style>

</div>
