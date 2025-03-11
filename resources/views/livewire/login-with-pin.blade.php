<div style="padding-bottom:98px; padding-top:137px; background-color: #44ad9f;">
    <div class=" mx-auto mt-1 p-4 rounded shadow" style="background-color: #44ad9f;">
        <div class="d-flex justify-content-center align-items-center">
            <div class="d-flex align-items-center justify-content-center rounded-circle shadow bg-gradient"
                style="width: 120px; height: 120px; background: linear-gradient(to right, rgba(68, 173, 159, 0.9), rgba(68, 173, 159, 0.7), rgba(68, 173, 159, 0.3)); color:white;">
                <div id="lottie-animation" style="width: 160px; height: 150px;"></div>
            </div>
        </div>
        <p class="text-center text-2xl font-bold my-4 text-white">Silahkan Masukkan PIN</p>
        @if (session()->has('error'))
            <div class="text-red-500 text-sm mb-2 text-center">{{ session('error') }}</div>
        @endif
        <div class="d-flex justify-content-center gap-3">
            @for ($i = 0; $i < 6; $i++)
                <input type="tel" maxlength="1" pattern="[0-9]*" inputmode="numeric"
                    class="form-control text-center pin-input" id="pin-{{ $i }}"
                    oninput="moveToNext(this, {{ $i }})"
                    onkeydown="moveToPrev(event, this, {{ $i }})"
                    wire:model.live="pinArray.{{ $i }}" wire:change="checkPinCompletion">
            @endfor
            <script>
                document.addEventListener("livewire:load", () => {
                    Livewire.on('pinComplete', () => {
                        console.log("PIN lengkap! Login otomatis...");
                    });
                });
            </script>
        </div>
        <div class="d-flex justify-content-center mt-2 px-2">
            <p class="lupa-pin text-white" style="font-size:16px;" data-bs-toggle="modal" data-bs-target="#changepin">
                Lupa Pin? Click disini</p>
        </div>
        <div class="d-flex justify-content-center" style="margin-top:65px;">
            <div class="d-flex justify-content-center align-items-center rounded-circle shadow"
                style="width: 80px; height: 80px; background: rgba(255, 255, 255, 0.778);">
                <a href="/profile" class="d-flex justify-content-center align-items-center"
                    style="width: 100%; height: 100%;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left"
                        style="color: black;">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M15 6l-6 6l6 6" />
                    </svg>
                </a>
            </div>
        </div>


    </div>
    <div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="wave wave-bottom">
            <path fill="#FFFFFF" fill-opacity="0.2"
                d="M0,160L48,144C96,128,192,96,288,117.3C384,139,480,213,576,245.3C672,277,768,267,864,234.7C960,203,1056,149,1152,112C1248,75,1344,53,1392,42.7L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
            </path>
        </svg>

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="wave wave-top">
            <path fill="#FFFFFF" fill-opacity="0.2"
                d="M0,288L24,272C48,256,96,224,144,192C192,160,240,128,288,101.3C336,75,384,53,432,74.7C480,96,528,160,576,160C624,160,672,96,720,106.7C768,117,816,203,864,229.3C912,256,960,224,1008,192C1056,160,1104,128,1152,138.7C1200,149,1248,203,1296,213.3C1344,224,1392,192,1416,176L1440,160L1440,320L1416,320C1392,320,1344,320,1296,320C1248,320,1200,320,1152,320C1104,320,1056,320,1008,320C960,320,912,320,864,320C816,320,768,320,720,320C672,320,624,320,576,320C528,320,480,320,432,320C384,320,336,320,288,320C240,320,192,320,144,320C96,320,48,320,24,320L0,320Z">
            </path>
        </svg>

    </div>

    {{-- modals lupa pin --}}
    <div wire:ignore.self class="modal fade" id="changepin" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 15px; overflow: hidden;">
                <div class="modal-body d-flex flex-column justify-content-center align-items-center text-center">

                    <div class="d-flex align-items-center justify-content-center rounded-circle shadow bg-gradient"
                        style="width: 60px; height: 60px; background: linear-gradient(to right, rgba(68, 173, 159, 0.9), rgba(68, 173, 159, 0.7), rgba(68, 173, 159, 0.3)); color:white;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-lock-open-2">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M3 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z" />
                            <path d="M9 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
                            <path d="M13 11v-4a4 4 0 1 1 8 0v4" />
                        </svg>
                    </div>

                    <p class="mt-0">Lupa Pin</p>

                    <div class="w-100">
                        @if (session()->has('message'))
                            <div class="alert alert-success">{{ session('message') }}</div>
                        @elseif (session()->has('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        <div class="mb-3">
                            <input type="email" class="form-control" wire:model="email"
                                placeholder="Masukkan Email Aktif Anda">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Input PIN Baru --}}
                        <div class="mb-3">
                            <input type="password" class="form-control" wire:model="newPin"
                                placeholder="Masukkan PIN Baru (6 digit)">
                            @error('newPin')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Konfirmasi PIN --}}
                        <div class="mb-3">
                            <input type="password" class="form-control" wire:model="confirmPin"
                                placeholder="Konfirmasi PIN Baru">
                            @error('confirmPin')
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.9.6/lottie.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var animationContainer = document.getElementById('lottie-animation');
            if (animationContainer) {
                lottie.loadAnimation({
                    container: animationContainer,
                    renderer: 'svg',
                    loop: true,
                    autoplay: true,
                    path: '{{ asset('storage/users-avatar/Animation - 1740556671884.json') }}'
                });
            }
        });

        function moveToNext(input, index) {
            if (input.value.length === 1) {
                setTimeout(() => {
                    let nextInput = document.getElementById(`pin-${index + 1}`);
                    if (nextInput) nextInput.focus();
                }, 50);
            }
        }

        function moveToPrev(event, input, index) {
            if (event.key === "Backspace" && input.value === "") {
                setTimeout(() => {
                    let prevInput = document.getElementById(`pin-${index - 1}`);
                    if (prevInput) prevInput.focus();
                }, 50);
            }
        }
    </script>

    <style>
        .pin-input {
            width: 50px;
            height: 50px;
            font-size: 24px;
            text-align: center;
            border: 2px solid #ccc;
            border-radius: 6px;
            margin: 0 5px;
            /* Tambahkan margin kiri-kanan */
        }

        .wave-container {
            position: relative;
            width: 100%;
            height: 200px;
            overflow: hidden;
        }

        .wave {
            position: absolute;
            width: 100%;
            height: auto;
            bottom: 0;
        }

        .wave-bottom {
            z-index: 1;
        }

        .wave-top {
            z-index: 2;
            opacity: 0.7;
            /* Biar tetap kelihatan */
        }

        .lupa-pin {
            font-weight: normal;
            font-size: 18px;
            text-align: right;
            margin-right: 10px;
            /* Tambahkan jarak dari kanan */
        }
    </style>

</div>
