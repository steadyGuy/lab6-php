<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(Request $request) {
        $authors = Author::orderBy('id', 'desc')->skip($request->query('begin'))
        ->take($request->query('amount'))->get();
        return response()->json($authors);
    }

    public function show($id) {
        return response()->json(Author::where('id', $id)->first());
    }

    public function showInvitedByWhom($id) {
        $peopleInvited = Author::where('invited_by', $id)->get();
        return response()->json($peopleInvited);
    }

    public function showBooksInfoByAuthor($id) {
        $books = Author::where('id', $id)->first()->books;
        $author = Author::where('id', $id)->first();
        $genres = [];
        $genres = $books->map(function($f){
            return Book::find($f->id)->genres;
        });
        $books = $books->map(function($f) {

            $festival =  [
                  "id" => $f->id,
                   "title" => $f->title,
            ];
            return $festival;
        });

        $json = [
            "author" => $author,
            "books" => $books,
            "genres" => $genres,
        ];

        return response()->json($json);
    }
}
