<?php

namespace PHPLite\Url;

use PHPLite\Http\Request;
use PHPLite\Http\Server;

class Url
{
    /**
     * Url constructor
     */
    private function __construct()
    {
    }

    /**
     * Get path
     * 
     * @param string $path
     * 
     * @return string $path
     */
    public static function path(string $path): string
    {
        return Request::baseUrl() . '/' . trim($path, '/');
    }

    /**
     * Previous url
     * 
     * @return string
     */
    public static function previous()
    {
        return Server::get('HTTP_REFERER');
    }

    /**
     * Redirect to page
     * 
     * @param string $path
     * 
     * @return void
     */
    public static function redirect(string $path)
    {
        header('location: ' . $path);
        exit();
    }
}
