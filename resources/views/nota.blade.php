<x-app-layout>
    <div class="max-w-2xl mx-auto py-10">

        <div class="bg-white shadow rounded-lg p-6">

            <h1 class="text-2xl font-bold mb-6">
                Nota Booking
            </h1>

            <p><strong>ID Booking:</strong> #{{ $booking->id }}</p>
            <p><strong>Nama:</strong> {{ $booking->user->name }}</p>
            <p><strong>Ruangan:</strong> {{ $booking->room->nama_ruangan }}</p>
            <p><strong>Tanggal:</strong> {{ $booking->tanggal }}</p>
            <p><strong>Jam Mulai:</strong> {{ $booking->jam_mulai }}</p>
            <p><strong>Durasi:</strong> {{ $booking->durasi }} Jam</p>
            <p><strong>Status:</strong> {{ strtoupper($booking->status) }}</p>

            <hr class="my-4">

            <h2 class="text-xl font-bold text-green-600">
                Total: Rp {{ number_format($booking->total_harga,0,',','.') }}
            </h2>

        </div>

    </div>
</x-app-layout>