<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $allGenre = Genre::get();
        return view('admin.genre.index', compact('allGenre'));
    }

    public function store()
    {
        $attributes = request()->validate(
            [
                'nama_genre' => 'required|unique:genre,nama_genre',
            ]
        );
        Genre::create($attributes);
        return redirect()->to('/genre')->with('success', 'Added Genre Successfully');
    }

    public function edit($id)
    {
        $genre     = Genre::findOrFail($id);
        return view('admin.genre.edit', compact('genre'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_genre'          => 'required',
        ]);

        $genre = Genre::find($id);

        $genre->nama_genre = $request->nama_genre;

        $genre->save();

        return redirect('/genre');
    }

    public function destroy($id)
    {
        Genre::where('id', $id)->delete();
        return redirect()->to('/genre')->with('success', 'The Genre Has Been Successfully Deleted');
    }
}
