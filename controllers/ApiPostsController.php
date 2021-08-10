<?php

namespace App\Controllers;

use App\Core\App;

class ApiPostsController
{
    /**
     * Send all posts to be displayed in the frontend
     */

    public function index()
    {
        $posts = App::get('db')->selectJoin('posts', 'users', 'first_name', 'user_id', 'first_name', 'last_name');
        echo json_encode($posts);
    }
}