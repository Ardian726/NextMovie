<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $allGenre = Genre::get();
        $allMovie = Movie::orderBy('id', 'DESC')->get();
        return view('welcome', compact('allMovie', 'allGenre'));
    }
    public function single($id)
    {
        $allMovie = Movie::findOrFail($id);
        $allMovieSingle = Movie::findOrFail($id)->orderBy('id', 'DESC')->paginate(4);
        return view('single', compact('allMovie', 'allBeritaSingle'));
    }
}
