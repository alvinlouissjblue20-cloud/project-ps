<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;

class FoodController extends Controller
{
    public function index()
    {
        $foods = Food::all();

        return view('foods.index', compact('foods'));
    }

    public function create()
    {
        return view('foods.create');
    }

    public function store(Request $request)
    {
        Food::create([

            'nama' => $request->nama,
            'harga' => $request->harga

        ]);

        return redirect('/foods')
            ->with('success', 'Makanan berhasil ditambahkan!');
    }
}