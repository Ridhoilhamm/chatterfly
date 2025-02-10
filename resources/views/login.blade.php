@extends('user.layout')
@section('content')

<style>
    /* Menambahkan gambar sebagai latar belakang halaman */
    .bg-image {
        background-image: url('{{ asset('image/bg.jpg') }}');
        background-size: cover;
        background-position: center center;
        background-attachment: fixed;
        height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
    }

    .custom-rounded {
        border-top-left-radius: 50px;
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }
    .customm-rounded {
        border-top-left-radius: 20px;
        border-top-right-radius: 0;
        border-bottom-right-radius: 20px;
        border-bottom-left-radius: 20px;
    }
    .btnn {
        border-top-left-radius: 10px;
        border-top-right-radius: 0;
        border-bottom-right-radius: 10px;
        border-bottom-left-radius: 10px;
    }
    .container {
        border-bottom-right-radius: 10px;
        border-bottom-left-radius: 10px;
    }
    .hallo {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 50%;
        height: 100px;
        padding-right: 20px;
    }
    .input-group .form-control {
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}

.input-group .btn {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
}

</style>

<div>
    <!-- Jarak antara "hallo" dan form login -->
    <div class="bg-image d-flex justify-content-center align-items-center min-vh-100 px-3">
        <div class="border mx-3 bg-white shadow p-4 rounded" style="width: 100%; max-width: 450px;">
            <h1 class="text-center mb-4">Login</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('auth-login')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" value="{{ old('email') }}" name="email" class="form-control rounded" placeholder="example@gmail.com">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <input id="password" type="password" value="{{ old('password') }}" name="password" class="form-control" placeholder="Password">
                        <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                            <i id="eyeIcon" class="bi bi-eye"></i>
                        </button>
                    </div>
                    <p class="text-muted small mt-1 text-end">
                        Lupa Sandi? <a href="/reset/password" class="fw-semibold text-success">Reset Password</a>
                    </p>
                </div>
                <div class="d-grid mt-0">
                    <button name="submit" type="submit" class="btn btn-primary">Masuk</button>
                </div>
                <p class="text-muted small mt-3">
                    Belum punya akun? <a href="/registrasi" class="fw-semibold text-success">Registrasi</a>
                </p>
                <div class="d-flex gap-2 mt-1">
                    @foreach ($sosmed as $data)
                    <div class="d-flex flex-column align-items-center">
                        <img src="{{ asset('storage/'.$data->foto) }}" 
                             class="rounded-circle" 
                             style="height:40px; width:40px; object-fit: cover;">
                
                        <p class="small m-0 text-center">{{ $data->name }}</p>
                    </div>
                    @endforeach
                </div>
                
            </form>
        </div>
    </div>
    
</div>
<script>
    // JavaScript untuk men-toggle password
    const togglePassword = document.getElementById("togglePassword");
    const passwordField = document.getElementById("password");
    const eyeIcon = document.getElementById("eyeIcon");

    togglePassword.addEventListener("click", function () {
        // Toggle tipe input antara password dan text
        const type = passwordField.type === "password" ? "text" : "password";
        passwordField.type = type;

        // Ganti ikon sesuai tipe password
        eyeIcon.classList.toggle("bi-eye-slash");
        eyeIcon.classList.toggle("bi-eye");
    });
</script>

@endsection

@php
    $hideNavbar = true;
    $hideFooter = true;
@endphp