<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function show($id)
    {
        $view_data = [
            'author' => Author::findOrFail($id),
            'books' => \App\Book::all()->where('author_id', $id),
        ];
        return view('author-info', $view_data);
    }
}
