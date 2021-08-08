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
        $logs = App::get('db')->select('logs', $_SESSION['user']['first_name']->first_name);

        return view('logs-user-index', compact('logs'));
    }

}

