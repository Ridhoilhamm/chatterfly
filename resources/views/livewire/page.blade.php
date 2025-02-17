<div>
    <form action="{{ url('lapangan/cari') }}" method="GET"
        class="fixed-top bg-white d-flex justify-content-between align-items-center mb-4 mt-0"
        style="padding-bottom: 20px;">
        <input type="text" name="query" class="form-control mt-4 ms-2 rounded" placeholder="Cari Teman"
            value="{{ request()->query('query') }}">
        <button class="btn btn-outline-danger ms-2 mt-4 me-2" type="button" class="btn btn-primary" data-toggle="modal"
            data-target="#exampleModalCenter">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-filter">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path
                    d="M20 3h-16a1 1 0 0 0 -1 1v2.227l.008 .223a3 3 0 0 0 .772 1.795l4.22 4.641v8.114a1 1 0 0 0 1.316 .949l6 -2l.108 -.043a1 1 0 0 0 .576 -.906v-6.586l4.121 -4.12a3 3 0 0 0 .879 -2.123v-2.171a1 1 0 0 0 -1 -1z" />
            </svg>
        </button>
    </form>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <section class="px-3 pt-2 " style="margin-top:85px; margin-bottom:10px;">
        <p>
            Rekomendasi
        </p>
        <div style="overflow-x: auto; white-space: nowrap; position: relative;">
            <div style="display: inline-flex; min-width: 100%; width: fit-content;">
                <a href="#">
                    <div style="flex-shrink: 0; width: 120px; margin-right: 10px; position: relative;">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(112).webp" alt="User 1"
                            class="rounded d-block"
                            style="height: 140px; width: 100%; border: none; box-shadow: none; object-fit: cover;">
                        <div class="mt-1 text-center">
                            <p class="mb-0 limit-text" style="font-size: 12px">Status A</p>
                        </div>
                    </div>
                </a>

                <a href="#">
                    <div style="flex-shrink: 0; width: 120px; margin-right: 10px; position: relative;">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(112).webp" alt="User 2"
                            class="rounded d-block"
                            style="height: 140px; width: 100%; border: none; box-shadow: none; object-fit: cover;">
                        <div class="mt-1 text-center">
                            <p class="mb-0 limit-text" style="font-size: 12px">Status B</p>
                        </div>
                    </div>
                </a>

                <a href="#">
                    <div style="flex-shrink: 0; width: 120px; margin-right: 10px; position: relative;">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(112).webp" alt="User 3"
                            class="rounded d-block"
                            style="height: 140px; width: 100%; border: none; box-shadow: none; object-fit: cover;">
                        <div class="mt-1 text-center">
                            <p class="mb-0 limit-text" style="font-size: 12px">Status C</p>
                        </div>
                    </div>
                </a>

                <a href="#">
                    <div style="flex-shrink: 0; width: 120px; position: relative;">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(112).webp" alt="User 4"
                            class="rounded d-block"
                            style="height: 140px; width: 100%; border: none; box-shadow: none; object-fit: cover;">
                        <div class="mt-1 text-center">
                            <p class="mb-0 limit-text" style="font-size: 12px">Status D</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>




    <div class=" bg-white">
        <p>Mungkin Anda Kenal</p>

        <div class="d-flex flex-wrap justify-content-center gap-3" style="padding-top: 10px;">
            @foreach ($users as $user)
                <div class="col-2 col-sm-2 col-lg-2 user-card card bg-white p-3 mb-3 text-center" 
                     wire:click="selectUser({{ $user->id }})" 
                     style="cursor: pointer;">
                    <img src="{{ asset('storage/users-avatar/' . $user->avatar) }}" 
                        alt="User Avatar" 
                        class="rounded-circle mb-2 user-avatar" 
                        style="width: 60px; height: 60px; object-fit: cover;">
                    <h6 class="card-title user-name">{{ Str::limit($user->name, 6, '...') }}</h6>
                </div>
            @endforeach
        </div>
        

    </div>

    <style>
        @media (max-width: 576px) {
            .user-card {
                flex: 0 0 25%;
                max-width: 25%;
            }
        }

        .fixed-card {
            height: 180px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .user-avatar {
            width: 80px;
            height: 80px;
            object-fit: cover;
        }

        .user-name {
            max-width: 100px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .user-avatar {
            width: 60px;
            height: 60px;
            object-fit: cover;
        }
    </style>
</div>
