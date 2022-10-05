<?php

namespace PHPLite\Http;

class Request
{
    /**
     * Script name
     * 
     * @var $script_name
     */
    private static $script_name;

    /**
     * Base url
     * 
     * @var $base_url
     */
    private static $base_url;

    /**
     * Url
     * 
     * @var $url
     */
    private static $url;

    /**
     * Full url
     * 
     * @var $full_url
     */
    private static $full_url;

    /**
     * Query string
     * 
     * @var @query_string
     */
    private static $query_string;

    /**
     * Request constructor
     * 
     * @return void
     */
    private function __construct()
    {
    }

    /**
     * Handle the request
     * 
     * @return void
     */
    public static function handle()
    {
        static::$script_name = str_replace('\\', '', dirname(Server::get('SCRIPT_NAME')));
        static::setBaseUrl();
        static::setUrl();
    }

    /**
     * Set base url
     * 
     * @return void
     */
    private static function setBaseUrl()
    {
        $protocol = Server::get('REQUEST_SCHEME') . '://';
        $host = Server::get('HTTP_HOST');
        $script_name = static::$script_name;

        static::$base_url = $protocol . $host . $script_name;
    }

    /**
     * Set url
     * 
     * @return void
     */
    private static function setUrl()
    {
        $request_uri = urldecode(Server::get('REQUEST_URI'));
        $request_uri = rtrim(preg_replace('#^' . static::$script_name . '#', '', $request_uri), '/');

        $query_string = '';

        static::$full_url = $request_uri;
        if (strpos($request_uri, '?') !== false) {
            list($request_uri, $query_string) = explode('?', $request_uri);
        }

        static::$url = $request_uri ?: '/';
        static::$query_string = $query_string;
    }

    /**
     * Get base url
     * 
     * @return string
     */
    public static function baseUrl()
    {
        return static::$base_url;
    }

    /**
     * Get url
     * 
     * @return string
     */
    public static function url()
    {
        return static::$url;
    }

    /**
     * Get query string
     * 
     * @return string
     */
    public static function queryString()
    {
        return static::$query_string;
    }

    /**
     * Get full uri
     * 
     * @return string
     */
    public static function fullUrl()
    {
        return static::$full_url;
    }

    /**
     * Get request method
     * 
     * @return  string
     */
    public static function method()
    {
        return Server::get('REQUEST_METHOD');
    }

    /**
     * Check that the request has the key
     * 
     * @param array $type
     * @param string $key
     * 
     * @return bool
     */
    public static function has(array $type, string $key): bool
    {
        return array_key_exists($key, $type);
    }

    /**
     * Get the value from the request
     * 
     * @param string $key
     * @param array $type
     * 
     * @return mixed
     */
    public static function value(string $key, array $type = []): mixed
    {
        $type = !empty($type) ? $type : $_REQUEST;
        return static::has($type, $key) ? $type[$key] : null;
    }

    /**
     * Get value from GET request
     * 
     * @param string $key
     * 
     * @return mixed
     */
    public static function get(string $key): mixed
    {
        return static::value($key, $_GET);
    }

    /**
     * Get value from POST request
     * 
     * @param string $key
     * 
     * @return mixed
     */
    public static function post(string $key): mixed
    {
        return static::value($key, $_POST);
    }

    /**
     * Set value for request by the given key
     * 
     * @param string $key
     * @param string $value
     * 
     * @return string $value
     */
    public static function set(string $key, string $value)
    {
        $_REQUEST[$key] = $value;
        $_POST[$key] = $value;
        $_GET[$key] = $value;

        return $value;
    }

    /**
     * Get previous request value
     * 
     * @return string
     */
    public static function previous()
    {
        return Server::get('HTTP_REFERER');
    }

    /**
     * Get request all
     * 
     * @return array
     */
    public static function all()
    {
        return $_REQUEST;
    }
}
