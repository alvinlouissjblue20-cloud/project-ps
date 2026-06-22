<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Room;
use App\Models\User;
use App\Models\Food;
use Carbon\Carbon;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'room_id',
        'tanggal',
        'jam_mulai',
        'durasi',
        'total_harga',
        'status'
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function foods()
    {
        return $this->belongsToMany(Food::class)->withPivot('qty');
    }

    public function keuangan()
    
    {
    $bookings = Booking::with(['user', 'room'])
        ->where('status', 'selesai')
        ->latest()
        ->get();

    $total = $bookings->sum('total_harga');

    return view('keuangan', compact('bookings', 'total'));
    }

    public static function checkAndCloseExpiredBookings()
    {
        $activeBookings = self::where('status', 'aktif')->get();
        $sekarang = Carbon::now();

        foreach ($activeBookings as $booking) {
            $waktuMulaiFull = Carbon::parse($booking->tanggal . ' ' . $booking->jam_mulai);
            $waktuSelesai = $waktuMulaiFull->copy()->addHours($booking->durasi);

            if ($sekarang->greaterThanOrEqualTo($waktuSelesai)) {
                $booking->update(['status' => 'selesai']);

                if ($booking->room) {
                    $booking->room->update(['status' => 'tersedia']);
                }
            }
        }
    }
}