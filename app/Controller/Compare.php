<?php
namespace MusicEngine\CoreSystem\Controllers;

use MusicEngine\CoreSystem\Controller;
use MusicEngine\CoreSystem\Models\CompareSong;
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

    private function compareArrays($array1, $array2)
    {
        if(is_array($array1) && is_array($array2))
        {
            // returns array containing only items that appear in both arrays
            $matches = array_intersect($array1,$array2);

            // calculate 'similarity' of array 2 to array 1
            // if you want to calculate the inverse, the 'similarity' of array 1
            // to array 2, replace $array1 with $array2 below

            $a = round(count($matches));

            $b = count($array1);

            $similarity = $a/($b+count($array2)-$a)*100;

            return  $similarity . '%';
        }
        else
        {
            return "0%";
        }
    }

    /**
     * @param string $string
     * @return false|string[]|null
     */

    private function convertToArray(string $string, string $delimiter)
    {
        if(strlen($string) > 1)
        {
            return explode($delimiter,$string);
        }
        else
        {
            return null;
        }

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

            $apiClient  = new MusicEngineClient($firstSongName,$firstSongAuthor,$secondSongName,$secondSongAuthor);
            $compareSongs = json_decode($apiClient->compareSongs(),true);

            /**
             * If we are all good
             * get the data back
             */
            if($compareSongs["result"])
            {

                $results = array
                (
                    "songs" =>  $compareSongs["result"]["songs"],
                    "artist_similarity" => $compareSongs["result"]["artist_similarity"],
                    "song_similarity" => $compareSongs["result"]["song_similarity"],
                    "tags_similarity" => $compareSongs["result"]["tags_similarity"],
                    "comment_similarity" => $compareSongs["result"]["comment_similarity"],
                    "genre_similarity" => $compareSongs["result"]["genre_similarity"],
                    "length_similarity" => $compareSongs["result"]["length_similarity"],
                    "found_tags" => $compareSongs["result"]["found_tags"]
                );
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