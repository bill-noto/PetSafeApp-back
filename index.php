<?php
session_start();

require_once 'vendor/autoload.php';

use App\Core\App;
use App\Core\Request;
use App\Core\Router;


App::set('db', require 'core/bootstrap.php');

Router::load('routes.php')
    ->loadController(Request::uri(), Request::method());


