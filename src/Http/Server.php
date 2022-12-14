<?php

namespace PHPLite\Http;

class Server
{
    /**
     * Server constructor
     * 
     */
    private function __construct()
    {
    }

    /**
     * Check that server has the key
     * 
     * @param string $key
     * 
     * @return bool
     */
    public static function has(string $key)
    {
        return isset($_SERVER[$key]);
    }

    /**
     * Get the value from server by the given key
     * 
     * @param string $key
     * 
     * @return mixed
     */
    public static function get(string $key): mixed
    {
        return static::has($key) ? $_SERVER[$key] : null;
    }

    /**
     * Get all server data
     * 
     * @return array
     */
    public static function all()
    {
        return $_SERVER;
    }

    /**
     * Get path info for path
     * 
     * @param string $path
     * 
     * @return array
     */
    public static function path_info($path)
    {
        return pathinfo($path);
    }
}
