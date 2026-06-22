<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 px-4">

        <div class="mb-8">
            <h1 class="text-3xl font-black text-slate-800">
                Riwayat Keuangan
            </h1>

            <p class="text-slate-500 mt-2">
                Total pemasukan dari booking yang telah selesai.
            </p>
        </div>

        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-2xl p-6 mb-8">
            <p class="text-sm uppercase tracking-wider opacity-80">
                Total Pemasukan
            </p>

            <h2 class="text-4xl font-black mt-2">
                Rp {{ number_format($total,0,',','.') }}
            </h2>
        </div>

        <div class="bg-white rounded-2xl shadow overflow-hidden">
            <table class="w-full">
                <thead class="bg-slate-100">
                    <tr>
                        <th class="p-4 text-left">ID</th>
                        <th class="p-4 text-left">Pelanggan</th>
                        <th class="p-4 text-left">Ruangan</th>
                        <th class="p-4 text-left">Tanggal</th>
                        <th class="p-4 text-left">Jam Mulai</th>
                        <th class="p-4 text-left">Durasi</th>
                        <th class="p-4 text-left">Total</th>
                        <th class="p-4 text-left">Status</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($bookings as $booking)
                    <tr class="border-t hover:bg-slate-50">
                        <td class="p-4 font-semibold">
                            #{{ $booking->id }}
                        </td>

                        <td class="p-4">
                            {{ $booking->user->name ?? '-' }}
                        </td>

                        <td class="p-4">
                            {{ $booking->room->nama_ruangan ?? '-' }}
                        </td>

                        <td class="p-4">
                            {{ $booking->tanggal }}
                        </td>

                        <td class="p-4">
                            {{ $booking->jam_mulai }}
                        </td>

                        <td class="p-4">
                            {{ $booking->durasi }} Jam
                        </td>

                        <td class="p-4 font-bold text-emerald-600">
                            Rp {{ number_format($booking->total_harga,0,',','.') }}
                        </td>

                        <td class="p-4">
                            <span class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-700 text-xs font-bold">
                                {{ strtoupper($booking->status) }}
                            </span>
                        </td>
                        <th class="p-4 text-left">Aksi</th>
                        <td class="p-4">
                            <a href="{{ route('nota', $booking->id) }}"
                                class="bg-blue-500 text-white px-3 py-1 rounded">
                            Lihat Nota
                        </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    </div>
</x-app-layout>