<?php

namespace App\Controllers;

use App\Core\App;

class ApiBooksController {

    public function index()
    {
        $books = App::get('db')->selectJoin('books', 'authors', 'name', 'author_id', 'author_name');
        echo json_encode($books);
    }
}