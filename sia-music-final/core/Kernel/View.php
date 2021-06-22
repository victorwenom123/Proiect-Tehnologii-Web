<?php
namespace MusicEngine\CoreSystem;
use MusicEngine\Midleware\RenderEngine;

/**
 * View
 */
class View extends RenderEngine
{

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