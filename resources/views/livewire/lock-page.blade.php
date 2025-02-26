<div style="background-color: white">
    <div class="">
        <div class="text-center"
            style="background: linear-gradient(to top, rgb(95, 201, 180), rgba(68, 173, 159, 0.853)); 
                padding: 20px 0;  position: relative; margin: 0; color: white; 
                backdrop-filter: blur(10px);">
            <div style="position: relative; display: inline-block; margin-top: 10px;">
                <img src="{{ asset('storage/users-avatar/' . Auth::user()->avatar) }}" alt="User Avatar"
                    style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover; display: block;">
                <div x-data="{ fileName: '', pickFile() { this.$refs.fileInput.click() }, handleFile() { this.fileName = this.$refs.fileInput.files[0]?.name || '' } }">
                    <!-- Input File (Hidden) -->
                    <input type="file" x-ref="fileInput" @change="handleFile" accept="image/*" style="display: none;">
                    <div @click="pickFile"
                        style="position: absolute; bottom: 15px; left: 50%; transform: translateX(70%);
                            background: white; border-radius: 50%; padding: 5px; width: 30px; height: 30px; 
                            display: flex; align-items: center; justify-content: center; box-shadow: 0px 2px 5px rgba(0,0,0,0.2); cursor: pointer;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="black" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-camera">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2" />
                            <path d="M9 13a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                        </svg>
                    </div>
                    <p x-text="fileName" style="margin-top: 10px;"></p>
                </div>
            </div>
            <h4 class="mt-2 mb-0" style="font-size:16px;">{{ Str::title(Auth::user()->name) }}</h4>
            <h4 class="mt-0 mb-0" style="font-size:16px;">{{ Str::title(Auth::user()->email) }}</h4>
            <p class="text-muted"></p>
        </div>

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"
            style="display: block; width: 100%; margin-top: -5px; padding: 0;">
            <path fill="url(#gradientGreen)" fill-opacity="1"
                d="M0,224L40,229.3C80,235,160,245,240,213.3C320,181,400,107,480,106.7C560,107,640,181,720,192C800,203,880,149,960,112C1040,75,1120,53,1200,58.7C1280,64,1360,96,1400,112L1440,128L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z">
            </path>
            <defs>
                <linearGradient id="gradientGreen" x1="0%" y1="0%" x2="0%" y2="100%">
                    <stop offset="0%" style="stop-color:#5FC9B3; stop-opacity:1" />
                    <stop offset="100%" style="stop-color:#44AD9F; stop-opacity:1" />
                </linearGradient>
            </defs>
        </svg>

        <div class="container" style="padding-bottom:30px;">
            <div class="list-group mt-1" style="font-size:12px">
                <a href=""class="list-group-item list-group-item-action mb-2 mt-2 d-flex align-items-center justify-content-between gap-2  "
                    style="font-size: 16px; background: linear-gradient(to right, rgba(68, 173, 159, 0.9), rgba(68, 173, 159, 0.7), rgba(68, 173, 159, 0.3)); 
                   padding: 15px; border-radius: 10px; color: white; border: none;"
                    data-bs-toggle="modal" data-bs-target="#changeInformasi">
                    <div class="d-flex align-items-center" style="padding-right: 10px; color:white;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 448 512">
                            <path fill="currentColor"
                                d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464l349.5 0c-8.9-63.3-63.3-112-129-112l-91.4 0c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3z" />
                        </svg>

                        <span class="flex-grow-1 mt-2" style="margin-left:10px;">Informasi Pribadi</span>
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-right">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M9 6l6 6l-6 6" />
                        </svg>
                    </div>

                </a>
                <a href="#"
                    class="list-group-item list-group-item-action mb-2 mt-2 d-flex align-items-center justify-content-between gap-2"
                    style="font-size: 16px; background: linear-gradient(to right, rgba(68, 173, 159, 0.9), rgba(68, 173, 159, 0.7), rgba(68, 173, 159, 0.3)); 
                       padding: 15px; border-radius: 10px; color: white; border: none;"
                    data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                    <div class="d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-lock">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z" />
                            <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
                            <path d="M8 11v-4a4 4 0 1 1 8 0v4" />
                        </svg>
                        <span class="ms-2 mt-2" style="margin-left:10px;">Ubah Kata Sandi</span>
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-right">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M9 6l6 6l-6 6" />
                        </svg>
                    </div>

                </a>

                <a href="#"
                    class="list-group-item list-group-item-action mb-2 mt-2 d-flex align-items-center justify-content-between gap-2"
                    style="font-size: 16px; background: linear-gradient(to right, rgba(68, 173, 159, 0.9), rgba(68, 173, 159, 0.7), rgba(68, 173, 159, 0.3)); 
                   padding: 15px; border-radius: 10px; color: white; border: none;"
                    data-bs-toggle="modal" data-bs-target="#pengaturan">

                    <div class="d-flex align-items-center " style="padding-right: 10px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-settings">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                            <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                        </svg>
                        <span class="flex-grow-1 mt-2" style="margin-left:10px;">Pengaturan </span>
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-right">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M9 6l6 6l-6 6" />
                        </svg>
                    </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action mb-2  mt-2 d-flex align-items-center"
                    style="font-size: 16px; background: linear-gradient(to right, rgba(68, 173, 159, 0.9), rgba(68, 173, 159, 0.7), rgba(68, 173, 159, 0.3)); 
                    padding: 15px; border-radius: 10px; color: white; border:none;"
                    data-bs-toggle="modal" data-bs-target="#exampleModal">

                    <div class="d-flex align-items-center " style="padding-right: 10px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-logout">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                            <path d="M9 12h12l-3 -3" />
                            <path d="M18 15l3 -3" />
                        </svg>
                    </div>
                    <span class="flex-grow-1 mt-2">Keluar</span>
                </a>
            </div>
        </div>
    </div>

    {{-- modals change image --}}
    <div class="modal fade" id="changeimage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 15px; overflow: hidden;">
                <div class="modal-body d-flex flex-column justify-content-center align-items-center text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                        <path d="M16 5l3 3" />
                    </svg>
                    <div class="mt-2">
                        <label for="imageUpload" class="form-label">Edit Image</label>
                        <input type="file" class="form-control" id="imageUpload" accept="image/*">
                    </div>
                </div>
                <div class="mb-3 justify-content-center align-items-center text-center">
                    <button class="btn"
                        style="background: linear-gradient(to right, rgba(255, 69, 58, 0.9), rgba(255, 69, 58, 0.7), rgba(255, 69, 58, 0.3)); 
                           color: white; border: none; padding: 10px 20px; border-radius: 8px; font-weight: bold; margin-right:10px"
                        data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button class="btn"
                        style="background: linear-gradient(to right, rgba(68, 173, 159, 0.9), rgba(68, 173, 159, 0.7), rgba(68, 173, 159, 0.3)); 
                           color: white; border: none; padding: 10px 20px; border-radius: 8px; font-weight: bold; margin-right:10px;">
                        Simpan
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- modals Informasi Pribadi --}}
    <div>
        <div class="modal fade" id="changeInformasi" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="border-radius: 15px; overflow: hidden;">
                    <div class="modal-body d-flex flex-column justify-content-center align-items-center text-center">
                        <div class="d-flex align-items-center justify-content-center rounded-circle shadow bg-gradient"
                            style="width: 60px; height: 60px; background: linear-gradient(to right, rgba(68, 173, 159, 0.9), rgba(68, 173, 159, 0.7), rgba(68, 173, 159, 0.3));">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                viewBox="0 0 448 512">
                                <path fill="white"
                                    d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464l349.5 0c-8.9-63.3-63.3-112-129-112l-91.4 0c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3z" />
                            </svg>
                        </div>

                        <p class="mb-2 mt-2" style="font-size:18px;">Informasi Pribadi</p>

                        <div class="modal-body w-100 p-0 mt-0">
                            <div class="position-relative mb-2">
                                <label class="d-block w-100" style="text-align: left !important;">Nama</label>
                                <input type="text" class="form-control w-100 pe-5 mt-0" wire:model="name"
                                    style="height: 45px;">
                            </div>

                            <div class="position-relative mb-2">
                                <label class="d-block w-100" style="text-align: left !important;">Email</label>
                                <input type="text" class="form-control w-100 pe-5 mt-1" wire:model="email"
                                    style="height: 45px;">
                            </div>

                            <div class="mb-2">
                                <label class="d-block w-100" style="text-align: left !important;">Bio</label>
                                <textarea class="form-control w-100" wire:model="bio" rows="1" placeholder="Ceritakan tentang diri Anda"
                                    style="height: 60px;"></textarea>
                            </div>
                        </div>

                    </div>

                    <div class="mb-3 d-flex justify-content-center align-items-center" style="margin-right:-162px;">
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
                        <button class="btn" wire:click="updateProfile"
                            style="background: linear-gradient(to right, rgba(68, 173, 159, 0.9), rgba(68, 173, 159, 0.7), rgba(68, 173, 159, 0.3)); 
                               color: white; border: none; padding: 10px 20px; border-radius: 8px; font-weight: bold;">
                            Simpan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('closeModal', event => {
            $('#changeInformasi').modal('hide'); // Tutup modal dengan Bootstrap
        });
    </script>

    {{-- modalschangepassword --}}
    <div wire:ignore.self class="modal fade" id="changePasswordModal" tabindex="-1"
        aria-labelledby="changePasswordLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 15px; overflow: hidden;">
                <div class="modal-body d-flex flex-column justify-content-center align-items-center text-center mb-0">

                    <div class="d-flex align-items-center justify-content-center rounded-circle shadow bg-gradient"
                        style="width: 60px; height: 60px; background: linear-gradient(to right, rgba(68, 173, 159, 0.9), rgba(68, 173, 159, 0.7), rgba(68, 173, 159, 0.3)); color:white;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-lock">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z" />
                            <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
                            <path d="M8 11v-4a4 4 0 1 1 8 0v4" />
                        </svg>
                    </div>

                    <h5 class="mt-2 mb-3">Ubah Password</h5>
                    @if (session()->has('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @elseif (session()->has('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <div class=" w-100 mb-0">
                        <!-- Password Lama -->
                        <div class="position-relative">
                            <input type="password" class="form-control w-100 pe-5 mb-2" wire:model="oldPassword"
                                placeholder="Masukkan Password Lama"
                                style="font-size: 15px; height: 45px; padding: 10px;">
                            @error('oldPassword')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="position-relative">
                            <input type="password" class="form-control w-100 pe-5 mb-2" wire:model="newPassword"
                                placeholder="Masukkan Password Baru"
                                style="font-size: 15px; height: 45px; padding: 10px;">
                            @error('newPassword')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="position-relative">
                            <input type="password" class="form-control w-100 pe-5" wire:model="confirmPassword"
                                placeholder="Konfirmasi Password Baru"
                                style="font-size: 15px; height: 45px; padding: 10px;">
                            @error('confirmPassword')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <p class="d-flex justify-content-end mt-1 mb-3" style="font-size:13px;"
                            data-bs-toggle="modal" data-bs-target="#changepassword">Lupa Kata Sandi</p>
                    </div>

                    <div class="mb-3 d-flex justify-content-center align-items-center" style="margin-right:-162px;">
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
                        <button class="btn" wire:click="updatePassword"
                            style="background: linear-gradient(to right, rgba(68, 173, 159, 0.9), rgba(68, 173, 159, 0.7), rgba(68, 173, 159, 0.3)); 
                               color: white; border: none; padding: 10px 20px; border-radius: 8px; font-weight: bold;">
                            Simpan
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>


    {{-- modals lupa password --}}
    <div wire:ignore.self class="modal fade" id="changepassword" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 15px; overflow: hidden;">
                <div class="modal-body d-flex flex-column justify-content-center align-items-center text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-lock-open-2">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z" />
                        <path d="M9 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
                        <path d="M13 11v-4a4 4 0 1 1 8 0v4" />
                    </svg>
                    <p class="mt-0">Lupa Kata Sandi</p>

                    <div class=" w-100">
                        {{-- Pesan Sukses/Error --}}
                        @if (session()->has('message'))
                            <div class="alert alert-success">{{ session('message') }}</div>
                        @elseif (session()->has('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <div class="position-relative mb-0">
                            <input type="email" class="form-control w-100 pe-5 mt-2 mb-0" wire:model="email"
                                placeholder="Masukkan Email Aktif Anda"
                                style="font-size: 16px; height: 45px; padding: 10px;">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3 d-flex justify-content-center align-items-center" style="margin-right:-162px;">
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
                    <button class="btn" wire:click="sendResetLink"
                        style="background: linear-gradient(to right, rgba(68, 173, 159, 0.9), rgba(68, 173, 159, 0.7), rgba(68, 173, 159, 0.3)); 
                           color: white; border: none; padding: 10px 20px; border-radius: 8px; font-weight: bold;">
                        Simpan
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- menambahkan pin   --}}
    <div wire:ignore.self class="modal fade" id="tambahpin" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 15px; overflow: hidden;">
                <div class="modal-body d-flex flex-column justify-content-center align-items-center text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-lock-open-2">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z" />
                        <path d="M9 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
                        <path d="M13 11v-4a4 4 0 1 1 8 0v4" />
                    </svg>
                    <p class="mt-0">Tambahkan PIN</p>

                    <div class="w-100">
                        @if (session()->has('message'))
                            <div class="alert alert-success">{{ session('message') }}</div>
                        @endif

                        <div class="position-relative mb-0">
                            <input type="password" class="form-control w-100 pe-5 mt-2 mb-0" wire:model="pin"
                                placeholder="Masukkan PIN (6 digit)"
                                style="font-size: 16px; height: 45px; padding: 10px;">
                            @error('pin')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3 d-flex justify-content-center align-items-center">
                    <button class="btn" data-bs-dismiss="modal"
                        style="background: transparent; color: rgba(0, 0, 0, 0.712); 
                    border: 1px solid rgba(0, 0, 0, 0.712); padding: 10px 20px; 
                    border-radius: 8px; font-weight: bold; margin-right: 10px;">
                        Batal
                    </button>
                    <button class="btn" wire:click="savePin"
                        style="background: linear-gradient(to right, rgba(68, 173, 159, 0.9), 
                    rgba(68, 173, 159, 0.7), rgba(68, 173, 159, 0.3)); color: white; 
                    border: none; padding: 10px 20px; border-radius: 8px; font-weight: bold;">
                        Simpan
                    </button>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modal = document.getElementById('tambahpin');

            modal.addEventListener('hidden.bs.modal', function() {
                document.body.classList.remove('modal-open'); // Hilangkan efek modal
                var backdrop = document.querySelector('.modal-backdrop');
                if (backdrop) {
                    backdrop.remove();
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modal = document.getElementById('changepassword');

            modal.addEventListener('hidden.bs.modal', function() {
                document.body.classList.remove('modal-open'); // Hilangkan efek modal
                var backdrop = document.querySelector('.modal-backdrop');
                if (backdrop) {
                    backdrop.remove();
                }
            });
        });
    </script>
    {{-- modals pengaturan --}}
    <div wire:ignore.self class="modal fade" id="pengaturan" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 15px; overflow: hidden;">
                <div class="modal-body d-flex flex-column justify-content-center align-items-center text-center">
                    <div class="d-flex align-items-center justify-content-center rounded-circle shadow bg-gradient"
                        style="width: 60px; height: 60px; background: linear-gradient(to right, rgba(68, 173, 159, 0.9), rgba(68, 173, 159, 0.7), rgba(68, 173, 159, 0.3)); color:white;">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" width="24" height="24"
                            fill="currentColor">
                            <path
                                d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l362.8 0c-5.4-9.4-8.6-20.3-8.6-32l0-128c0-2.1 .1-4.2 .3-6.3c-31-26-71-41.7-114.6-41.7l-91.4 0zM528 240c17.7 0 32 14.3 32 32l0 48-64 0 0-48c0-17.7 14.3-32 32-32zm-80 32l0 48c-17.7 0-32 14.3-32 32l0 128c0 17.7 14.3 32 32 32l160 0c17.7 0 32-14.3 32-32l0-128c0-17.7-14.3-32-32-32l0-48c0-44.2-35.8-80-80-80s-80 35.8-80 80z" />
                        </svg>
                    </div>
                    <div class="mt-2">
                        Keamanan
                    </div>
                    <div class="modal-body p-4 bg-light rounded">

                        <div class="list-group">
                            <button class="list-group-item list-group-item-action d-flex align-items-center">
                                <i class="bi bi-bell-fill"></i>
                                <span class="fw-semibold">Notifikasi Pertemanan</span>
                            </button>
                            <button class="list-group-item list-group-item-action d-flex align-items-center">
                                <i class="bi bi-fingerprint fs-4 text-primary me-3"></i>
                                <span class="fw-semibold">Tambahkan Sidik Jari</span>
                            </button>

                            <button class="list-group-item list-group-item-action d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#tambahpin">
                                <i class="bi bi-key-fill fs-4 text-danger me-3"></i>
                                <span class="fw-semibold">Tambahkan PIN Private</span>
                            </button>
                        </div>
                    </div>

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
                        Keluar
                    </button>
                </div>
            </div>
        </div>
    </div>


    {{-- modals Logout --}}
    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 15px; overflow: hidden;">
                <div class="modal-body d-flex flex-column justify-content-center align-items-center text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-alert-square-rounded">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z" />
                        <path d="M12 8v4" />
                        <path d="M12 16h.01" />
                    </svg>
                    <div class="mt-2">
                        Apakah Anda Yakin Untuk Keluar?
                    </div>
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
                        Keluar
                    </button>
                </div>
            </div>
        </div>
    </div>


    <style>
        @keyframes slideInFromRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideOutToRight {
            from {
                transform: translateX(0);
                opacity: 1;
            }

            to {
                transform: translateX(100%);
                opacity: 0;
            }
        }

        #changeInformasi.modal.fade .modal-dialog {
            transition: transform 0.3s ease-out, opacity 0.3s ease-out;
            transform: translateX(100%);
        }

        #changeInformasi.modal.show .modal-dialog {
            transform: translateX(0);
        }

        #changepassword.modal.fade .modal-dialog {
            transition: transform 0.3s ease-out, opacity 0.3s ease-out;
            transform: translateX(100%);
        }
        #tambahpin.modal.fade .modal-dialog {
            transition: transform 0.3s ease-out, opacity 0.3s ease-out;
            transform: translateX(100%);
        }

        #tambahpin.modal.show .modal-dialog {
            transform: translateX(0);
        }
        #changepassword.modal.show .modal-dialog {
            transform: translateX(0);
        }
    </style>

</div>
