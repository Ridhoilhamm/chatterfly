<x-filament::widget>
    <a href="/admin/users">
        <x-filament::section class="bg-gradient-to-l from-orange-500 to-orange-300 rounded-xl text-white p-6">
        <div class="text-center">
            <h2 class="text-xl font-bold">Total Users</h2>
            <p class="text-3xl mt-2 font-semibold">{{ $userCount }}</p>
        </div>
    </x-filament::section>
    </a>
</x-filament::widget>
