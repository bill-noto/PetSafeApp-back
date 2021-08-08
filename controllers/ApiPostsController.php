<?php

namespace App\Controllers;

use App\Core\App;

class ApiPostsController {

    public function index()
    {
        $posts = App::get('db')->selectJoin('posts', 'users', 'first_name', 'user_id', 'author', 'last_name');
        echo json_encode($posts);
    }
}