<x-app-layout>

<div class="py-10">

    <div class="max-w-7xl mx-auto px-6">

        @if(auth()->user()->role == 'admin')

        <h1 class="text-4xl font-bold text-gray-800 mb-10">

            Dashboard Admin 👑

        </h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

            <div class="bg-white rounded-2xl shadow p-6">

                <h2 class="text-gray-500 text-sm">
                    Total Ruangan
                </h2>

                <p class="text-4xl font-bold text-indigo-600 mt-4">

                    {{ $totalRooms }}

                </p>

            </div>

            <div class="bg-white rounded-2xl shadow p-6">

                <h2 class="text-gray-500 text-sm">
                    Ruangan Tersedia
                </h2>

                <p class="text-4xl font-bold text-green-600 mt-4">

                    {{ $tersedia }}

                </p>

            </div>

            <div class="bg-white rounded-2xl shadow p-6">

                <h2 class="text-gray-500 text-sm">
                    Ruangan Dipakai
                </h2>

                <p class="text-4xl font-bold text-red-600 mt-4">

                    {{ $dipakai }}

                </p>

            </div>

            <div class="bg-white rounded-2xl shadow p-6">

                <h2 class="text-gray-500 text-sm">
                    Total Booking
                </h2>

                <p class="text-4xl font-bold text-yellow-500 mt-4">

                    {{ $totalBooking }}

                </p>

            </div>

        </div>

        <div class="bg-white rounded-2xl shadow p-8 mt-8">

            <h2 class="text-2xl font-bold text-gray-800 mb-4">

                Total Pemasukan

            </h2>

            <p class="text-5xl font-bold text-indigo-600">

                Rp {{ number_format($totalPemasukan) }}

            </p>

        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">

            <a href="/rooms"

                class="bg-indigo-600 hover:bg-indigo-700 text-white rounded-2xl p-6 shadow">

                <h2 class="text-2xl font-bold">

                    Kelola Ruangan

                </h2>

                <p class="mt-2 text-indigo-100">

                    Tambah dan lihat semua ruangan rental.

                </p>

            </a>

            <a href="/bookings"

                class="bg-green-600 hover:bg-green-700 text-white rounded-2xl p-6 shadow">

                <h2 class="text-2xl font-bold">

                    Data Booking

                </h2>

                <p class="mt-2 text-green-100">

                    Lihat semua booking customer.

                </p>

            </a>

        </div>

        @else

        <h1 class="text-4xl font-bold text-gray-800 mb-10">

            Dashboard User 🎮

        </h1>

        <div class="bg-white rounded-2xl shadow p-8">

            <h2 class="text-2xl font-bold text-gray-800">

                Selamat Datang di Rental PS

            </h2>

            <p class="text-gray-500 mt-3">

                Booking ruangan favoritmu dan nikmati bermain bersama teman.

            </p>

            <a href="/rooms"

                class="inline-block mt-6 bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-xl">

                Lihat Ruangan

            </a>

        </div>

        @endif

    </div>

</div>

</x-app-layout>