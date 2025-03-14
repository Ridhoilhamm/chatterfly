<div>
    <section class="vh-100 bg-white mb-2"
    style="background: linear-gradient(to top, rgba(95, 201, 180, 1) 0%, rgba(95, 201, 180, 0) 50%);">
    <div style="background: linear-gradient(to top, rgb(95, 201, 180), rgba(68, 173, 159, 0.853)); 
    padding: 30px 0;  position: relative; margin: 0; color: white; 
    backdrop-filter: blur(10px);"
        class="d-flex justify-content-center">
        <div class="justify-content-center">
            <img src="{{ asset('logo pictorial3.png') }}" style="height: 100px; width:100px;" alt="Icon Chatterly">
            <p class="mt-2 text-center" style="font-size: 20px;">Chaterrfly</p>
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
        <div class="container py-3 h-100" style="padding-bottom: 20px;">
            <div class="row d-flex justify-content-center align-items-center h-10l0">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card text-white" style="border-radius: 1rem; " style="color: black">
                        <div class="card-body p-3 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5" style="color: black">
                                <h2 class="fw-bold mb-2 text-center">Register</h2>
                                <p class="text-white-50 mb-4">Daftarkan Akun Anda</p>

                                <form wire:submit.prevent="register">
                                    <div class="form-outline form-white mb-2">
                                        <input type="text" wire:model="name" class="form-control form-control-lg"
                                            placeholder="Name" style="font-size: 14px;" required />

                                        @error('name')
                                            <span class="text-danger">{{ 'masukan nama' }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-outline form-white mb-2">
                                        <input type="email" wire:model="email" class="form-control form-control-lg"
                                            placeholder="Email"  style="font-size: 14px;"  required />
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="position-relative">
                                        <input type="password" wire:model="password" id="typePasswordX"
                                            class="form-control form-control-lg pr-5 mb-2" placeholder="Password" required style="font-size:14px;" />
                                        <i class="fa fa-eye position-absolute" id="togglePassword" 
                                            style="right: 15px; top: 50%; transform: translateY(-50%); cursor: pointer;"></i>
                                    </div>
                                    <div class="position-relative">
                                        <input type="password" wire:model="password_confirmation" id="typePasswordX"
                                            class="form-control form-control-lg pr-5 mb-4" placeholder="Konfirmasi Password" required style="font-size:14px;" />
                                        <i class="fa fa-eye position-absolute" id="togglePassword" 
                                            style="right: 15px; top: 50%; transform: translateY(-50%); cursor: pointer;"></i>
                                    </div>

                                    <script>
                                        document.getElementById("togglePassword").addEventListener("click", function () {
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
                                    <button class="btn" type="submit"
                                        style="background: linear-gradient(to right, rgba(68, 173, 159, 0.9), rgba(68, 173, 159, 0.7), rgba(68, 173, 159, 0.3)); 
                                               color: white; border: none; padding: 12px 50px; border-radius: 8px; font-weight: bold; width: 100%;">
                                        Daftar
                                    </button>
                                </form>

                                <div class="mt-4">
                                    <p class="mb-0">Sudah Punya Akun?
                                        <a href="{{ route('login') }} " class="text-white-50 fw-bold" style="text-decoration: underline;">Login</a>
                                    </p>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
         a {
            color: inherit;
            text-decoration: none;
        }
    </style>

</div>
