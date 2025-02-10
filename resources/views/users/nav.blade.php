<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">

    <style>
    
        .navbar-link {
            display: inline-block; /* Membatasi pengaruh elemen <a> */
            position: relative; /* Agar tidak mengganggu elemen lainnya */
            text-decoration: none; /* Menghilangkan garis bawah pada <a> */
        }
    
        .navbar-link img {
            vertical-align: middle; /* Mengatur posisi gambar agar tidak mengganggu layout */
        }
    
        .navbar-link h5, .navbar-link p {
            margin-bottom: 0; /* Mengatur margin agar tidak ada ruang ekstra */
        }
    
        </style>
    <div class="bg-white fixed-top p-2">

        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center ms-1">
                <a href="/data-diri" class="navbar-link">
                    <img 
                        src=""
                        style="height: 40px; width:39px; border:2px solid #ddd0d0;" class="rounded-circle me-2 pad" alt="Profile">
                </a>
                
                <div>
                    <p class="m-0" style="font-size: 12px">Halo,</p>
                   
                </div>
            </div>
            
            <div class="d-flex align-items-center py-2 me-1">
                <img src="{{ asset('image/logo.png') }}" style="height:40px; width:40px;" alt="Logo">
            </div>
        </div>
        

    </div>

   
</nav>