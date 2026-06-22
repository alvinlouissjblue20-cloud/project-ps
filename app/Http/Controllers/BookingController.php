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
    $rooms = Room::where('status', 'tersedia')->get();

    $foods = Food::all();

    return view('bookings.create', compact(
        'rooms',
        'foods'
    ));
    }

    public function store(Request $request)
    {
        $room = Room::findOrFail($request->room_id);

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
    'status' => 'aktif'

]);

if($request->foods)
{
    foreach($request->foods as $foodId)
    {
        $booking->foods()->attach($foodId);
    }
}
        $room->status = 'dipakai';
        $room->save();

        return redirect('/bookings')
            ->with('success', 'Booking berhasil!');
    }

    public function selesai($id) 
    {
        
    $booking = Booking::findOrFail($id);

    $booking->status = 'selesai';
    $booking->save();

    $room = Room::find($booking->room_id);

    $room->status = 'tersedia';
    $room->save();

    return redirect('/bookings')
        ->with('success', 'Booking selesai!');
    }
    public function show(Booking $booking)
    {
            $booking->load(['user', 'room', 'foods']);
            if (auth()->user()->role != 'admin' && $booking->user_id != auth()->id()) 
                {abort(403);
    }
    

    return view('bookings.show', compact('booking'));
}
}