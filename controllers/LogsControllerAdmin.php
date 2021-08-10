<?php

namespace App\Controllers;

use App\Core\App;

class LogsControllerAdmin
{

    /**
     * List all due logs
     */

    public function index()
    {
        $logs = App::get('db')->selectJoin('logs', 'users', 'first_name', 'user_id', 'first_name', 'last_name', 'services', 'service', 'service', 'service_id');

        return view('logs-index', compact('logs'));
    }

    /**
     * List all pasts logs
     */

    public function indexPast()
    {
        $logs = App::get('db')->selectJoin('logs', 'users', 'first_name', 'user_id', 'first_name', 'last_name', 'services', 'service', 'service', 'service_id');

        return view('logs-index-past', compact('logs'));
    }

    /**
     * Sends admin to the log creation page
     */

    public function create()
    {
        $users = App::get('db')->selectAll('users');

        $services = App::get('db')->selectAll('services');

        return view('logs-create', compact('services', 'users'));
    }

    /**
     * Stores information from create page into the database
     */

    public function store()
    {
        $log = $_POST;

        $log['date_requested'] = strtotime($log['date_requested']);

        App::get('db')->insert('logs', $log);

        return redirect('/admin/logs');
    }

    /**
     * Pulls specific information about a certain id from the database, and redirects to the edit page
     */

    public function edit()
    {
        $log = App::get('db')->select('logs', $_GET);

        $users = App::get('db')->selectAll('users');

        $services = App::get('db')->selectAll('services');

        return view('logs-edit', compact('log', 'services', 'users'));
    }

    /**
     * Stores the updated log into the database
     */

    public function update()
    {
        $log = $_POST;

        $log['date_requested'] = strtotime($log['date_requested']);

        App::get('db')->update('logs', $log);

        return redirect('/admin/logs');
    }

    /**
     * Deletes a specific log depending on the id sent through the 'get'
     */

    public function destroy()
    {
        App::get('db')->delete('logs', $_GET);

        return redirect('/admin/logs');
    }


}

