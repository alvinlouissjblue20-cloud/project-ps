<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();

        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('rooms.create');
    }

    public function store(Request $request)
    {
        Room::create([

            'nama_ruangan' => $request->nama_ruangan,
            'tipe_ps' => $request->tipe_ps,
            'harga_per_jam' => $request->harga_per_jam,
            'status' => 'tersedia'

        ]);

        return redirect('/rooms')
            ->with('success', 'Ruangan berhasil ditambahkan!');
    }
}