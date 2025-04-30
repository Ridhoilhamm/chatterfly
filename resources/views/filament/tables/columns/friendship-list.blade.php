@php

    $friends = $getRecord()->friends;
@endphp

@if ($friends->isEmpty())
    <p class="text-sm text-gray-500 dark:text-gray-400">Belum ada pertemanan</p>
@else
    <a href="{{ route('test') }}">
        <ul class="space-y-1">
            @foreach ($friends as $friend)
                <li class="flex items-center gap-2">
                    <x-heroicon-o-user class="w-4 h-4 text-gray-400 dark:text-gray-500" />
                    <span>{{ $friend->name }}</span>
                </li>
            @endforeach
        </ul>
    </a>
@endif



