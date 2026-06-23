<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;

class Food extends Model
{
    protected $table = 'foods';

    protected $fillable = [

        'nama',
        'harga'

    ];

    public function bookings()
{
    return $this->belongsToMany(Booking::class)
        ->withPivot('qty')
        ->withTimestamps();
}
}
