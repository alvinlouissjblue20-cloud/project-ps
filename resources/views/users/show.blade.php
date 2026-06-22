<x-app-layout>

<div class="p-8">

    <h1 class="text-3xl font-bold mb-6">
        Detail User
    </h1>

    <div class="bg-white p-6 rounded-xl shadow mb-6">

        <p><strong>Nama:</strong> {{ $user->name }}</p>

        <p><strong>Email:</strong> {{ $user->email }}</p>

        <p><strong>Total Booking:</strong> {{ $user->bookings->count() }}</p>

    </div>

    <div class="bg-white p-6 rounded-xl shadow">

        <h2 class="text-2xl font-bold mb-4">
            Riwayat Booking
        </h2>

        @forelse($user->bookings as $booking)

            <div class="border-b py-4">

                <p>
                    <strong>Ruangan:</strong>
                    {{ $booking->room->nama_ruangan }}
                </p>

                <p>
                    <strong>Tanggal:</strong>
                    {{ $booking->tanggal }}
                </p>

                <p>
                    <strong>Jam:</strong>
                    {{ $booking->jam_mulai }}
                    -
                    {{ $booking->jam_selesai }}
                </p>

                <p>
                    <strong>Total:</strong>
                    Rp {{ number_format($booking->total_harga,0,',','.') }}
                </p>

                <p>
                    <strong>Status:</strong>
                    {{ ucfirst($booking->status) }}
                </p>

                <a href="/bookings/{{ $booking->id }}"
                   class="inline-block mt-2 bg-blue-600 text-white px-3 py-2 rounded-lg">
                    Lihat Nota
                </a>

            </div>

        @empty

            <p>User belum pernah booking.</p>

        @endforelse

    </div>

</div>

</x-app-layout>