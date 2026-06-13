<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Room;
use App\Models\User;

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
}