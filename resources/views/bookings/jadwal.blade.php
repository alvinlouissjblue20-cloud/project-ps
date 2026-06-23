<x-app-layout>
    <div class="py-12 bg-gradient-to-b from-slate-50 via-indigo-50/20 to-slate-100 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="mb-10 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-indigo-100/60 pb-6">
                <div>
                    <h1 class="text-3xl font-black text-gray-900 tracking-tight">
                        Jadwal Booking Rental PS
                    </h1>
                    <p class="text-sm font-semibold text-slate-500 mt-1">
                        Daftar seluruh urutan jadwal pemakaian ruangan rental.
                    </p>
                </div>
                <div>
                    <a href="/dashboard" 
                       class="inline-flex items-center justify-center bg-white border border-slate-200 text-slate-600 font-bold px-5 py-3 rounded-xl hover:bg-slate-50 hover:text-slate-900 transition-all text-xs shadow-sm">
                        Kembali ke Dashboard
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($bookings as $booking)
                    @php
                        $isToday = \Carbon\Carbon::parse($booking->tanggal)->isToday();
                        $isTomorrow = \Carbon\Carbon::parse($booking->tanggal)->isTomorrow();
                    @endphp
                    
                    <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm hover:shadow-md hover:border-indigo-500/30 transition-all duration-300 flex flex-col justify-between">
                        <div>
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <span class="text-xs font-black uppercase tracking-wider text-indigo-600 bg-indigo-50 px-3 py-1 rounded-lg border border-indigo-100">
                                        {{ $booking->room->tipe_ps ?? 'ROOM' }}
                                    </span>
                                    <h2 class="text-3xl font-black text-slate-800 tracking-tight mt-2">
                                        Ruang {{ $booking->room->nama_ruangan }}
                                    </h2>
                                </div>
                                
                                <span class="text-xs font-black px-3 py-1.5 rounded-lg border uppercase tracking-wider
                                    {{ $isToday ? 'bg-indigo-600 text-white border-indigo-600' : ($isTomorrow ? 'bg-amber-500 text-white border-amber-500' : 'bg-slate-100 text-slate-600 border-slate-200') }}">
                                    @if($isToday)
                                        Hari Ini
                                    @elseif($isTomorrow)
                                        Besok
                                    @else
                                        {{ \Carbon\Carbon::parse($booking->tanggal)->format('d/m/Y') }}
                                    @endif
                                </span>
                            </div>

                            <div class="bg-slate-50 rounded-xl p-4 border border-slate-100 mb-4">
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Waktu Bermain</p>
                                <p class="text-2xl font-black text-slate-800 tracking-tight mt-0.5">
                                    {{ \Carbon\Carbon::parse($booking->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($booking->jam_mulai)->addHours($booking->durasi)->format('H:i') }}
                                </p>
                                <p class="text-xs font-bold text-indigo-500 mt-1">
                                    Durasi: {{ $booking->durasi }} Jam
                                </p>
                            </div>
                        </div>

                        <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                            <div>
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Pelanggan</p>
                                <p class="text-base font-black text-slate-700 tracking-tight mt-0.5">
                                    {{ $booking->user->name }}
                                </p>
                            </div>
                            <div class="w-8 h-8 rounded-full bg-slate-100 border border-slate-200 flex items-center justify-center">
                                <span class="text-xs font-black text-slate-500 uppercase">
                                    {{ strtoupper(substr($booking->user->name, 0, 2)) }}
                                </span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full bg-white rounded-2xl p-16 text-center border border-dashed border-slate-200">
                        <h3 class="text-lg font-bold text-slate-700">Belum Ada Jadwal Booking Terdaftar</h3>
                        <p class="text-sm text-slate-400 mt-1">Seluruh jadwal kosong atau belum ada yang memesan ruangan.</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>