<?php 

namespace App\Core;

class Request
{
    // Get the request URI
    public static function uri()
    {
        return trim(
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'
        );
    }

    // Get the request type
    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}
