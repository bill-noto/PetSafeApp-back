<?php

namespace App\Controllers;

use App\Core\App;

class LogsControllerUser
{

    /**
     * List all logs
     */

    public function index()
    {
        $books = App::get('db')->selectJoin('books', 'authors', 'name', 'author_id', 'author_name');

        return view('books-index', compact('books'));
    }

}

