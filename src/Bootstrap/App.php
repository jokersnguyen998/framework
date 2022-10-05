<?php

namespace PHPLite\Bootstrap;

use PHPLite\Exceptions\Whoops;
use PHPLite\File\File;
use PHPLite\Http\Request;
use PHPLite\Http\Response;
use PHPLite\Http\Server;
use PHPLite\Router\Route;
use PHPLite\Session\Session;

class App
{
    /**
     * App constructor
     *
     * @return void
     */
    private function __construct()
    {
    }

    /**
     * Run the application
     *
     * @return void
     */
    public static function run()
    {
        // Register whoops
        Whoops::handle();

        // Start session
        Session::start();

        // Handle the request
        Request::handle();

        // Require all routes directory
        File::require_directory('routes');

        // Handle the route
        $data = Route::handle();

        Response::output($data);
    }
}
