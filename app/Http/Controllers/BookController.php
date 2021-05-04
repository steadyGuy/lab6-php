<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index(Request $request) {
        $books = Book::orderBy('id', 'desc')->skip($request->query('begin'))
        ->take($request->query('amount'))->get();
        return response()->json($books);
    }

    public function show($id) {
        return response()->json(Book::where('id', $id)->first());
    }

    public function showAuthorByBook($id) {
        return response()->json(Book::find($id)->author);
    }

    public function showGenreByBook($id) {
        $genres = Book::find($id)->genres;
        return response()->json($genres);
    }
}
