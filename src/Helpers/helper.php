<?php

/**
 * View render
 * 
 * @param string $path
 * @param array $data
 * 
 * @return mixed
 */
if (!function_exists('view')) {
    function view(string $path, array $data = [])
    {
        return \PHPLite\View\View::render($path, $data);
    }
}

/**
 * Request get
 * 
 * @param string $key
 * 
 * @return mixed
 */
if (!function_exists('request')) {
    function request(string $key)
    {
        return \PHPLite\Http\Request::value($key);
    }
}

/**
 * Redirect
 * 
 * @param string $path
 * 
 * @return mixed
 */
if (!function_exists('redirect')) {
    function redirect(string $path)
    {
        return \PHPLite\Url\Url::redirect($path);
    }
}

/**
 * Previous
 * 
 * @return mixed
 */
if (!function_exists('previous')) {
    function previous()
    {
        return \PHPLite\Url\Url::previous();
    }
}

/**
 * Url path
 * 
 * @param string $path
 * 
 * @return mixed
 */
if (!function_exists('url')) {
    function url(string $path)
    {
        return \PHPLite\Url\Url::path($path);
    }
}

/**
 * Asset path
 * 
 * @param string $path
 * 
 * @return mixed
 */
if (!function_exists('asset')) {
    function asset(string $path)
    {
        return \PHPLite\Url\Url::path($path);
    }
}

/**
 * Dump and die
 * 
 * @param mixed $data
 * 
 * @return void
 */
if (!function_exists('dd')) {
    function dd($data)
    {
        echo '<pre>';
        if (is_string($data)) {
            echo $data;
        } else {
            print_r($data);
        }
        echo '</pre>';
        die();
    }
}

/**
 * Get session data
 * 
 * @param string $key
 * 
 * @return mixed
 */
if (!function_exists('session')) {
    function session($key)
    {
        return \PHPLite\Session\Session::get($key);
    }
}

/**
 * Get session flash data
 * 
 * @param string $key
 * 
 * @return mixed
 */
if (!function_exists('flash')) {
    function flash($key)
    {
        return \PHPLite\Session\Session::flash($key);
    }
}

/**
 * Show pagination links
 * 
 * @param string $current_page
 * @param string $pages
 * 
 * @return string
 */
if (!function_exists('links')) {
    function links($current_page, $pages)
    {
        return \PHPLite\Database\Database::links($current_page, $pages);
    }
}

/**
 * Table auth
 * 
 * @param string $table
 * 
 * @return string
 */
if (!function_exists('auth')) {
    function auth($table)
    {
        $auth = \PHPLite\Session\Session::get('table') ?: \PHPLite\Cookie\Cookie::get('table');
        return \PHPLite\Database\Database::table($table)->where('id', '=', $auth)->first();
    }
}
