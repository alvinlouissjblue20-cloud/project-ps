<x-app-layout>
    <div class="py-12 bg-gradient-to-b from-slate-50 via-indigo-50/20 to-slate-100 min-h-screen">
        <div class="max-w-3xl mx-auto px-4">

            @if(session('error'))
                <div class="mb-6 bg-red-50 border border-red-200 text-red-600 px-5 py-4 rounded-xl font-semibold text-sm shadow-sm flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-red-500 animate-ping"></span>
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-8 sm:p-10">
                <div class="border-b border-slate-100 pb-6 mb-8">
                    <h1 class="text-3xl font-black text-gray-900 tracking-tight">
                        Booking Ruangan
                    </h1>
                    <p class="text-sm font-semibold text-slate-400 mt-1">
                        Isi form di bawah ini untuk mengamankan slot bermain kamu.
                    </p>
                </div>

                <form action="/bookings" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">
                            Pilih Ruangan
                        </label>
                        <select name="room_id" 
                                class="w-full bg-slate-50 border border-slate-200 text-slate-800 rounded-xl px-4 py-3.5 font-bold text-sm focus:bg-white focus:border-indigo-500 focus:ring-indigo-500/20 transition-all shadow-sm">
                            <option value="" disabled class="text-slate-400">-- Pilih Ruangan Main --</option>
                            @foreach($rooms as $room)
                                <option value="{{ $room->id }}" 
                                    {{ (old('room_id') ?? $selectedRoomId) == $room->id ? 'selected' : '' }}>
                                    {{ $room->nama_ruangan }} - {{ $room->tipe_ps }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">
                                Tanggal Main
                            </label>
                            <input type="date" 
                                   name="tanggal" 
                                   value="{{ old('tanggal') }}"
                                   class="w-full bg-slate-50 border border-slate-200 text-slate-800 rounded-xl px-4 py-3.5 font-bold text-sm focus:bg-white focus:border-indigo-500 focus:ring-indigo-500/20 transition-all shadow-sm">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">
                                Jam Mulai
                            </label>
                            <input type="time" 
                                   name="jam_mulai" 
                                   value="{{ old('jam_mulai') }}"
                                   class="w-full bg-slate-50 border border-slate-200 text-slate-800 rounded-xl px-4 py-3.5 font-bold text-sm focus:bg-white focus:border-indigo-500 focus:ring-indigo-500/20 transition-all shadow-sm">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">
                                Durasi Main (Jam)
                            </label>
                            <input type="number" 
                                   name="durasi" 
                                   min="1"
                                   placeholder="Contoh: 2"
                                   value="{{ old('durasi') }}"
                                   class="w-full bg-slate-50 border border-slate-200 text-slate-800 rounded-xl px-4 py-3.5 font-bold text-sm focus:bg-white focus:border-indigo-500 focus:ring-indigo-500/20 transition-all shadow-sm">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-3">
                            Pilih Makanan / Camilan Tambahan
                        </label>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            @foreach($foods as $food)
                                <label class="flex items-center gap-4 bg-slate-50 hover:bg-slate-100/70 border border-slate-200 p-4 rounded-xl cursor-pointer transition-all select-none">
                                    <input type="checkbox" 
                                           name="foods[]" 
                                           value="{{ $food->id }}"
                                           {{ is_array(old('foods')) && in_array($food->id, old('foods')) ? 'checked' : '' }}
                                           class="w-5 h-5 text-indigo-600 border-slate-300 rounded-md focus:ring-indigo-500/30">
                                    <div class="flex-1">
                                        <p class="font-black text-slate-800 text-sm leading-tight">
                                            {{ $food->nama }}
                                        </p>
                                        <p class="text-xs font-bold text-emerald-600 mt-0.5">
                                            Rp {{ number_format($food->harga, 0, ',', '.') }}
                                        </p>
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="pt-4 flex flex-col sm:flex-row items-center justify-end gap-3 border-t border-slate-100">
                        <a href="/dashboard" 
                           class="w-full sm:w-auto inline-flex items-center justify-center bg-white border border-slate-200 text-slate-600 font-bold px-6 py-3.5 rounded-xl text-xs hover:bg-slate-50 hover:text-slate-900 transition-all shadow-sm text-center">
                            Batal
                        </a>
                        <button type="submit" 
                                class="w-full sm:w-auto inline-flex items-center justify-center bg-indigo-600 hover:bg-indigo-700 text-white font-black px-8 py-3.5 rounded-xl text-xs tracking-wide shadow-md shadow-indigo-600/10 hover:shadow-lg transition-all text-center">
                            Booking Sekarang
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>