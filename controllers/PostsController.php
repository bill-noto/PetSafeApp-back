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
        $posts = App::get('db')->selectJoin('posts', 'users', 'first_name', 'user_id', 'first_name', 'last_name');

        return view('posts-index', compact('posts'));
    }

    /**
     * Sends admin to the post creation page
     */

    public function create()
    {
        $authors = App::get('db')->selectAll('users');

        return view('posts-create', compact('authors'));
    }

    /**
     * Stores information from create page into the database
     */

    public function store()
    {
        App::get('db')->insert('posts', $_POST);

        return redirect('/admin/posts');
    }

    /**
     * Pulls specific information about a certain id from the database, and redirects to the edit page
     */

    public function edit()
    {
        $post = App::get('db')->select('posts', $_GET);
        $services = App::get('db')->selectAll('services');

        return view('posts-edit', compact('post', 'services'));
    }

    /**
     * Stores the updated post into the database
     */

    public function update()
    {
        App::get('db')->update('posts', $_POST);

        return redirect('/admin/posts');
    }

    /**
     * Deletes a specific post depending on the id sent through the 'get'
     */

    public function destroy()
    {
        App::get('db')->delete('posts', $_GET);

        return redirect('/admin/posts');
    }

}

