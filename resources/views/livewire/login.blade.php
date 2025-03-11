<div>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-4 text-uppercase" style="font-size: 16px;">Login</h2>
                                <form wire:submit.prevent="login">
                                    <div class="form-outline form-white mb-4">
                                        <input type="email" wire:model="email" id="typeEmailX"
                                            class="form-control form-control-lg" placeholder="Email" required />
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <input type="password" wire:model="password" id="typePasswordX"
                                            class="form-control form-control-lg" placeholder="Passsword" required />
                                    </div>
                                    <p class="d-flex justify-content-end mt-1 mb-3" style="font-size:13px;"
                                    data-bs-toggle="modal" data-bs-target="#changepassword">Lupa Kata Sandi</p>
                                    <button class="btn btn-outline-light btn-lg px-5" type="submit">
                                        Login
                                    </button>
                                </form>
                                <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                    <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                                    <a href="#!" class="text-white"><i
                                            class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                    <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                                </div>
                            </div>

                            <div>
                                <p class="mb-0">Don't have an account?
                                    <a href="registrasi" class="text-white-50 fw-bold">Sign Up</a>
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
        {{-- modals lupa kata sandi --}}
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
    </section>
</div>

