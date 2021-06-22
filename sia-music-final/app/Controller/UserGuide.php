<?php
namespace MusicEngine\CoreSystem\Controllers;

use MusicEngine\CoreSystem\Config;
use MusicEngine\CoreSystem\Controller;
use MusicEngine\CoreSystem\View;
use MusicEngine\Midleware\AuthenticateUtils;
use MusicEngine\CoreSystem\Model;

class UserGuide extends Controller
{public function indexAction()
{   $auth = new AuthenticateUtils();
    $session = $auth->return_session();
    include "../resources/htmlfiles/userguide.html";}}