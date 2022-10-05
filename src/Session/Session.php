<?php

namespace PHPLite\Session;

class Session
{
    /**
     * Session constructor
     * 
     */
    private function __construct()
    {
    }

    /**
     * Session start
     * 
     * @return void
     */
    public static function start()
    {
        if (!session_id()) {
            ini_set('session.use_only_cookies', 1);
            session_start();
        }
    }

    /**
     * Set new session
     * 
     * @param string $key
     * @param string $value
     * 
     * @return string $value
     */
    public static function set(string $key, $value): string
    {
        $_SESSION[$key] = $value;

        return $value;
    }

    /**
     * Check that session has the key
     * 
     * @param string $key
     * 
     * @return bool
     */
    public static function has(string $key): bool
    {
        return isset($_SESSION[$key]);
    }

    /**
     * Get session by the given key
     * 
     * @param string $key
     * 
     * @return mixed
     */
    public static function get(string $key): mixed
    {
        return static::has($key) ? $_SESSION[$key] : null;
    }

    /**
     * Remove session by the given key
     * 
     * @param string $key
     * 
     * @return void
     */
    public static function remove(string $key)
    {
        unset($_SESSION[$key]);
    }

    /**
     * Return all sessions
     * 
     * @return array
     */
    public static function all(): array
    {
        return $_SESSION;
    }

    /**
     * Destroy the session
     * 
     * @return void
     */
    public static function destroy()
    {
        foreach (static::all() as $key => $value) {
            static::remove($key);
        }
    }

    /**
     * Get flash session
     * 
     * @param string $key
     * 
     * @return mixed
     */
    public static function flash(string $key): mixed
    {
        $value = null;
        if (static::has($key)) {
            $value = static::get($key);
            static::remove($key);
        }
        return $value;
    }
}
