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
        $logs = App::get('db')->selectJoin('logs', 'services', 'service', 'service_id', 'service');

        return view('logs-index', compact('logs'));
    }

    public function indexPast()
    {
        $logs = App::get('db')->selectJoin('logs', 'services', 'service', 'service_id', 'service');

        return view('logs-index-past', compact('logs'));
    }

    public function create()
    {
        $services =  App::get('db')->selectAll('services');

        return view('logs-create', compact('services'));
    }

    public function store()
    {
        $log = $_POST;

        $log['date_requested'] = strtotime($log['date_requested']);

        App::get('db')->insert('logs', $log);

        return redirect('/admin/logs');
    }

    public function edit()
    {
        $log = App::get('db')->select('logs', $_GET);
        $services =  App::get('db')->selectAll('services');

        return view('logs-edit', compact('log', 'services'));
    }


    public function update()
    {
        $log = $_POST;

        $log['date_requested'] = strtotime($log['date_requested']);

        App::get('db')->update('logs', $log);

        return redirect('/admin/logs');
    }

    public function destroy()
    {
        App::get('db')->delete('logs', $_GET);

        return redirect('/admin/logs');
    }


}

