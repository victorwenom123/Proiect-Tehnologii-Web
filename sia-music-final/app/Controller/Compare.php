<?php
namespace MusicEngine\CoreSystem\Controllers;

use MusicEngine\CoreSystem\Controller;
use MusicEngine\CoreSystem\Models\CompareSong;
use MusicEngine\CoreSystem\Models\lastFmCompare;
use MusicEngine\Midleware\AuthenticateUtils;
use MusicEngine\CoreSystem\View;
use MusicEngine\CoreSystem\Config;
use DF\ArrayForm;
use MusicEngineAPI\MusicEngineClient;

class Compare extends Controller
{
    public function indexAction()
    {
       $auth = new AuthenticateUtils();
       $session = $auth->return_session();

           $firstSongFormData = [];
           $firstSongFormElements = [
               [
                   "id" => "firstSongName",
                   "label" => "Song Name",
                   "class" => "form-control",
                   "name" => "firstSongName",
                   "type" => "text",
                   "placeholder"=> "What's the song name?",
                   "required" => true,
               ],
               [
                   "id" => "firstSongAuthor",
                   "class" => "form-control",
                   "label" => "Author",
                   "name" => "firstSongAuthor",
                   "type" => "text",
                   "placeholder" => "Who wrote the song?",
                   "required" => true

               ],

           ];

           $firstSongForm = new \DF\ArrayForm($firstSongFormData, $firstSongFormElements);
           $firstSongForm = $firstSongForm->build();

            $secondSongFormData = [];
            $secondSongFormElements = [
                [
                    "id" => "secondSongName",
                    "label" => "Song Name",
                    "class" => "form-control",
                    "name" => "secondSongName",
                    "type" => "text",
                    "placeholder"=> "What's the song name?",
                    "required" => true,
                ],
                [
                    "id" => "secondSongAuthor",
                    "class" => "form-control",
                    "label" => "Author",
                    "name" => "secondSongAuthor",
                    "type" => "text",
                    "placeholder" => "Who wrote the song?",
                    "required" => true

                ]
            ];

            $secondSongForm = new \DF\ArrayForm($secondSongFormData, $secondSongFormElements);
            $secondSongForm = $secondSongForm->build();

           $args = array
           (
               "appName" => Config::APP_NAME,
               "session" => $session,
               "firstSongForm" => $firstSongForm,
               "secondSongForm" => $secondSongForm
           );
           return View::renderTemplate("compare",$args);

    }


    public function compareSongAction()
    {
        /**
         * Grabbing first song form input
         */
        $auth = new AuthenticateUtils();
        $session = $auth->return_session();

        $firstSongName = $this->hasRequest("POST","firstSongName") ? $this->getRequest("POST","firstSongName") : null;
        $firstSongAuthor = $this->hasRequest("POST","firstSongAuthor") ? $this->getRequest("POST","firstSongAuthor") : null;


        /**
         * Grabbing the second song input
         */

        $secondSongName = $this->hasRequest("POST","secondSongName") ? $this->getRequest("POST","secondSongName") : null;
        $secondSongAuthor = $this->hasRequest("POST","secondSongAuthor") ? $this->getRequest("POST","secondSongAuthor") : null;


        if($firstSongName && $firstSongAuthor && $secondSongName && $secondSongAuthor && strlen($firstSongName) >= 5 && strlen($firstSongAuthor) >= 5
        && strlen($secondSongName) >= 5 && strlen($secondSongAuthor) >= 5)
        {

            /**
             * Query API Client
             * to get comparison data
             */

            $lastFm = new lastFmCompare($firstSongName,$firstSongAuthor,$secondSongName,$secondSongAuthor);
            $lastFmData = $lastFm->initLastFmCompare();

            /**
             * If we are all good
             * get the data back
             */
            if($lastFmData)
            {
                $results = $lastFmData;
            }
            else
            {
                $results = null;
            }

                return View::renderTemplate("compare_results",["appUrl" => Config::APP_URL,"appName"=> Config::APP_NAME, "results" => $results, "session"=> $session]);

            }
            else
            {
                return View::renderTemplate("compare_results",["appUrl" => Config::APP_URL,"appName"=> Config::APP_NAME, "results" => null, "session" => $session]);
            }



    }
}