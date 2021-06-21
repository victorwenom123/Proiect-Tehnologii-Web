<?php
namespace MusicEngine\CoreSystem\Controllers;
use MusicEngine\CoreSystem\Config;
use MusicEngine\CoreSystem\View;
use MusicEngine\Midleware\AuthenticateUtils;
use MusicEngine\CoreSystem\Controller;
use MusicEngine\Midleware\User;

class Wall extends Controller
{
    /**
     * return void
     */
    public function indexAction()
    {
        return;
    }

    /**
     * list action
     */
    public function listAction()
    {
        $auth = new AuthenticateUtils();
        $session = $auth->return_session();

                $wall = new \MusicEngine\CoreSystem\Models\Wall();
                $posts = $wall->retrieveWallPosts();
                $posts = $posts ? $posts : null;
                $args = array
                (
                    "appName" => Config::APP_NAME,
                    "appUrl" => Config::APP_URL,
                    "posts" => $posts,
                    "session" => $session
                );
                return View::renderTemplate("my_feed",$args);
    }

    /**
     * creates a post
     */
    public function createPostAction()
    {
        $user_id =  $this->route_params['userid'];

        if($this->hasRequest("POST","post_content"))
        {
            $post_content = $this->getRequest("POST","post_content");
            if(strlen($post_content) > 5)
            {
                $wall = new \MusicEngine\CoreSystem\Models\Wall();
                $run = $wall->createPost($user_id,$post_content);
                if($run)
                {
                    $this->redirect(Config::APP_URL."/wall/".$user_id."");
                }
                else
                {
                    $this->redirect(Config::APP_URL."/wall/".$user_id."");
                }
            }
            else
            {
                $this->redirect(Config::APP_URL."/wall/".$user_id."");
            }
        }
        else
        {
            $this->redirect(Config::APP_URL."/wall/".$user_id."");
        }
    }

    public function removePostAction()
    {
        $user_id =  $this->route_params['userid'];
        $auth = new AuthenticateUtils();
        $session = $auth->return_session();
        if($session["status"] == "true")
        {
            $post_id = $this->route_params['postid'];

            $wall = new \MusicEngine\CoreSystem\Models\Wall();
            $run = $wall->removePost($post_id);
            if($run)
            {
                $this->redirect(Config::APP_URL."/wall/".$user_id."");
            }
            else
            {
                $this->redirect(Config::APP_URL."/wall/".$user_id."");
            }
        }
        else
        {
            $this->redirect(Config::APP_URL."/wall/".$user_id."");
        }


    }
}