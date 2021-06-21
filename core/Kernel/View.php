<?php
namespace MusicEngine\CoreSystem;
use MusicEngine\Midleware\RenderEngine;

/**
 * View
 *
 * PHP version 7.0
 */
class View extends RenderEngine
{

    /**
     * render view file
     *
     * @param string $view  representing the view file
     * @param array $args  representing array of data to display in the view (optional field)
     *
     * @return void
     */
    public static function render($view, $args = [])
    {
        extract($args, EXTR_SKIP);

        $file = dirname(__DIR__) . "/resources/views/$view";  // relative to Core directory

        if (is_readable($file)) {
            require $file;
        } else {
            throw new \Exception("$file not found");
        }
    }

    /**
     * render view template making use of BladeOne
     *
     * @param string $template  the template file
     * @param array $args  associative array of data to display in the view (optional)
     *
     * @return void
     */
    public static function renderTemplate($template, $args = [])
    {
        $bladeOne = new RenderEngine();
        echo $bladeOne->setView($template)
        ->share($args)
        ->run();
    }
}