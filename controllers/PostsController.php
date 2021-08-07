<?php

namespace App\Controllers;

use App\Core\App;

class PostsController
{

    /**
     * List all posts
     */

    public function index()
    {
        $posts = App::get('db')->selectJoin('posts', 'users', 'first_name', 'user_id', 'author', 'last_name');

        return view('posts-index', compact('posts'));
    }

    public function create()
    {
        $authors =  App::get('db')->selectAll('users');

        return view('posts-create', compact('authors'));
    }

    public function store()
    {
        App::get('db')->insert('posts', $_POST);

        return redirect('/admin/posts');
    }

    public function edit()
    {
        $post = App::get('db')->select('posts', $_GET);
        $services =  App::get('db')->selectAll('services');

        return view('posts-edit', compact('post', 'services'));
    }

    public function update()
    {
        App::get('db')->update('posts', $_POST);

        return redirect('/admin/posts');
    }

    public function destroy()
    {
        App::get('db')->delete('posts', $_GET);

        return redirect('/admin/posts');
    }

}

