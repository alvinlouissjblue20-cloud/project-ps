<x-app-layout>

<div class="py-10">

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="flex justify-between items-center mb-8">

            <h1 class="text-3xl font-bold text-gray-800">
                Daftar Ruangan
            </h1>

            <a href="/rooms/create"
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-3 rounded-xl">

                + Tambah Ruangan

            </a>

        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach($rooms as $room)

            <div class="bg-white rounded-2xl shadow p-6">

                <h2 class="text-2xl font-bold text-gray-800">
                    {{ $room->nama_ruangan }}
                </h2>

                <p class="text-gray-600 mt-2">
                    {{ $room->tipe_ps }}
                </p>

                <p class="mt-3 font-semibold text-indigo-600">
                    Rp {{ number_format($room->harga_per_jam) }}/jam
                </p>

                <div class="mt-4">

                    @if($room->status == 'tersedia')

                        <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm">

                            Tersedia

                        </span>

                    @else

                        <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full text-sm">

                            Dipakai

                        </span>

                    @endif

                </div>

            </div>

            @endforeach

        </div>

    </div>

</div>

</x-app-layout>