<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function show($id) {
        return response()->json(Genre::where('id', $id)->first());
    }

    public function getGenresByBookId($id) {
        $books = Genre::find($id)->books;
        return response()->json($books);
    }
}
