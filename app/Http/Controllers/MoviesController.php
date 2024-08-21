<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MoviesController extends Controller
{

    public function index()
    {
        $movies = Movie::all();
        return view('movies.index', ['movies' => $movies]);
    }

    public function store(Request $request)
    {
        $movie = new Movie();
        $movie->title = $request->title;
        $movie->age_restriction = $request->age_restriction;
        $movie->duration = $request->duration;
        $movie->value = $request->value;
        $movie->save();
        return redirect()->route('movies.index');
    }

    public function edit($id)
    {
        $movie = Movie::find($id);
        return view('movies.edit', ['movie' => $movie]);
    }

    public function update(Request $request, $id)
    {
        $movie = Movie::find($id);
        $movie->title = $request->title;
        $movie->age_restriction = $request->age_restriction;
        $movie->duration = $request->duration;
        $movie->value = $request->value;
        $movie->save();
        return redirect()->route('movies.index');
    }

    public function destroy($id)
    {
        $movie = Movie::find($id);
        $movie->delete();
        return redirect()->route('movies.index');
    }
}
