<?php

namespace App\Controllers;

use App\Core\App;

class LogsControllerAdmin
{

    /**
     * List all logs
     */

    public function index()
    {
        $logs = App::get('db')->selectJoin('logs', 'users', 'first_name', 'user_id', 'customer', 'last_name');

        return view('logs-index', compact('logs'));
    }

    public function create()
    {
        $authors =  App::get('db')->selectAll('authors');

        return view('books-create', compact('authors'));
    }

    public function store()
    {
        //TODO: Do some validation and sanitization before storing

        App::get('db')->insert('books', $_POST);

        return redirect('/books');
    }

    public function edit()
    {
        $book = App::get('db')->select('books', $_GET);


        return view('books-edit', compact('book'));
    }


    public function update()
    {
        //TODO: Do some validation and sanitization before storing
        App::get('db')->update('books', $_POST);

        return redirect('/books');
    }

    public function destroy()
    {
        //TODO: Ask user are they sure before delete
        App::get('db')->delete('books', $_GET);

        return redirect('/books');
    }


}

