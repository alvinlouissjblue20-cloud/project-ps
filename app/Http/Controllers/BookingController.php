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
        $bookings = Booking::with('room', 'user')->get();

        return view('bookings.index', compact('bookings'));
    }

    public function create()
    {
    $rooms = Room::all()->get();

    $foods = Food::all();

    return view('bookings.create', compact(
        'rooms',
        'foods'
    ));
    }

    public function store(Request $request)
    {
        $room = Room::findOrFail($request->room_id);

        $jamMulaiBaru = strtotime($request->jam_mulai);

$jamSelesaiBaru = strtotime(
    $request->jam_mulai . ' +' . $request->durasi . ' hour'
);



$bookingBentrok = Booking::where(
        'room_id',
        $request->room_id
    )
    ->where(
        'tanggal',
        $request->tanggal
    )
    ->where(
        'status',
        'aktif'
    )
    ->get();

foreach ($bookingBentrok as $booking)
{
    $jamMulaiLama = strtotime($booking->jam_mulai);

    $jamSelesaiLama = strtotime(
        $booking->jam_mulai . ' +' .
        $booking->durasi . ' hour'
    );

    if (
        $jamMulaiBaru < $jamSelesaiLama &&
        $jamSelesaiBaru > $jamMulaiLama
    )
    {
        return back()
            ->withInput()
            ->with(
                'error',
                'Jam yang dipilih bentrok dengan booking lain.'
            );
    }
}

        $total = $room->harga_per_jam * $request->durasi;

         $selectedFoods = $request->foods ?? [];

        foreach($selectedFoods as $foodId)
    {
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

if($request->foods)
{
    foreach($request->foods as $foodId)
    {
        $booking->foods()->attach($foodId);
    }
}
        return redirect('/bookings')
            ->with('success', 'Booking berhasil!');
    }

   public function selesai($id)
{
    $booking = Booking::findOrFail($id);

    if($booking->status_pembayaran != 'lunas')
    {
        return back()->with(
            'error',
            'Pembayaran belum diverifikasi'
        );
    }

    $booking->status = 'selesai';
    $booking->save();

    return redirect('/bookings')
        ->with('success', 'Booking selesai!');
}

    public function lunas($id)
    {
    $booking = Booking::findOrFail($id);

    $booking->status_pembayaran = 'lunas';
    $booking->save();

    return redirect('/bookings')
        ->with('success', 'Pembayaran berhasil diverifikasi');
    }

    public function show(Booking $booking)
    {
            $booking->load(['user', 'room', 'foods']);
            if (auth()->user()->role != 'admin' && $booking->user_id != auth()->id()) 
                {abort(403);
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