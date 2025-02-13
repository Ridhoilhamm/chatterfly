<div>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card bg-dark text-white" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
      
                  <div class="mb-md-5 mt-md-4 pb-5">
                    <h2 class="fw-bold mb-2 text-uppercase">Register</h2>
                    <p class="text-white-50 mb-5">Create an account</p>
      
                    <form wire:submit.prevent="register">
                      <div class="form-outline form-white mb-4">
                        <input type="text" wire:model="name" class="form-control form-control-lg" placeholder="Name" required />
                        
                        @error('name') <span class="text-danger">{{"masukan nama"}}</span> @enderror
                      </div>
      
                      <div class="form-outline form-white mb-4">
                        <input type="email" wire:model="email" class="form-control form-control-lg" placeholder="Email" required />
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
      
                      <div class="form-outline form-white mb-4">
                        <input type="password" wire:model="password" class="form-control form-control-lg" placeholder="Password" required />
                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
      
                      <div class="form-outline form-white mb-4">
                        <input type="password" wire:model="password_confirmation" class="form-control form-control-lg" placeholder="Password" required />
                        
                      </div>
      
                      <button class="btn btn-outline-light btn-lg px-5" type="submit">
                        Register
                      </button>
                    </form>
      
                    <div class="mt-4">
                      <p class="mb-0">Already have an account? 
                        <a href="{{ route('login') }}" class="text-white-50 fw-bold">Login</a>
                      </p>
                    </div>
      
                  </div>
      
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      
</div>
