<x-app-layout>
    <div class="p-8">
        <h1 class="text-3xl font-bold">
            Riwayat Pemasukan
        </h1>

        <p>Total:
            Rp {{ number_format($total,0,',','.') }}
        </p>

        <table border="1" cellpadding="10">
            <tr>
                <th>ID</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Status</th>
            </tr>

            @foreach($bookings as $booking)
            <tr>
                <td>{{ $booking->id }}</td>
                <td>{{ $booking->tanggal }}</td>
                <td>Rp {{ number_format($booking->total_harga,0,',','.') }}</td>
                <td>{{ $booking->status }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</x-app-layout>