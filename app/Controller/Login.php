<?php
namespace MusicEngine\CoreSystem\Controllers;
use MusicEngine\Midleware\AuthenticateUtils;
use MusicEngine\CoreSystem\Config;
use MusicEngine\CoreSystem\Controller;
use MusicEngine\CoreSystem\View;
class Login extends Controller
{
    /**
     * @return string
     * Login Page
     */

    public function indexAction()
    {
        $auth = new AuthenticateUtils();
        $session = $auth->return_session();
        if($session["status"] == "true")
        {
            $this->redirect(Config::APP_URL."/home");
        }
        else
            {
                return View::renderTemplate("login", ["appName" => Config::APP_NAME]);
            }
    }


    public function logoutAction()
    {
        $auth = new AuthenticateUtils();
        $session = $auth->return_session();
        if($session["status"] == "true")
        {
            $auth->logout();
            $this->redirect(Config::APP_URL."/home");
        }
        else
        {
            $this->redirect(Config::APP_URL."/home");
        }
    }


}
