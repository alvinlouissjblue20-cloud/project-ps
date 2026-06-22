<x-app-layout>

<div class="py-10">

    <div class="max-w-7xl mx-auto">

        <div class="flex justify-between items-center mb-8">

            <h1 class="text-3xl font-bold text-gray-800">

                Data Booking

            </h1>

            <a href="/bookings/create"
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-3 rounded-xl">

                + Booking

            </a>

        </div>

        <div class="mt-8 bg-white shadow rounded-2xl overflow-hidden">

            <table class="w-full">

                <thead class="bg-gray-100">

                    <tr>

                        <th class="p-4 text-left">User</th>
                        <th class="p-4 text-left">Ruangan</th>
                        <th class="p-4 text-left">Tanggal</th>
                        <th class="p-4 text-left">Jam</th>
                        <th class="p-4 text-left">Durasi</th>
                        <th class="p-4 text-left">Total</th>
                        <th class="p-4 text-left">Status</th>
                        <th class="p-4 text-left">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($bookings as $booking)

                    <tr class="border-t hover:bg-gray-50">

                        <td class="p-4">
                            {{ $booking->user->name }}
                        </td>

                        <td class="p-4">
                            {{ $booking->room->nama_ruangan }}
                        </td>

                        <td class="p-4">
                            {{ $booking->tanggal }}
                        </td>

                        <td class="p-4">
                            {{ $booking->jam_mulai }}
                        </td>

                        <td class="p-4">
                            {{ $booking->durasi }} jam
                        </td>

                        <td class="p-4 font-semibold text-indigo-600">
                            Rp {{ number_format($booking->total_harga) }}
                        </td>

                        <td class="p-4">

                            @if($booking->status == 'aktif')

                                <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm">

                                    Aktif

                                </span>

                            @else

                                <span class="bg-gray-200 text-gray-700 px-4 py-2 rounded-full text-sm">

                                    Selesai

                                </span>

                            @endif

                        </td>

                        <td class="p-4 flex gap-2">
                            <a href="{{ route('bookings.show', $booking->id) }}"
                                 class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                                     Nota
                            </a>
                            @if($booking->status == 'aktif')
                            <a href="/bookings/{{ $booking->id }}/selesai"
                                     class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg">
                                    Selesai
                            </a>
                            @endif
                        </td>
                    </tr>
                    
                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

</x-app-layout>