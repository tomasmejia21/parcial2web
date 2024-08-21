<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Movie;
use App\Models\Room;

class SalesController extends Controller
{
    public function index()
    {
       ///////
       ///////
       ///////
       return view('sales.index', ['sales' => $sales, 'movies' => $movies, 'rooms' => $rooms]);
    }

    public function store(Request $request)
    {
       ///////
       ///////
       ///////
    }

    public function edit($id)
    {
        $sale = Sale::find($id);
        $movies = Movie::all();
        $rooms = Room::all();
        return view('sales.edit', ['sale' => $sale, 'movies' => $movies, 'rooms' => $rooms]);
    }

    public function update(Request $request, $id)
    {
       ///////
       ///////
       ///////
    }

    public function destroy($id)
    {
        $sale = Sale::find($id);
        $sale->delete();
        return redirect()->route('sales.index');
    }
}
