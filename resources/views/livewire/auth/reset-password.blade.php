<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">Reset Password</div>

                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @elseif (session()->has('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <form wire:submit.prevent="resetPassword">
                        <div class="form-group mb-3">
                            <label>Email</label>
                            <input type="email" class="form-control" wire:model="email" required>
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label>Password Baru</label>
                            <input type="password" class="form-control" wire:model="password" required>
                            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label>Konfirmasi Password</label>
                            <input type="password" class="form-control" wire:model="password_confirmation" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Reset Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
