<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use App\Models\User;
use Illuminate\Http\Request;
use File;

class MovieController extends Controller
{
    public function index()
    {
        $allMovie = Movie::get();
        $genre    = Genre::get();
        $user     = User::get();
        return view('admin.movie.index', compact('allMovie', 'genre', 'user'));
    }

    // public function create()
    // {
    //     $kategori = Kategori::get();
    //     $user     = User::get();
    //     return view('admin.berita.index', compact('kategori', 'user'));
    // }

    public function store(Request $request)
    {

        $request->validate([
            'user_id'       => '',
            'genre_id'      => 'required',
            'judul'         => 'required',
            'sutradara'     => 'required',
            'cover'         => 'required|image|mimes:jpg,png,jpeg',
            'deskripsi'     => 'required'
        ]);


        $coverName = time() . '.' . $request->cover->extension();

        $request->cover->move(public_path('img/cover'), $coverName);

        $movie = new Movie;

        $movie->user_id     = auth()->user()->id;
        $movie->genre_id    = $request->genre_id;
        $movie->judul       = $request->judul;
        $movie->sutradara   = $request->sutradara;
        $movie->cover       = $coverName;
        $movie->deskripsi   = $request->deskripsi;

        $movie->save();

        return redirect('/movie')->with('success', 'Added Movie Successfully');
    }

    public function edit($id)
    {
        $genre   = Genre::get();
        $user    = User::get();
        $movie   = Movie::findOrFail($id);
        return view('admin.movie.edit', compact('movie', 'genre', 'user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id'       => '',
            'genre_id'      => 'required',
            'judul'         => 'required',
            'sutradara'     => 'required',
            'cover'         => 'image|mimes:jpg,png,jpeg',
            'deskripsi'     => 'required'
        ]);


        if ($request->has('cover')) {
            $movie = Movie::find($id);

            $path = "img/cover/";
            File::delete($path . $movie->cover);

            $coverName = time() . '.' . $request->cover->extension();

            $request->cover->move(public_path('img/cover'), $coverName);

            $movie->judul       = $request->judul;
            $movie->sutradara   = $request->sutradara;
            $movie->cover       = $coverName;
            $movie->deskripsi   = $request->deskripsi;
            $movie->user_id     = auth()->user()->id;
            $movie->genre_id    = $request->genre_id;

            $movie->save();

            return redirect('/movie');
        } else {
            $movie = Movie::find($id);

            $movie->judul       = $request->judul;
            $movie->sutradara   = $request->sutradara;
            $movie->deskripsi   = $request->deskripsi;
            $movie->user_id     = auth()->user()->id;
            $movie->genre_id    = $request->genre_id;

            $movie->save();

            return redirect('/movie');
        }
    }


    public function destroy($id)
    {
        $movie = Movie::find($id);

        $path = "img/cover/";
        File::delete($path . $movie->cover);
        $movie->delete();

        return redirect('/movie')->with('success', 'The Movie Has Been Successfully Deleted');
    }
}
