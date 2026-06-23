<x-app-layout>
    <div class="py-12 bg-gradient-to-b from-slate-50 via-indigo-50/20 to-slate-100 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="mb-10 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-indigo-100/60 pb-6">
                <div>
                    <h1 class="text-3xl font-black text-gray-900 tracking-tight">
                        {{ auth()->user()->role == 'admin' ? 'Data Kelola Booking' : 'Riwayat Booking Kamu' }}
                    </h1>
                    <p class="text-sm font-semibold text-slate-500 mt-1">
                        {{ auth()->user()->role == 'admin' ? 'Manajemen data transaksi, verifikasi pembayaran, dan status bermain.' : 'Pantau status pemesanan dan nota pembayaran rental kamu.' }}
                    </p>
                </div>
                <div class="flex items-center gap-3">
                    <a href="/bookings/create"
                       class="inline-flex items-center justify-center bg-indigo-600 hover:bg-indigo-700 text-white font-black px-5 py-3 rounded-xl text-xs shadow-md shadow-indigo-600/10 hover:shadow-lg transition-all">
                        + Booking Baru
                    </a>
                    <a href="/dashboard" 
                       class="inline-flex items-center justify-center bg-white border border-slate-200 text-slate-600 font-bold px-5 py-3 rounded-xl hover:bg-slate-50 hover:text-slate-900 transition-all text-xs shadow-sm">
                        Kembali
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50/70 border-b border-slate-200 text-xs font-bold text-slate-400 uppercase tracking-widest">
                                @if(auth()->user()->role == 'admin')
                                    <th class="p-4 pl-6">Pelanggan</th>
                                @endif
                                <th class="p-4 {{ auth()->user()->role != 'admin' ? 'pl-6' : '' }}">Ruangan</th>
                                <th class="p-4">Tanggal</th>
                                <th class="p-4">Waktu Main</th>
                                <th class="p-4">Durasi</th>
                                <th class="p-4">Total Bayar</th>
                                <th class="p-4">Status Transaksi</th>
                                <th class="p-4 pr-6 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-sm font-medium text-slate-700">
                            @forelse($bookings as $booking)
                                <tr class="hover:bg-slate-50/50 transition-colors">
                                    @if(auth()->user()->role == 'admin')
                                        <td class="p-4 pl-6">
                                            <div class="font-black text-slate-800">{{ $booking->user->name ?? 'User Hilang' }}</div>
                                            <div class="text-[10px] text-slate-400 font-bold tracking-tight uppercase mt-0.5">ID: #{{ $booking->user_id }}</div>
                                        </td>
                                    @endif
                                    
                                    <td class="p-4 {{ auth()->user()->role != 'admin' ? 'pl-6' : '' }}">
                                        <span class="inline-flex items-center px-2.5 py-1 bg-indigo-50 text-indigo-600 text-xs font-black rounded-lg border border-indigo-100">
                                            {{ $booking->room->nama_ruangan ?? 'Room' }}
                                        </span>
                                    </td>
                                    
                                    <td class="p-4 text-slate-600 font-semibold">
                                        {{ \Carbon\Carbon::parse($booking->tanggal)->format('d M Y') }}
                                    </td>
                                    
                                    <td class="p-4 text-slate-800 font-black">
                                        {{ \Carbon\Carbon::parse($booking->jam_mulai)->format('H:i') }} - {{ $booking->jam_selesai ? \Carbon\Carbon::parse($booking->jam_selesai)->format('H:i') : \Carbon\Carbon::parse($booking->jam_mulai)->addHours($booking->durasi)->format('H:i') }}
                                    </td>
                                    
                                    <td class="p-4 text-slate-500 font-semibold">
                                        {{ $booking->durasi }} Jam
                                    </td>
                                    
                                    <td class="p-4 text-emerald-600 font-extrabold text-base">
                                        Rp {{ number_format($booking->total_harga, 0, ',', '.') }}
                                    </td>
                                    
                                    <td class="p-4">
                                        <div class="flex flex-col gap-1.5 items-start">
                                            @if(trim(strtolower($booking->status_pembayaran)) == 'lunas')
                                                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-md text-xs font-bold bg-emerald-50 text-emerald-600 border border-emerald-100">
                                                    Lunas
                                                </span>
                                            @else
                                                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-md text-xs font-bold bg-amber-50 text-amber-600 border border-amber-100 animate-pulse">
                                                    Belum Lunas
                                                </span>
                                            @endif

                                            @if(trim(strtolower($booking->status)) == 'selesai')
                                                <span class="inline-flex items-center text-[10px] font-bold text-slate-400 uppercase tracking-wider">
                                                    ✓ Selesai Main
                                                </span>
                                            @else
                                                <span class="inline-flex items-center text-[10px] font-bold text-indigo-500 uppercase tracking-wider animate-pulse">
                                                    • Sedang Aktif
                                                </span>
                                            @endif
                                        </div>
                                    </td>
                                    
                                    <td class="p-4 pr-6">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('bookings.show', $booking->id) }}" 
                                               class="inline-flex items-center justify-center bg-indigo-600 hover:bg-indigo-700 text-white font-black px-4 py-2 rounded-xl text-xs transition-all shadow-sm shadow-indigo-100">
                                                Nota
                                            </a>

                                            @if(auth()->user()->role == 'admin')
                                               @if(trim(strtolower($booking->status_pembayaran)) != 'lunas')
    <a href="/booking-action/{{ $booking->id }}/lunas" 
       class="inline-flex items-center justify-center bg-amber-500 hover:bg-amber-600 text-white font-black px-4 py-2 rounded-xl text-xs transition-all shadow-sm">
        ACC
    </a>
@endif

@if(trim(strtolower($booking->status)) == 'aktif')
    <a href="/booking-action/{{ $booking->id }}/selesai" 
       class="inline-flex items-center justify-center bg-emerald-600 hover:bg-emerald-700 text-white font-black px-4 py-2 rounded-xl text-xs transition-all shadow-sm">
        Selesai
    </a>
@endif
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="p-16 text-center text-sm font-bold text-slate-400">
                                        Belum ada riwayat transaksi pemesanan yang tercatat.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>