<?php

namespace App\Core;

class App
{
    public static $registry = [];

    /*
     * Set keys and values to the app class
     */

    public static function set($key, $value)
    {
        static::$registry[$key] = $value;
    }

    /*
     * Set get keys to the app class
     */

    public static function get($key)
    {
        return static::$registry[$key];
    }
}