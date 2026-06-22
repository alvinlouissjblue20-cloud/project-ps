<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;

class DashboardController extends Controller
{
    public function index()
    {
        $totalRooms = Room::count();

        $tersedia = Room::where('status', 'tersedia')->count();

        $dipakai = Room::where('status', 'dipakai')->count();

        $totalBooking = Booking::count();

        $totalPemasukan = Booking::sum('total_harga');

        $rooms = Room::orderBy('nama_ruangan', 'asc')->get();

        return view('dashboard', compact(

            'totalRooms',
            'tersedia',
            'dipakai',
            'totalBooking',
            'totalPemasukan',
            'rooms'

        ));
    }
    public function keuangan()
    {
    $bookings = Booking::where('status', 'selesai')
        ->latest()
        ->get();

    $total = $bookings->sum('total_harga');

    return view('keuangan', compact('bookings', 'total'));
    }

    public function nota($id)
    {
    $booking = Booking::with(['user', 'room'])
        ->findOrFail($id);

    return view('nota', compact('booking'));
    }
}
