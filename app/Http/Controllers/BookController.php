<?php

namespace App\Http\Controllers;

use App\Book;
use App\Comment;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function bookInfo(int $id)
    {
        $book = Book::findOrFail($id);
        $view_data = [
            'book' => $book,
            'comments_tree' => Comment::getCommentsTree($book->id)
        ];
        return view('book-info', $view_data);
    }
}
