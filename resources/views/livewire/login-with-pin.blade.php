<div class="bg-white" style="padding-bottom:140px; padding-top:137px;">
    <div class=" mx-auto mt-10 bg-white p-4 rounded shadow">
        <div class="d-flex justify-content-center align-items-center">
            <div  class="d-flex align-items-center justify-content-center rounded-circle shadow bg-gradient"
    style="width: 120px; height: 120px; background: linear-gradient(to right, rgba(68, 173, 159, 0.9), rgba(68, 173, 159, 0.7), rgba(68, 173, 159, 0.3)); color:white;">

                <div id="lottie-animation" style="width: 160px; height: 150px;"></div>
            </div>
        </div>
        <h2 class="text-center text-2xl font-bold my-4">Masukkan PIN</h2>

        @if (session()->has('error'))
            <div class="text-red-500 text-sm mb-2 text-center">{{ session('error') }}</div>
        @endif
        
        <!-- Input PIN -->
        <div class="d-flex justify-content-center gap-3">
            @for ($i = 0; $i < 6; $i++)
                <input type="tel" maxlength="1" pattern="[0-9]*" inputmode="numeric"
                    class="form-control text-center pin-input" id="pin-{{ $i }}"
                    oninput="moveToNext(this, {{ $i }})"
                    onkeydown="moveToPrev(event, this, {{ $i }})"
                    wire:model.defer="pinArray.{{ $i }}"
                    wire:change="updatePin({{ $i }}, $event.target.value)">
            @endfor
        </div>


        <button wire:click="login" class="btn mt-4 ml-auto w-full sm:w-auto"
        style="background: linear-gradient(to right, #44ad9f, #44ad9fbd, #44ad9f4d); 
        color: white; border: none; padding: 10px 20px; border-radius: 8px; font-weight: bold;">
        Masuk
    </button>
    

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
        </style>
    </div>
</div>
