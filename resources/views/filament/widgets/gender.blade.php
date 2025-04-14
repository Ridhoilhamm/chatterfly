<x-filament-widgets::widget class="scale-90 ml-0 mr-auto">
    <div class="flex gap-4"> {{-- Ini baris flex kiri-kanan --}}
        <x-filament::section class="bg-gradient-to-r from-teal-500 to-teal-300 rounded-xl text-white text-center w-full max-w-xs">
            <div>
                <h2 class="text-base font-semibold">User Perempuan</h2>
                <div class="flex justify-center my-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icon-tabler-woman">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M10 16v5" />
                        <path d="M14 16v5" />
                        <path d="M8 16h8l-2 -7h-4z" />
                        <path d="M5 11c1.667 -1.333 3.333 -2 5 -2" />
                        <path d="M19 11c-1.667 -1.333 -3.333 -2 -5 -2" />
                        <path d="M12 4m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                    </svg>
                </div>
                <p class="text-xl font-bold">{{ $perempuanCount }}</p>
            </div>
        </x-filament::section>
        <x-filament::section class="bg-gradient-to-r from-teal-500 to-teal-300 rounded-xl text-white text-center w-full max-w-xs">
            <div>
                <h2 class="text-base font-semibold">User Laki-Laki</h2>
                <div class="flex justify-center my-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icon-tabler-woman">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M10 16v5" />
                        <path d="M14 16v5" />
                        <path d="M8 16h8l-2 -7h-4z" />
                        <path d="M5 11c1.667 -1.333 3.333 -2 5 -2" />
                        <path d="M19 11c-1.667 -1.333 -3.333 -2 -5 -2" />
                        <path d="M12 4m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                    </svg>
                </div>
                <p class="text-xl font-bold">{{ $laki_lakiCount }}</p>
            </div>
        </x-filament::section>
    </div>
</x-filament-widgets::widget>
