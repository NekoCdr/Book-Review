<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function show($id)
    {
        $book = Book::findOrFail($id);
        $view_data = [
            'book' => $book,
            'author' => Author::find($book->author_id),
        ];
        return view('book-info', $view_data);
    }
}
