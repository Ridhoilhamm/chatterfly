<x-filament::widget class="w-full">
    <x-filament::card>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <a href="/admin/laporan-postingans">
                <div class="bg-gradient-to-r from-yellow-500 to-yellow-300 rounded-xl text-white p-6 text-center">
                    <div class="flex justify-center mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-alert-square-rounded">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z" />
                            <path d="M12 8v4" />
                            <path d="M12 16h.01" />
                        </svg>
                    </div>
                    <h2 class="text-lg font-semibold">Laporan Postingan</h2>
                    <p class="text-2xl font-bold">{{ $this->userCount }}</p>
                </div>
            </a>
            <a href="/admin/laporan-postingan-videos">
                <div class="bg-gradient-to-r from-purple-500 to-purple-300 rounded-xl text-white p-6 text-center">
                    <div class="flex justify-center mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-alert-square-rounded">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z" />
                            <path d="M12 8v4" />
                            <path d="M12 16h.01" />
                        </svg>
                    </div>
                    <h2 class="text-lg font-semibold">Laporan Video</h2>
                    <p class="text-2xl font-bold">{{ $laporanvideo }}</p>
                </div>
            </a>
        </div>
    </x-filament::card>
</x-filament::widget>
