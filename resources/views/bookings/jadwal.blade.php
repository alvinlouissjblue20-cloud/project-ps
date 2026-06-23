<x-app-layout>

<div class="p-8">

    <h1 class="text-3xl font-bold mb-6">
        Jadwal Booking
    </h1>

    <div class="bg-white rounded-xl shadow overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-100">

                <tr>
                    <th class="p-3">Tanggal</th>
                    <th class="p-3">Ruangan</th>
                    <th class="p-3">User</th>
                    <th class="p-3">Jam Mulai</th>
                    <th class="p-3">Jam Selesai</th>
                    <th class="p-3">Durasi</th>
                </tr>

            </thead>

            <tbody>

                @foreach($bookings as $booking)

                <tr class="border-t">

                    <td class="p-3">
                        {{ $booking->tanggal }}
                    </td>

                    <td class="p-3">
                        {{ $booking->room->nama_ruangan }}
                    </td>

                    <td class="p-3">
                        {{ $booking->user->name }}
                    </td>

                   <td class="p-3">
                     {{ $booking->jam_mulai }}
                    </td>

                    <td class="p-3">
                    {{ \Carbon\Carbon::parse($booking->jam_mulai)
                    ->addHours($booking->durasi)
                     ->format('H:i') }}
                    </td>

                <td class="p-3">
            {{ $booking->durasi }} jam
            </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

</x-app-layout>