<x-filament::widget class="w-full">
    <x-filament::card>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            {{-- User Perempuan --}}
            <a href="admin/users">
                <div class="bg-gradient-to-r from-blue-500 to-blue-300 rounded-xl text-white p-6 text-center">
                    <div class="flex justify-center mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M10 16v5" />
                            <path d="M14 16v5" />
                            <path d="M8 16h8l-2 -7h-4z" />
                            <path d="M5 11c1.667 -1.333 3.333 -2 5 -2" />
                            <path d="M19 11c-1.667 -1.333 -3.333 -2 -5 -2" />
                            <circle cx="12" cy="4" r="2" />
                        </svg>
                    </div>
                    <h2 class="text-lg font-semibold">User Perempuan</h2>
                    <p class="text-2xl font-bold">{{ $perempuanCount }}</p>
                </div>
            </a>

            {{-- User Laki-laki --}}
            <div class="bg-gradient-to-r from-green-500 to-green-300 rounded-xl text-white p-6 text-center">
                <div class="flex justify-center mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M10 16v5" />
                        <path d="M14 16v5" />
                        <path d="M8 16h8l-2 -7h-4z" />
                        <path d="M5 11c1.667 -1.333 3.333 -2 5 -2" />
                        <path d="M19 11c-1.667 -1.333 -3.333 -2 -5 -2" />
                        <circle cx="12" cy="4" r="2" />
                    </svg>
                </div>
                <h2 class="text-lg font-semibold">User Laki-Laki</h2>
                <p class="text-2xl font-bold">{{ $laki_lakiCount }}</p>
            </div>
        </div>
    </x-filament::card>
</x-filament::widget>
