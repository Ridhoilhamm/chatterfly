<div>
    <section class="vh-100 bg-white "
        style="background: linear-gradient(to top, rgba(95, 201, 180, 1) 0%, rgba(95, 201, 180, 0) 50%);">
        <div style="background: linear-gradient(to top, rgb(95, 201, 180), rgba(68, 173, 159, 0.853)); 
        padding-top: 60px;  position: relative; margin: 0; color: white; 
        backdrop-filter: blur(10px);"
            class="d-flex justify-content-center">
            <div class="justify-content-center pt-2">
                <img src="{{ asset('logo pictorial3.png') }}" style="height: 90px; width:90px;" alt="Icon Chatterly">
                <p class="mt-2 text-center" style="font-size: 20px;">Chaterfly</p>
            </div>
        </div>
        <div style="position: relative; width: 100%; height: 80px; overflow: hidden;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 340"
                style="position: absolute; top: -3px; left: 0; width: 100%;">
                <path fill="#3A8070" fill-opacity="1" transform="scale(-1, 1) translate(-1440, 10)"
                    d="M0,64L80,101.3C160,139,320,213,480,218.7C640,224,800,160,960,122.7C1120,85,1280,75,1360,69.3L1440,64L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z">
                </path>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 340"
                style="position: absolute; top: 0; left: 0; width: 100%;">
                <path fill="#5FC9B3" fill-opacity="1"
                    d="M0,64L80,101.3C160,139,320,213,480,218.7C640,224,800,160,960,122.7C1120,85,1280,75,1360,69.3L1440,64L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z">
                </path>
            </svg>
        </div>
        <div class="container py-1 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-4" style="padding-bottom:70px;">
                    <div class="card text-white" style="border-radius: 1rem;">
                        <div class="card-body text-center" style="color: black; padding:40px;">
                            <div class="mb-md-4 mt-md-4 pb-2">
                                <h2 class="fw-bold mb-4 text-center" style="font-size: 22px;">Selamat Datang</h2>
                                <form wire:submit.prevent="login">
                                    <div class="form-outline form-white mb-4">
                                        <input type="email" wire:model="email" id="typeEmailX"
                                            class="form-control form-control-lg" placeholder="Email"
                                            style="font-size: 18px;" required />
                                    </div>
                                    <div class="position-relative">
                                        <input type="password" wire:model="password" id="typePasswordX"
                                            class="form-control form-control-lg pr-6" placeholder="Kata Sandi" required
                                            style="font-size:18px;" />
                                        <i class="fa fa-eye position-absolute" id="togglePassword"
                                            style="right: 15px; top: 50%; transform: translateY(-50%); cursor: pointer;"></i>
                                    </div>
                                    <script>
                                        document.getElementById("togglePassword").addEventListener("click", function() {
                                            let passwordField = document.getElementById("typePasswordX");
                                            let icon = this;
                                            if (passwordField.type === "password") {
                                                passwordField.type = "text";
                                                icon.classList.remove("fa-eye-slash");
                                                icon.classList.add("fa-eye");
                                            } else {
                                                passwordField.type = "password";
                                                icon.classList.remove("fa-eye");
                                                icon.classList.add("fa-eye-slash");
                                            }
                                        });
                                    </script>
                                    <p class="d-flex justify-content-end mt-2 mb-2" style="font-size:13px;"
                                        data-bs-toggle="modal" data-bs-target="#changepassword">Lupa Kata Sandi</p>
                                    <div wire:ignore.self class="modal fade" id="changepassword" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-keyboard="false">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content" style="border-radius: 15px; overflow: hidden;">
                                                <div
                                                    class="modal-body d-flex flex-column justify-content-center align-items-center text-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="40"
                                                        height="40" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-lock-open-2">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path
                                                            d="M3 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z" />
                                                        <path d="M9 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
                                                        <path d="M13 11v-4a4 4 0 1 1 8 0v4" />
                                                    </svg>
                                                    <p class="mt-0">Lupa Kata Sandi</p>

                                                    <div class=" w-100">
                                                        {{-- Pesan Sukses/Error --}}
                                                        @if (session()->has('message'))
                                                            <div class="alert alert-success">{{ session('message') }}
                                                            </div>
                                                        @elseif (session()->has('error'))
                                                            <div class="alert alert-danger">{{ session('error') }}</div>
                                                        @endif
                                                        <div class="position-relative mb-0">
                                                            <input type="email"
                                                                class="form-control w-100 pe-5 mt-2 mb-0"
                                                                wire:model="email"
                                                                placeholder="Masukkan Email Aktif Anda"
                                                                style="font-size: 16px; height: 45px; padding: 10px;">
                                                            @error('email')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 d-flex justify-content-center align-items-center"
                                                    style="margin-right:-160px;">
                                                    <button class="btn" data-bs-dismiss="modal"
                                                        style="background: transparent; color: rgba(0, 0, 0, 0.712); border: 1px solid rgba(0, 0, 0, 0.712); padding: 10px 20px; border-radius: 8px; font-weight: bold; margin-right: 10px;">
                                                        Batal
                                                    </button>
                                                    <button class="btn" wire:click="sendResetLink"
                                                        style="background: linear-gradient(to right, rgba(68, 173, 159, 0.9), rgba(68, 173, 159, 0.7), rgba(68, 173, 159, 0.3)); color: white; border: none; padding: 10px 20px; border-radius: 8px; font-weight: bold;"
                                                        class="wh-100">
                                                        Kirim
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn" type="submit"
                                        style="background: linear-gradient(to right, rgba(68, 173, 159, 0.9), rgba(68, 173, 159, 0.7), rgba(68, 173, 159, 0.3)); 
                                               color: white; border: none; padding: 12px 50px; border-radius: 8px; font-weight: bold; width: 100%;">
                                        Masuk
                                    </button>
                                </form>
                                <div class="d-flex justify-content-center text-center mt-3 pt-1">
                                    <a href="https://www.facebook.com/?locale=id_ID" class="text-black"><i
                                            class="fab fa-facebook-f fa-lg"></i></a>
                                    <a href="https://www.instagram.com/" class="text-black"><i
                                            class="fab fa-instagram fa-lg mx-4 px-2"></i></a>
                                    <a href="#" class="text-black"><i class="fab fa-google fa-lg"></i></a>
                                </div>
                            </div>
                            <div>
                                <p class="mb-0">Belum Punya Akun?
                                    <a href="registrasi" class="text-white-50 fw-bold"
                                        style="text-decoration: underline; color:#44AD9F">Buat Akun</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @php
                $hideNavbar = true;
            @endphp
        </div>
    </section>
    <style>
        a {
            color: inherit;
            text-decoration: none;
        }
    </style>
</div>
