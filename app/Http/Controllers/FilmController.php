<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::all();
        return view('films.index', compact('films'));
    }

    public function create()
    {
        return view('films.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'release_year' => 'required|integer',
            'description' => 'required|string',
            'length' => 'required|integer',
            'rating' => 'required|numeric|min:0|max:10',
        ]);
        Film::create($request->all());
        return redirect()->route('films.index')->with('success', 'Film created successfully.');
    }

    public function show(Film $film)
    {
        return view('films.show', compact('film'));
    }

    public function edit(Film $film)
    {
        return view('films.edit', compact('film'));
    }

    public function update(Request $request, Film $film)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'release_year' => 'required|integer',
            'description' => 'required|string',
            'length' => 'required|integer',
            'rating' => 'required|numeric|min:0|max:10',
        ]);

        $film->update($request->all());
        return redirect()->route('films.index')->with('success', 'Film updated successfully.');
    }

    public function destroy(Film $film)
    {
        $film->delete();
        return redirect()->route('films.index')->with('success', 'Film deleted successfully.');
    }
}
