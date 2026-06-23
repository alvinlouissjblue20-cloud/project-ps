<x-app-layout>

<div class="py-10">

    <div class="max-w-3xl mx-auto">

        <div class="bg-white shadow rounded-2xl p-8">

           <h1 class="text-3xl font-bold text-gray-800 mb-8">

    Booking Ruangan

</h1>

@if(session('error'))

<div class="mb-4 bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-xl">

    {{ session('error') }}

</div>

@endif

<form action="/bookings" method="POST">

                @csrf

                <div class="mb-5">

                    <label class="block mb-2 font-semibold text-gray-700">

                        Pilih Ruangan

                    </label>

                    <select
                        name="room_id"

                        class="w-full border-gray-300 rounded-xl shadow-sm">

                        @foreach($rooms as $room)

                        <option value="{{ $room->id }}">

                            {{ $room->nama_ruangan }}
                            -
                            {{ $room->tipe_ps }}

                        </option>

                        @endforeach

                    </select>

                </div>

                <div class="mb-5">

                    <label class="block mb-2 font-semibold text-gray-700">

                        Tanggal

                    </label>

                    <input
                        type="date"
                        name="tanggal"

                        class="w-full border-gray-300 rounded-xl shadow-sm">

                </div>

                <div class="mb-5">

                    <label class="block mb-2 font-semibold text-gray-700">

                        Jam Mulai

                    </label>

                    <input
                        type="time"
                        name="jam_mulai"

                        class="w-full border-gray-300 rounded-xl shadow-sm">

                </div>

                <div class="mb-5">

                    <label class="block mb-2 font-semibold text-gray-700">

                        Durasi (jam)

                    </label>

                    <input
                        type="number"
                        name="durasi"

                        class="w-full border-gray-300 rounded-xl shadow-sm">

                </div>
                                <div class="mb-6">

                    <label class="block mb-3 font-semibold text-gray-700">

                        Pilih Makanan

                    </label>

                    <div class="grid grid-cols-2 gap-3">

                        @foreach($foods as $food)

                        <label class="flex items-center gap-3 bg-gray-100 p-3 rounded-xl">

                            <input
                                type="checkbox"
                                name="foods[]"
                                value="{{ $food->id }}">

                            <div>

                                <p class="font-semibold">

                                    {{ $food->nama }}

                                </p>

                                <p class="text-sm text-gray-500">

                                    Rp {{ number_format($food->harga) }}

                                </p>

                            </div>

                        </label>

                        @endforeach

                    </div>

                </div>

                <button
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-xl">

                    Booking Sekarang

                </button>

            </form>

        </div>

    </div>

</div>

</x-app-layout>