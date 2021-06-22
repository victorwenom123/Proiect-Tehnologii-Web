<?php
namespace MusicEngine\CoreSystem\Controllers;
use MusicEngine\CoreSystem\Config;
use MusicEngine\CoreSystem\View;
use MusicEngine\Midleware\AuthenticateUtils;
use MusicEngine\CoreSystem\Model;

class Home extends \MusicEngine\CoreSystem\Controller
{
    public function indexAction()
    {
        $session = new AuthenticateUtils();
        $session = $session->return_session();

        return View::renderTemplate("index",["appName" => Config::APP_NAME, "session" => $session]);
    }

}