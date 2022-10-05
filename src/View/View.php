<?php

namespace PHPLite\View;

use PHPLite\File\File;
use Jenssegers\Blade\Blade;
use PHPLite\Session\Session;

class View
{
    /**
     * View constructor
     */
    private function __construct()
    {
    }

    /**
     * Render view file
     * 
     * @param string $path
     * @param array $data
     * 
     * @return string
     */
    public static function render(string $path, array $data = []): string
    {
        $errors = Session::flash('errors');
        $old = Session::flash('old');
        $data = array_merge($data, ['errors' => $errors, 'old' => $old]);
        return static::bladeRender($path, $data);
    }

    /**
     * Render the view files using blade engine
     * 
     * @param string $path
     * @param array $data
     * 
     * @return string
     */
    public static function bladeRender(string $path, array $data = [])
    {
        $blade = new Blade(File::path('views'), File::path('storage/cache'));

        return $blade->make($path, $data)->render();
    }

    /**
     * Render view file
     * 
     * @param string $path
     * @param array $data
     * 
     * @return string
     */
    public static function viewRender(string $path, array $data = []): string
    {
        $path = 'views' . File::ds() . str_replace(['/', '\\', '.'], File::ds(), $path) . '.php';

        if (!File::exist($path)) {
            throw new \Exception("The view file $path is not exist");
        }

        ob_start();
        extract($data);
        include File::path($path);
        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }
}
