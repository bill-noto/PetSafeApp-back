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
        $logs = App::get('db')->selectJoin('logs', 'services', 'service', 'service_id', 'service');

        return view('logs-user-index', compact('logs'));
    }

}

