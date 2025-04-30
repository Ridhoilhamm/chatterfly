<div class="container">
    <h3 class="text-center mb-4">Daftar Pengguna dan Teman-Temannya</h3>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Nama Pengguna</th>
                <th>Teman</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usersWithFriends as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>
                        @if ($user->friends->isEmpty())
                            <p class="text-muted">Belum ada teman</p>
                        @else
                            <ul class="list-unstyled">
                                @foreach ($user->friends as $friend)
                                    <li>{{ $friend->name }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
