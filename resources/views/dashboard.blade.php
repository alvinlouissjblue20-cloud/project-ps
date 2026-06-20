<!-- Memaksa memuat JavaScript Alpine agar dropdown nama langsung bisa diklik -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<x-app-layout>
    <!-- Background utama dengan gradasi premium -->
    <div class="py-12 bg-gradient-to-b from-slate-50 via-indigo-50/20 to-slate-100 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            @if(auth()->user()->role == 'admin')
            <!-- ======================================================== -->
            <!-- ADMIN DASHBOARD -->
            <!-- ======================================================== -->
            <div class="mb-10 flex flex-col md:flex-row md:items-center md:justify-between border-b border-indigo-100/80 pb-6">
                <div>
                    <h1 class="text-3xl font-black text-gray-900 tracking-tight bg-gradient-to-r from-gray-900 to-indigo-950 bg-clip-text text-transparent">
                        Dashboard Ringkasan Admin
                    </h1>
                    <p class="text-sm font-medium text-slate-500 mt-1">Pantau performa bisnis rental PS kamu secara real-time.</p>
                </div>
                
                <div class="mt-4 md:mt-0 inline-flex items-center gap-2 bg-emerald-50 text-emerald-700 px-4 py-2 rounded-full text-xs font-bold tracking-wide border border-emerald-100 self-start">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    SISTEM LIVE DAN AKTIF
                </div>
            </div>

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
                    <div class="text-sm font-bold bg-white/10 backdrop-blur-md p-4 rounded-2xl text-white shadow-inner border border-white/10 self-start sm:self-center uppercase tracking-wider">
                        IDR
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                <div class="bg-white rounded-2xl p-6 shadow-[0_8px_30px_rgb(99,102,241,0.02)] border border-indigo-500/5 flex items-center justify-between hover:shadow-[0_8px_30px_rgb(99,102,241,0.06)] transition-all duration-300">
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Ruangan</p>
                        <p class="text-3xl font-black text-slate-800 tracking-tight mt-2">{{ $totalRooms }}</p>
                    </div>
                    <div class="px-3 py-2 rounded-xl bg-blue-50/70 text-xs font-bold text-blue-600 shadow-inner uppercase">ROOM</div>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-[0_8px_30px_rgb(99,102,241,0.02)] border border-indigo-500/5 flex items-center justify-between hover:shadow-[0_8px_30px_rgb(99,102,241,0.06)] transition-all duration-300 group">
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Tersedia</p>
                        <p class="text-3xl font-black text-emerald-600 tracking-tight mt-2">{{ $tersedia }}</p>
                    </div>
                    <div class="px-3 py-2 rounded-xl bg-emerald-50/70 text-xs font-bold text-emerald-600 shadow-inner uppercase transition-transform duration-300 group-hover:scale-105">READY</div>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-[0_8px_30px_rgb(99,102,241,0.02)] border border-indigo-500/5 flex items-center justify-between hover:shadow-[0_8px_30px_rgb(99,102,241,0.06)] transition-all duration-300 group">
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Dipakai</p>
                        <p class="text-3xl font-black text-rose-600 tracking-tight mt-2">{{ $dipakai }}</p>
                    </div>
                    <div class="px-3 py-2 rounded-xl bg-rose-50/70 text-xs font-bold text-rose-600 shadow-inner uppercase transition-transform duration-300 group-hover:scale-105">USED</div>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-[0_8px_30px_rgb(99,102,241,0.02)] border border-indigo-500/5 flex items-center justify-between hover:shadow-[0_8px_30px_rgb(99,102,241,0.06)] transition-all duration-300 group">
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Booking</p>
                        <p class="text-3xl font-black text-amber-500 tracking-tight mt-2">{{ $totalBooking }}</p>
                    </div>
                    <div class="px-3 py-2 rounded-xl bg-amber-50/70 text-xs font-bold text-amber-600 shadow-inner uppercase transition-transform duration-300 group-hover:scale-105">LIST</div>
                </div>
            </div>

            <div class="mt-12">
                <h2 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-4">Akses Manajemen Inti</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                    <a href="/rooms" class="group flex items-center gap-4 p-5 bg-white rounded-2xl shadow-[0_4px_20px_rgba(99,102,241,0.01)] border border-indigo-100/50 hover:border-indigo-500/30 hover:shadow-xl hover:shadow-indigo-500/[0.04] hover:-translate-y-0.5 transition-all duration-300">
                        <div class="text-xs font-bold p-3 bg-indigo-50/60 text-indigo-600 rounded-xl group-hover:bg-indigo-600 group-hover:text-white transition-all duration-300 flex items-center justify-center uppercase">PS</div>
                        <h3 class="font-bold text-slate-800 text-base group-hover:text-indigo-600 transition-colors">Kelola Ruangan</h3>
                    </a>

                    <a href="/bookings" class="group flex items-center gap-4 p-5 bg-white rounded-2xl shadow-[0_4px_20px_rgba(99,102,241,0.01)] border border-indigo-100/50 hover:border-emerald-500/30 hover:shadow-xl hover:shadow-emerald-500/[0.04] hover:-translate-y-0.5 transition-all duration-300">
                        <div class="text-xs font-bold p-3 bg-emerald-50/60 text-emerald-600 rounded-xl group-hover:bg-emerald-600 group-hover:text-white transition-all duration-300 flex items-center justify-center uppercase">REC</div>
                        <h3 class="font-bold text-slate-800 text-base group-hover:text-emerald-600 transition-colors">Data Booking</h3>
                    </a>

                    <a href="/foods" class="group flex items-center gap-4 p-5 bg-white rounded-2xl shadow-[0_4px_20px_rgba(99,102,241,0.01)] border border-indigo-100/50 hover:border-amber-500/30 hover:shadow-xl hover:shadow-amber-500/[0.04] hover:-translate-y-0.5 transition-all duration-300">
                        <div class="text-xs font-bold p-3 bg-amber-50/60 text-amber-600 rounded-xl group-hover:bg-amber-600 group-hover:text-white transition-all duration-300 flex items-center justify-center uppercase">F&B</div>
                        <h3 class="font-bold text-slate-800 text-base group-hover:text-amber-500 transition-colors">Menu Makanan</h3>
                    </a>

                    <a href="/users" class="group flex items-center gap-4 p-5 bg-white rounded-2xl shadow-[0_4px_20px_rgba(99,102,241,0.01)] border border-indigo-100/50 hover:border-rose-500/30 hover:shadow-xl hover:shadow-rose-500/[0.04] hover:-translate-y-0.5 transition-all duration-300">
                        <div class="text-xs font-bold p-3 bg-rose-50/60 text-rose-600 rounded-xl group-hover:bg-rose-600 group-hover:text-white transition-all duration-300 flex items-center justify-center uppercase">CRM</div>
                        <h3 class="font-bold text-slate-800 text-base group-hover:text-rose-600 transition-colors">Data Pelanggan</h3>
                    </a>
                </div>
            </div>

            @else
            <!-- ======================================================== -->
            <!-- USER DASHBOARD -->
            <!-- ======================================================== -->
            <div class="mb-10 flex flex-col lg:flex-row lg:items-center lg:justify-between border-b border-indigo-100/60 pb-8 gap-6">
                <div class="flex-1">
                    <h1 class="text-3xl font-black text-gray-900 tracking-tight">
                        Selamat Datang, <span class="text-indigo-600">{{ auth()->user()->name }}</span>!
                    </h1>
                    <p class="text-sm font-semibold text-slate-500 mt-2 flex items-center gap-2">
                        <span class="flex h-2 w-2 rounded-full bg-pink-500 animate-pulse"></span>
                        Mau nambah member ngga? Slot terbatas buat 5 member aja (maksimal bisa 9 member).
                    </p>
                </div>
                
                <div class="flex flex-wrap items-center gap-3">
                    <!-- TOMBOL TAMBAH MEMBER DENGAN GRADASI PINK-PURPLE -->
                    <a href="/members/create" class="relative inline-flex items-center gap-2.5 text-xs font-black text-white px-6 py-3.5 rounded-xl bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 hover:from-indigo-700 hover:to-pink-700 shadow-lg shadow-purple-500/20 hover:shadow-xl hover:shadow-purple-500/40 hover:-translate-y-0.5 transition-all duration-200 uppercase tracking-widest group">
                        <span class="absolute left-5 inline-flex h-4 w-4 rounded-full bg-pink-400 opacity-20 animate-ping"></span>
                        
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-pink-300 group-hover:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        <span>Tambah Member</span>
                    </a>

                    <a href="/bookings" class="inline-flex items-center justify-center bg-white border border-slate-200 text-slate-600 font-bold px-6 py-3.5 rounded-xl hover:bg-slate-50 hover:text-slate-900 transition-all text-xs shadow-sm">
                        Riwayat Main Saya
                    </a>

                    <!-- TOMBOL LOG OUT MANDIRI CADANGAN -->
                    <form method="POST" action="{{ route('logout') }}" class="inline m-0 p-0">
                        @csrf
                        <button type="submit" class="inline-flex items-center justify-center bg-rose-50 border border-rose-200 text-rose-600 font-bold px-5 py-3.5 rounded-xl hover:bg-rose-600 hover:text-white hover:border-rose-600 transition-all text-xs shadow-sm uppercase tracking-wider">
                            Keluar
                        </button>
                    </form>
                </div>
            </div>

            <div>
                <div class="flex items-center gap-2 mb-6">
                    <h2 class="text-lg font-extrabold text-slate-800 tracking-tight">Ruangan Siap Dipesan</h2>
                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-green-50 border border-green-200 text-green-600 uppercase tracking-wider">Ready to Play</span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($rooms as $room)
                        <div class="bg-white rounded-2xl p-6 border border-indigo-500/10 shadow-[0_10px_35px_rgba(99,102,241,0.02)] hover:shadow-[0_12px_40px_rgba(99,102,241,0.07)] hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between group">
                            
                            <div>
                                <div class="flex justify-between items-start mb-4">
                                    <span class="inline-flex items-center px-3 py-1 rounded-lg text-xs font-bold bg-indigo-50 text-indigo-600 border border-indigo-100/50 group-hover:bg-indigo-600 group-hover:text-white transition-all duration-300">
                                        {{ $room->tipe_ps }}
                                    </span>
                                    <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-emerald-600">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Tersedia
                                    </span>
                                </div>

                                <h3 class="text-xl font-black text-slate-800 tracking-tight mb-2 group-hover:text-indigo-600 transition-colors">
                                    {{ $room->nama_ruangan }}
                                </h3>
                            </div>

                            <div class="mt-6 pt-4 border-t border-slate-50">
                                <a href="/bookings/create?room_id={{ $room->id }}" 
                                   class="block w-full text-center bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-4 rounded-xl shadow-md shadow-indigo-600/10 hover:shadow-xl hover:shadow-indigo-600/20 transition-all duration-200 text-sm">
                                    Booking Room Ini &rarr;
                                </a>
                            </div>

                        </div>
                    @empty
                        <div class="col-span-full bg-white rounded-2xl p-12 text-center border border-dashed border-slate-200">
                            <h3 class="font-bold text-slate-700">Semua Ruangan Penuh</h3>
                            <p class="text-xs text-slate-400 mt-1">Silakan cek berkala atau hubungi admin via WhatsApp.</p>
                        </div>
                    @endforelse
                </div>
            </div>
            @endif

        </div>
    </div>
</x-app-layout>