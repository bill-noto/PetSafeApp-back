<?php

namespace App\Core\Database;


class Connection
{

    /*
     * Function to connect to the database, uses values from the config.php file
     */

    public static function connectDB($db_config)
    {
        try {
            return new \PDO(
                'mysql:host=' . $db_config['hostname'] .
                ';dbname=' . $db_config['database'],
                $db_config['username'],
                $db_config['password'],
                $db_config['options']
            );
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
}