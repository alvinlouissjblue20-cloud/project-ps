<x-app-layout>
    <div class="max-w-2xl mx-auto py-8">

        <div class="bg-white shadow rounded-lg p-6">

            <h1 class="text-2xl font-bold mb-6">
                Nota Booking
            </h1>

            <hr class="mb-4">

            <p><strong>ID Booking:</strong> #{{ $booking->id }}</p>
            <p><strong>Nama:</strong> {{ $booking->user->name }}</p>
            <p><strong>Ruangan:</strong> {{ $booking->room->nama_ruangan }}</p>
            <p><strong>harga_per_jam:</strong> Rp {{ number_format($booking->room->harga_per_jam,0,',','.') }}</p>
            <p><strong>Tanggal:</strong> {{ $booking->tanggal }}</p>
            <p><strong>Jam Mulai:</strong> {{ $booking->jam_mulai }}</p>
            <p><strong>Jam Selesai:</strong> {{ $booking->jam_selesai }}</p>
            <p><strong>Durasi:</strong> {{ $booking->durasi }} Jam</p>
            <p><strong>Subtotal Room:</strong> Rp {{ number_format($booking->room->harga_per_jam * $booking->durasi,0,',','.') }}</p>
            <p><strong>Status:</strong> {{ strtoupper($booking->status) }}</p>

            <hr class="my-4">

                <h3 class="font-bold mb-2">
                Makanan & Minuman
                </h3>

                @if($booking->foods->count())

                    @foreach($booking->foods as $food)

                    <div class="flex justify-between">
                        <span>{{ $food->nama }}</span>
                        <span>
                            Rp {{ number_format($food->harga,0,',','.') }}
                        </span>
                    </div>

                @endforeach

            @else
                <p>Tidak ada pesanan makanan.</p>

            @endif

            <h3 class="font-bold mt-4 mb-2">Detail Biaya</h3>

                <p>
                    Room:{{ $booking->room->nama_ruangan }}
                </p>

            <p> 
                Harga/Jam: Rp {{ number_format($booking->room->harga_per_jam,0,',','.') }}
            </p>

            <p> 
                Durasi: {{ $booking->durasi }} Jam
            </p>

            <p>
                Subtotal Room: Rp {{ number_format($booking->room->harga_per_jam * $booking->durasi,0,',','.') }}
            </p>

            <hr class="my-4">

                <h3 class="font-bold">Makanan & Minuman</h3>

            @if($booking->foods->count())
                 @foreach($booking->foods as $food)
                    <div class="flex justify-between">
                        <span>{{ $food->nama }}</span>
                                <span>
                                    Rp {{ number_format($food->harga,0,',','.') }}
                                </span>
                    </div>
                @endforeach

            @else
                 <p>Tidak ada pesanan makanan.</p>

            @endif
            <hr class="my-4">

            <h2 class="text-xl font-bold text-green-600">
                Total Bayar: Rp {{ number_format($booking->total_harga,0,',','.') }}
            </h2>

        </div>

    </div>
</x-app-layout>