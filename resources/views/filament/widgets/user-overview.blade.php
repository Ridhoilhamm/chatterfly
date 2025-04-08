<x-filament::widget>
    <x-filament::card 
        class="bg-red-600 text-white shadow-lg cursor-pointer"
        onclick="window.location='/admin/users'">
        <h2 class="text-xl font-bold">Total Users</h2>
        <p class="text-3xl mt-2">{{ $this->userCount }}</p>
    </x-filament::card>
</x-filament::widget>
