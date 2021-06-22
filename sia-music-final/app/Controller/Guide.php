<?php

namespace MusicEngine\CoreSystem\Controllers;

use MusicEngine\CoreSystem\Config;
use MusicEngine\CoreSystem\Controller;
use MusicEngine\CoreSystem\View;

class Guide extends Controller
{

    public function indexAction()
    {
        $args = array
        (
            "appName" => Config::APP_NAME,
            "appUrl" => Config::APP_URL
        );

        return View::renderTemplate("user_guide",$args);
    }

}