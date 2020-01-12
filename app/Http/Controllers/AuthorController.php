<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

/**
 * Class AuthorController
 * @package App\Http\Controllers
 */
class AuthorController extends Controller
{
    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function authorInfo(int $id)
    {
        return view('author-info', ['author' => Author::findOrFail($id)]);
    }
}
