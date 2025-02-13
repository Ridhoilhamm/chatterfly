<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">

    <style>
    
        .navbar-link {
            display: inline-block; /* Membatasi pengaruh elemen <a> */
            position: relative; /* Agar tidak mengganggu elemen lainnya */
            text-decoration: none; /* Menghilangkan garis bawah pada <a> */
        }
    
        .navbar-link img {
            vertical-align: middle; 
        }
    
        .navbar-link h5, .navbar-link p {
            margin-bottom: 0; 
        }
    
        </style>
    <div class="bg-white fixed-top p-2">

        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center ms-1">
                <!-- Foto Profil atau Foto Dummy -->
                <a href="/data-diri" class="navbar-link">
                
                    <img src="{{ asset('storage/assets/logo pictorial1.png') }}" alt="Chat Icon" style="height:35px; width:30px;">
                
                </a>
                
                <div>
                    <p class="m-0" style="font-size: 12px">Halo,</p>
                    <h5 class="m-0 fw-semi-bold" style="font-size: 15px;">
                        
                    </h5>
                </div>
            </div>
            
            <div class="d-flex align-items-center py-2 me-1">
                <img src="{{ asset('image/logo.png') }}" style="height:40px; width:40px;" alt="Logo">
            </div>
        </div>
        

    </div>

</nav>