<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{

    protected $fillable = [

        'nama_ruangan',
        'tipe_ps',
        'harga_per_jam',
        'status'

    ];

    public function bookings()
    {
    return $this->hasMany(Booking::class);
    }
}
