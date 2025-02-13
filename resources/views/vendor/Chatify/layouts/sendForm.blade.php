<div class="messenger-sendCard fixed-bottom">
    <form id="message-form" method="POST" action="{{ route('send.message') }}" enctype="multipart/form-data">
        @csrf
        <label><span class="fas fa-plus-circle"></span><input disabled='disabled' type="file" class="upload-attachment" name="file" accept=".{{implode(', .',config('chatify.attachments.allowed_images'))}}, .{{implode(', .',config('chatify.attachments.allowed_files'))}}" /></label>
        <button class="emoji-button"></span><span class="fas fa-smile"></button>
        <textarea readonly='readonly' name="message" class="m-send app-scroll" placeholder="Ketik Pesan Sekarang"></textarea>
        <button disabled='disabled' class="send-button"><span class="fas fa-paper-plane"></span></button>
    </form>
   
    <script>
        function adjustForKeyboard() {
            let inputForm = document.querySelector(".messenger-sendCard");
            let initialHeight = window.innerHeight; // Simpan tinggi awal
    
            window.addEventListener("resize", () => {
                let currentHeight = window.innerHeight;
    
                if (currentHeight < initialHeight) {
                    // Keyboard muncul
                    inputForm.style.position = "absolute";
                    inputForm.style.bottom = "0px";
                    document.body.style.overflow = "hidden"; // Cegah scroll
                } else {
                    // Keyboard hilang
                    inputForm.style.position = "fixed";
                    inputForm.style.bottom = "0px";
                    document.body.style.overflow = "auto"; // Aktifkan scroll lagi
                }
            });
        }
    
        adjustForKeyboard();
    </script>
    
    
</div>
