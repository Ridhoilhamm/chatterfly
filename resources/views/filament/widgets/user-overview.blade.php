<x-filament::widget>
    <a href="/admin/users">
        <x-filament::card class="bg-red-600 text-white shadow-lg cursor-pointer" onclick="window.location='/admin/users'">
        <div class="text-center">
            <h2 class="text-xl font-bold">Total Users</h2>
            <p class="text-3xl mt-2">{{ $this->userCount }}</p>
        </div>
        </x-filament::card>
    </a>
</x-filament::widget>
