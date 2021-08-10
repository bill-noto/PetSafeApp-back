<?php

namespace App\Core;


class Request
{
    /*
     * Reads the uri and returns trimmed version
     */

    public static function uri()
    {
        return trim(
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),
            '/');
    }

    /*
     * Reads the method request (Get or Post) and assigns it
     */

    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}