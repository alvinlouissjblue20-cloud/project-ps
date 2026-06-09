<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="p-6 text-gray-900 dark:text-gray-100">

    @if(auth()->user()->role == 'admin')

        <h2 class="text-xl font-bold mb-4">Dashboard Admin</h2>

        <p>Selamat datang, Admin 👑</p>

        <br>

        <a href="/consoles" class="text-blue-500 underline">
            Kelola Console
        </a>

        <br>

        <a href="/rentals" class="text-blue-500 underline">
            Kelola Rental
        </a>

    @else

        <h2 class="text-xl font-bold mb-4">Dashboard User</h2>

        <p>Selamat datang di Rental PS 🎮</p>

    @endif

</div>
</x-app-layout>
