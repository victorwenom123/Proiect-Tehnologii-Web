<?php
namespace MusicEngine\CoreSystem\Controllers;

use MusicEngine\CoreSystem\Controller;
use MusicEngine\CoreSystem\View;
use MusicEngine\Midleware\AuthenticateUtils;
use MusicEngine\CoreSystem\Config;
use MusicEngineAPI\MusicEngineClient;

class APITest extends Controller
{
    public function indexAction()
    {
        $session = new AuthenticateUtils();
        $session = $session->return_session();

        return View::renderTemplate("api_test",["appName" => Config::APP_NAME,"appUrl" => Config::APP_URL, "session" => $session]);
    }

    public function compareSongsAction()
    {
        $session = new AuthenticateUtils();
        $session = $session->return_session();


        $firstSongName = $this->hasRequest("POST","firstSongName") ? $this->getRequest("POST","firstSongName") : null;
        $firstSongAuthor = $this->hasRequest("POST","firstSongAuthor") ? $this->getRequest("POST","firstSongAuthor") : null;


        /**
         * Grabbing the second song input
         */

        $secondSongName = $this->hasRequest("POST","secondSongName") ? $this->getRequest("POST","secondSongName") : null;
        $secondSongAuthor = $this->hasRequest("POST","secondSongAuthor") ? $this->getRequest("POST","secondSongAuthor") : null;


        if($firstSongName && $firstSongAuthor && $secondSongName && $secondSongAuthor && strlen($firstSongName) >= 5 && strlen($firstSongAuthor) >= 5
            && strlen($secondSongName) >= 5 && strlen($secondSongAuthor) >= 5) {

            /**
             * Query API Client
             * to get comparison data
             */

            $apiClient = new MusicEngineClient($firstSongName, $firstSongAuthor, $secondSongName, $secondSongAuthor);

            $output = $apiClient->compareSongs();


        }
        else
        {
            $output = json_encode(array("result" => "Could not find a suitable match!"));
        }
        return View::renderTemplate("api_test_compare",["appName" => Config::APP_NAME,"appUrl" => Config::APP_URL, "session" => $session,"jsonString" => $output]);

    }

    public function listSongsAction()
    {
        $session = new AuthenticateUtils();
        $session = $session->return_session();

        $apiClient = new MusicEngineClient();

        $output = $apiClient->returnAllSongs();

        if($output)
        {
            $output = $output;
        }
        else
        {
            $output = json_encode(array("result" => "No data found inside the database!"));
        }
        return View::renderTemplate("api_test_songs",["appName" => Config::APP_NAME,"appUrl" => Config::APP_URL, "session" => $session,"jsonString" => $output]);
    }
}