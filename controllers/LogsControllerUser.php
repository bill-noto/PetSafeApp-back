<?php

namespace App\Controllers;

use App\Core\App;

class LogsControllerUser
{

    /**
     * List all logs from a specific user
     */

    public function index()
    {
        $logs = App::get('db')->selectUserLog('logs', ['id' => $_SESSION['user']->id]);

        return view('logs-user-index', compact('logs'));
    }

}

