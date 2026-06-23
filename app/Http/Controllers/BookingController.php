<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Room;
use App\Models\Food;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 'admin') {
            $bookings = Booking::with('room', 'user')->get();
        } else {
            $bookings = Booking::with('room', 'user')
                ->where('user_id', auth()->id())
                ->get();
        }

        return view('bookings.index', compact('bookings'));
    }

    public function create(Request $request)
    {
        $rooms = Room::all();
        $foods = Food::all();
        $selectedRoomId = $request->query('room_id');

        return view('bookings.create', compact(
            'rooms',
            'foods',
            'selectedRoomId'
        ));
    }

    public function store(Request $request)
    {
        $room = Room::findOrFail($request->room_id);

        $jamMulaiBaru = strtotime($request->jam_mulai);
        $jamSelesaiBaru = strtotime($request->jam_mulai . ' +' . $request->durasi . ' hour');

        $bookingBentrok = Booking::where('room_id', $request->room_id)
            ->where('tanggal', $request->tanggal)
            ->where('status', 'aktif')
            ->get();

        foreach ($bookingBentrok as $booking) {
            $jamMulaiLama = strtotime($booking->jam_mulai);
            $jamSelesaiLama = strtotime($booking->jam_mulai . ' +' . $booking->durasi . ' hour');

            if ($jamMulaiBaru < $jamSelesaiLama && $jamSelesaiBaru > $jamMulaiLama) {
                return back()
                    ->withInput()
                    ->with('error', 'Jam yang dipilih bentrok dengan booking lain.');
            }
        }

        $total = $room->harga_per_jam * $request->durasi;
        $selectedFoods = $request->foods ?? [];

        foreach ($selectedFoods as $foodId) {
            $food = Food::find($foodId);
            $total += $food->harga;
        }

        $booking = Booking::create([
            'user_id' => Auth::id(),
            'room_id' => $request->room_id,
            'tanggal' => $request->tanggal,
            'jam_mulai' => $request->jam_mulai,
            'durasi' => $request->durasi,
            'total_harga' => $total,
            'status' => 'aktif',
            'status_pembayaran' => 'belum_lunas'
        ]);

        if ($request->foods) {
            foreach ($request->foods as $foodId) {
                $booking->foods()->attach($foodId);
            }
        }

        return redirect('/bookings')
            ->with('success', 'Booking berhasil!');
    }

    /**
     * Mengubah status pembayaran menjadi Lunas (Khusus Admin)
     */
    public function lunas($id)
    {
        if (auth()->user()->role != 'admin') {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        $booking = Booking::findOrFail($id);
        $booking->status_pembayaran = 'lunas';
        $booking->save(); // Menyimpan perubahan ke database

        return redirect('/bookings')
            ->with('success', 'Pembayaran berhasil diverifikasi menjadi Lunas!');
    }

    /**
     * Mengubah status bermain menjadi Selesai
     */
    public function selesai($id)
    {
        $booking = Booking::findOrFail($id);

        if ($booking->status_pembayaran != 'lunas') {
            return back()->with('error', 'Pembayaran belum diverifikasi. Silakan ACC terlebih dahulu.');
        }

        $booking->status = 'selesai';
        $booking->save(); // Menyimpan perubahan ke database

        return redirect('/bookings')
            ->with('success', 'Booking telah selesai!');
    }

    public function show(Booking $booking)
    {
        $booking->load(['user', 'room', 'foods']);
        if (auth()->user()->role != 'admin' && $booking->user_id != auth()->id()) {
            abort(403);
        }

        return view('bookings.show', compact('booking'));
    }

    public function jadwal()
    {
        $rooms = Room::all();

        $bookings = Booking::with('room', 'user')
            ->orderBy('tanggal')
            ->orderBy('jam_mulai')
            ->get();

        return view('bookings.jadwal', compact(
            'rooms',
            'bookings'
        ));
    }
}