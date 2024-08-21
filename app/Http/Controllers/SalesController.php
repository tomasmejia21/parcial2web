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
       $sales = Sale::all();
       $movies = Movie::all();
       $rooms = Room::all();
       return view('sales.index', ['sales' => $sales, 'movies' => $movies, 'rooms' => $rooms]);
    }

    public function store(Request $request)
    {
        $sale = new Sale();
        $movie = new Movie();
        $sale -> value = $request -> tickets;
        $sale -> movie = $request -> movie_id;
        $sale -> room = $request -> room_id;
        $sale -> save();
        return redirect()->route('sales.index');
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
        $sale = Sale::find($id);
        $movie = Movie::find($request->movie_id);
        
        $sale -> value = ($request -> tickets)*($movie->value);
        $sale -> movie = $request -> movie_id;
        $sale -> room = $request -> room_id;
        $sale -> save();
        return redirect()->route('sales.index');
    }

    public function destroy($id)
    {
        $sale = Sale::find($id);
        $sale->delete();
        return redirect()->route('sales.index');
    }
}
