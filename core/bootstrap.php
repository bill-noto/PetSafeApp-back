<?php


App\Core\App::set('config', $config = require('config.php'));

require 'functions.php';

use App\Core\Database\Connection;
use App\Core\Database\QueryBuilder;

return new QueryBuilder(
    Connection::connectDB($config['database'])
);