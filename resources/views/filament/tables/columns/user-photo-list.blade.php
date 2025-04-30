@php
    $posts = $getRecord()->posts;
@endphp

@if ($posts->isEmpty())
    <p class="text-sm text-gray-500 text-right">Belum ada postingan</p>
@else
    <div class="flex justify-end">
        <ul class="flex items-end space-y-1">
            @foreach ($posts as $post)
                <li class="flex items-center gap-4 w-full py-2"> {{-- gap lebih besar + padding top-bottom --}}
                    @if ($post->image_path)
                        <img src="{{ asset('storage/' . $post->image_path) }}" alt="Thumb"
                            class="w-100 h-20 object-cover" />
                    @endif
                </li>
            @endforeach

        </ul>
    </div>
@endif
