<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<x-app-layout>
    <div class="py-12 bg-gradient-to-b from-slate-50 via-indigo-50/20 to-slate-100 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            @if(auth()->user()->role == 'admin')
            
            <div class="mb-10 flex flex-col md:flex-row md:items-center md:justify-between border-b border-indigo-100/80 pb-6">
                <div>
                    <h1 class="text-3xl font-black text-gray-900 tracking-tight bg-gradient-to-r from-gray-900 to-indigo-950 bg-clip-text text-transparent">
                        Dashboard Admin
                    </h1>
                    <p class="text-sm font-medium text-slate-500 mt-1">Pantau performa bisnis rental PS kamu secara real-time.</p>
                </div>
            </div>

            <a href="{{ route('keuangan') }}" class="block cursor-pointer transition duration-300 hover:scale-[1.01]">
                <div class="relative bg-gradient-to-br from-slate-900 via-indigo-950 to-indigo-900 rounded-3xl p-8 mb-8 shadow-xl shadow-indigo-950/20 overflow-hidden group">
                    <div class="absolute -right-20 -top-20 w-80 h-80 rounded-full bg-indigo-500/20 blur-3xl group-hover:scale-125 transition-transform duration-700 pointer-events-none"></div>
                    <div class="absolute right-10 bottom-0 text-white/[0.03] text-9xl font-black select-none pointer-events-none tracking-tighter">
                        CASH
                    </div>

                    <div class="relative z-10 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6">
                        <div>
                            <span class="text-xs font-bold uppercase tracking-widest text-indigo-300 bg-indigo-500/10 px-3 py-1 rounded-md border border-indigo-500/20">
                                Keuangan Bulan Ini
                            </span>
                            <h2 class="text-sm font-medium text-indigo-200/80 mt-4">Total Pemasukan Bisnis</h2>
                            <p class="text-4xl md:text-5xl font-black text-white tracking-tight mt-1">
                                Rp {{ number_format($totalPemasukan, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                </div>
            </a>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 flex items-center justify-between">
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Ruangan</p>
                        <p class="text-3xl font-black text-slate-800 tracking-tight mt-2">{{ $totalRooms }}</p>
                    </div>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 flex items-center justify-between">
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Tersedia</p>
                        <p class="text-3xl font-black text-emerald-600 tracking-tight mt-2">{{ $tersedia }}</p>
                    </div>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 flex items-center justify-between">
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Dipakai</p>
                        <p class="text-3xl font-black text-rose-600 tracking-tight mt-2">{{ $dipakai }}</p>
                    </div>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 flex items-center justify-between">
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Booking</p>
                        <p class="text-3xl font-black text-amber-500 tracking-tight mt-2">{{ $totalBooking }}</p>
                    </div>
                </div>
            </div>

            <div class="mt-12">
                <h2 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-4">Akses Manajemen Inti</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                    <a href="/rooms" class="group flex items-center gap-4 p-5 bg-white rounded-2xl border border-indigo-100/50 hover:border-indigo-500/30 transition-all shadow-sm">
                        <div class="text-xs font-bold p-3 bg-indigo-50/60 text-indigo-600 rounded-xl">PS</div>
                        <h3 class="font-bold text-slate-800">Kelola Ruangan</h3>
                    </a>
                    
                    <a href="/bookings" class="group flex items-center gap-4 p-5 bg-white rounded-2xl border border-indigo-100/50 hover:border-emerald-500/30 transition-all shadow-sm">
                        <div class="text-xs font-bold p-3 bg-emerald-50/60 text-emerald-600 rounded-xl">REC</div>
                        <h3 class="font-bold text-slate-800">Data Booking</h3>
                    </a>

                    <a href="/users" class="group flex items-center gap-4 p-5 bg-white rounded-2xl border border-indigo-100/50 hover:border-amber-500/30 transition-all shadow-sm">
                        <div class="text-xs font-bold p-3 bg-amber-50/60 text-amber-600 rounded-xl">US</div>
                        <h3 class="font-bold text-slate-800">Kelola User</h3>
                    </a>

                    <a href="/foods" class="group flex items-center gap-4 p-5 bg-white rounded-2xl border border-indigo-100/50 hover:border-emerald-500/30 transition-all shadow-sm">
                        <div class="text-xs font-bold p-3 bg-emerald-50/60 text-emerald-600 rounded-xl">FD</div>
                        <h3 class="font-bold text-slate-800">Kelola Makanan</h3>
                    </a>
                </div>
            </div>

            @else
            
            <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between border-b border-indigo-100/60 pb-6 gap-4">
                <div>
                    <h1 class="text-3xl font-black text-gray-900 tracking-tight">
                        Selamat Datang, <span class="text-indigo-600">{{ auth()->user()->name }}</span>!
                    </h1>
                    <p class="text-sm font-semibold text-slate-500 mt-1">
                        Pilih ruangan dan main sampe lupa waktu.
                    </p>
                </div>
                <div class="flex items-center gap-3">
                    <a href="/bookings" class="inline-flex items-center justify-center bg-white border border-slate-200 text-slate-600 font-bold px-5 py-3 rounded-xl hover:bg-slate-50 hover:text-slate-900 transition-all text-xs shadow-sm">
                        Riwayat Orang yang main
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="inline m-0">
                        @csrf
                        <button type="submit" class="bg-rose-50 border border-rose-100 text-rose-600 font-bold px-5 py-3 rounded-xl text-xs uppercase tracking-wider hover:bg-rose-600 hover:text-white transition-all shadow-sm">
                            Keluar
                        </button>
                    </form>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-4 mb-8 max-w-lg">
                <div class="bg-white px-4 py-3 rounded-xl border border-slate-100 shadow-sm">
                    <p class="text-[10px] font-bold text-slate-400 uppercase">Total Room</p>
                    <p class="text-lg font-black text-slate-700">{{ count($rooms) }}</p>
                </div>
                <div class="bg-emerald-50/40 px-4 py-3 rounded-xl border border-emerald-100/50 shadow-sm">
                    <p class="text-[10px] font-bold text-emerald-600 uppercase">Ready</p>
                    <p class="text-lg font-black text-emerald-700">{{ $rooms->where('status', 'tersedia')->count() }}</p>
                </div>
                <div class="bg-rose-50/40 px-4 py-3 rounded-xl border border-rose-100/50 shadow-sm">
                    <p class="text-[10px] font-bold text-rose-600 uppercase">Used</p>
                    <p class="text-lg font-black text-rose-700">{{ $rooms->filter(fn($r) => trim(strtolower($r->status)) == 'dipakai')->count() }}</p>
                </div>
            </div>

            <div>
                <div class="flex items-center gap-2 mb-6 border-b border-slate-200/60 pb-2">
                    <h2 class="text-xl font-extrabold text-slate-800 tracking-tight">Ruangan Siap Dipesan</h2>
                    <span class="inline-flex items-center bg-emerald-500 text-white font-bold text-[10px] px-2 py-0.5 rounded-full uppercase tracking-wider animate-pulse">Ready To Play</span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($rooms as $room)
                        @php 
                            $isDipakai = trim(strtolower($room->status)) == 'dipakai';
                        @endphp
                        
                        <div class="bg-white rounded-2xl border transition-all duration-300 flex flex-col justify-between overflow-hidden relative shadow-sm
                            {{ $isDipakai ? 'border-rose-200/80 bg-rose-50/[0.01]' : 'border-slate-200 hover:border-indigo-500/30 hover:shadow-md hover:-translate-y-1' }}">

                            <div class="p-6">
                                <div class="flex justify-between items-center mb-4">
                                    <span class="inline-flex items-center px-3 py-1 rounded-lg text-xs font-black uppercase tracking-wider bg-indigo-50 text-indigo-600 border border-indigo-100">
                                        {{ $room->tipe_ps }}
                                    </span>
                                    
                                    @if($isDipakai)
                                        <span class="inline-flex items-center gap-1.5 text-xs font-bold text-rose-600 bg-rose-50 px-2.5 py-1 rounded-full border border-rose-100">
                                            <span class="w-2 h-2 rounded-full bg-rose-500"></span> Dipakai
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 text-xs font-bold text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-full border border-emerald-100">
                                            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span> Tersedia
                                        </span>
                                    @endif
                                </div>

                                <h3 class="text-2xl font-black text-slate-800 tracking-tight mb-2">
                                    {{ $room->nama_ruangan }}
                                </h3>

                                <p class="text-xl font-extrabold text-amber-500 tracking-tight">
                                    Rp {{ number_format($room->harga_per_jam ?? 8000, 0, ',', '.') }} <span class="text-xs font-medium text-slate-400">/ jam</span>
                                </p>
                            </div>

                            <div class="p-4 bg-slate-50/70 border-t border-slate-100 flex items-center justify-center">
                                @if($isDipakai)
                                    <button disabled 
                                            class="block w-full text-center bg-rose-100 text-rose-700 font-bold py-3 px-4 rounded-xl text-sm cursor-not-allowed border border-rose-200/40 opacity-70">
                                        Room Full / Sedang Bermain
                                    </button>
                                @else
                                    <a href="/bookings/create?room_id={{ $room->id }}" 
                                       class="block w-full text-center bg-indigo-600 hover:bg-indigo-700 text-white font-black py-3 px-4 rounded-xl text-sm transition-all shadow-md shadow-indigo-600/10 hover:shadow-lg hover:shadow-indigo-600/20">
                                        Booking Room Ini
                                    </a>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full bg-white rounded-2xl p-12 text-center border border-dashed border-slate-200">
                            <h3 class="font-bold text-slate-700">Belum Ada Data Ruangan</h3>
                        </div>
                    @endforelse
                </div>
            </div>
            @endif

        </div>
    </div>
</x-app-layout>