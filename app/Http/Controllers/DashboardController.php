<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        $totalRooms = Room::count();

        $tersedia = Room::where('status', 'tersedia')->count();

        $dipakai = Room::where('status', 'dipakai')->count();

        $totalBooking = Booking::count();

        $totalPemasukan = Booking::sum('total_harga');

        return view('dashboard', compact(

            'totalRooms',
            'tersedia',
            'dipakai',
            'totalBooking',
            'totalPemasukan'

        ));
    }
}
