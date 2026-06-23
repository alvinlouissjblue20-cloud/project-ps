<x-app-layout>
    <div class="py-12 bg-gradient-to-b from-slate-50 via-indigo-50/20 to-slate-100 min-h-screen">
        <div class="max-w-2xl mx-auto px-4">
            
            <div class="mb-6 flex items-center justify-between">
                <a href="/bookings" 
                   class="inline-flex items-center gap-2 text-xs font-bold text-slate-500 hover:text-indigo-600 transition-colors">
                    ← Kembali ke Riwayat
                </a>
                <button onclick="window.print()" 
                        class="inline-flex items-center justify-center bg-white border border-slate-200 text-slate-600 font-bold px-4 py-2 rounded-xl text-xs hover:bg-slate-50 transition-all shadow-sm">
                    Cetak Nota
                </button>
            </div>

            <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden relative">
                <div class="h-2 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500"></div>

                <div class="p-8 sm:p-10">
                    <div class="flex justify-between items-start border-b border-slate-100 pb-6 mb-8">
                        <div>
                            <h1 class="text-2xl font-black text-slate-900 tracking-tight">
                                NOTA BOOKING
                            </h1>
                            <p class="text-xs font-bold text-indigo-600 uppercase tracking-widest mt-1">
                                ID Booking: #{{ $booking->id }}
                            </p>
                        </div>
                        <div class="text-right flex flex-col items-end gap-1.5">
                            @if(trim(strtolower($booking->status_pembayaran)) == 'lunas')
                                <span class="inline-flex items-center px-3 py-1 rounded-lg text-xs font-black bg-emerald-50 text-emerald-600 border border-emerald-100 uppercase tracking-wider">
                                    LUNAS
                                </span>
                            @else
                                <span class="inline-flex items-center px-3 py-1 rounded-lg text-xs font-black bg-amber-50 text-amber-600 border border-amber-100 uppercase tracking-wider">
                                    BELUM LUNAS
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-6 mb-8 text-sm">
                        <div>
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Diberikan Kepada</p>
                            <p class="font-black text-slate-800 text-base">{{ $booking->user->name }}</p>
                            <p class="text-xs text-slate-400 font-semibold mt-0.5">Tanggal Main: {{ \Carbon\Carbon::parse($booking->tanggal)->format('d M Y') }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Waktu Penyewaan</p>
                            <p class="font-bold text-slate-700">
                                {{ \Carbon\Carbon::parse($booking->jam_mulai)->format('H:i') }} - {{ $booking->jam_selesai ? \Carbon\Carbon::parse($booking->jam_selesai)->format('H:i') : \Carbon\Carbon::parse($booking->jam_mulai)->addHours($booking->durasi)->format('H:i') }}
                            </p>
                            <p class="text-xs font-black text-slate-500 mt-0.5">
                                Total Durasi: {{ $booking->durasi }} Jam
                            </p>
                        </div>
                    </div>

                    <div class="border border-slate-100 rounded-2xl overflow-hidden mb-8 shadow-sm">
                        <table class="w-full text-left text-sm border-collapse">
                            <thead>
                                <tr class="bg-slate-50 text-xs font-bold text-slate-400 uppercase tracking-wider border-b border-slate-100">
                                    <th class="p-4 pl-5">Rincian Item</th>
                                    <th class="p-4 text-center">Qty / Durasi</th>
                                    <th class="p-4 pr-5 text-right">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50 font-medium text-slate-700">
                                <tr>
                                    <td class="p-4 pl-5">
                                        <div class="font-black text-slate-800">Room: {{ $booking->room->nama_ruangan }}</div>
                                        <div class="text-xs text-slate-400 mt-0.5">Harga/Jam: Rp {{ number_format($booking->room->harga_per_jam, 0, ',', '.') }}</div>
                                    </td>
                                    <td class="p-4 text-center font-bold text-slate-600">
                                        {{ $booking->durasi }} Jam
                                    </td>
                                    <td class="p-4 pr-5 text-right font-bold text-slate-800">
                                        Rp {{ number_format(($booking->room->harga_per_jam * $booking->durasi), 0, ',', '.') }}
                                    </td>
                                </tr>

                                @if($booking->foods->count())
                                    @foreach($booking->foods as $food)
                                        <tr>
                                            <td class="p-4 pl-5">
                                                <div class="font-black text-slate-800">{{ $food->nama }}</div>
                                                <div class="text-xs text-slate-400 mt-0.5">Menu Makanan & Minuman</div>
                                            </td>
                                            <td class="p-4 text-center font-bold text-slate-600">
                                                1 Porsi
                                            </td>
                                            <td class="p-4 pr-5 text-right font-bold text-slate-800">
                                                Rp {{ number_format($food->harga, 0, ',', '.') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3" class="p-4 pl-5 text-xs text-slate-400 italic">
                                            Tidak ada pesanan makanan & minuman.
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <div class="bg-slate-50 rounded-2xl p-5 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border border-slate-100">
                        <div>
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Status Pemakaian</p>
                            <span class="inline-flex items-center text-xs font-extrabold {{ trim(strtolower($booking->status)) == 'selesai' ? 'text-slate-400' : 'text-indigo-600' }} mt-1">
                                {{ strtoupper($booking->status) }}
                            </span>
                        </div>
                        <div class="sm:text-right">
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-0.5">Total Bayar</p>
                            <p class="text-2xl font-black text-emerald-600 tracking-tight">
                                Rp {{ number_format($booking->total_harga, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>

                    <div class="text-center mt-10 border-t border-dashed border-slate-200 pt-6">
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">
                            Terima Kasih Atas Kunjungan Anda!
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>