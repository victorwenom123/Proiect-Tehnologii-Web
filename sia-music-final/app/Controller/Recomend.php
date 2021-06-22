<?php
namespace MusicEngine\CoreSystem\Controllers;

use MusicEngine\CoreSystem\Config;
use MusicEngine\CoreSystem\Controller;
use MusicEngine\CoreSystem\View;
use MusicEngine\Midleware\AuthenticateUtils;
use MusicEngine\CoreSystem\Model;

class Recomend extends Controller
{
    public function indexAction()
    {
        $auth = new AuthenticateUtils();
        $session = $auth->return_session();

        $songFormData = [];
        $songFormElements = [
            [
                "id" => "songTags",
                "class" => "form-control",
                "label" => "Song tags",
                "name" => "songTags",
                "placeholder" => "Separate the tags by comma (,)",
                "type" => "text",
                "required" => "",
            ],
            [
                "id" => "songGenre",
                "class" => "form-control",
                "label" => "Prefferences",
                "name" => "songGenre",
                "type" => "select",
                "options" =>
                    [
                        "" => "None",
                        "rock" => "Rock",
                        "metal" => "Metal",
                        "blues" => "Blues",
                        "country" => "Country",
                        "jazz" => "Jazz",
                        "rap" => "Rap",
                        "electronic" => "Electronic",
                        "rnb" => "R&B",
                        "pop" => "Pop",
                        "latin" => "Latin",
                        "raggae" => "Raggae",
                        "opera" => "Opera",
                        "classical" => "Classical"
                    ],
                "required" => "",
            ],
            [
                "id" => "songMood",
                "class" => "form-control",
                "label" => "Song Mood",
                "name" => "songMood",
                "type" => "select",
                "options" =>
                    [
                        "" => "None",
                        "happy" => "Happy",
                        "sad" => "Sad",
                        "tired" => "Tired",
                        "angry" => "Angry",
                        "relaxed" => "Relaxed",
                        "humorous" => "Humorous",
                        "reflective" => "Reflective",
                        "romantic" => "Romantic",
                    ],

            ],
            [
                "id" => "songAge",
                "class" => "form-control",
                "label" => "Age rated",
                "name" => "songAge",
                "placeholder" => "Recommended age for this song...",
                "type" => "number",

            ],
            [
                "id" => "songReleaseDate",
                "class" => "form-control",
                "label" => "Release date",
                "name" => "releaseDate",
                "placeholder" => "When was this released?",
                "type" => "date",

            ],
            [
                "id" => "educationLevel",
                "class" => "form-control",
                "label" => "Education Level",
                "name" => "educationLevel",
                "type" => "select",
                "options" =>
                    [
                        "" => "None",
                        "high" => "High",
                        "low" => "Low",
                    ],

            ],
            [
                "id" => "habitat",
                "class" => "form-control",
                "label" => "Habitat",
                "name" => "songHabitat",
                "type" => "select",
                "options" =>
                    [
                        "" => "None",
                        "rural" => "Rural",
                        "urban" => "Urban",
                    ],

            ],
            [
                "id" => "goodForGroups",
                "class" => "form-control",
                "label" => "Good for groups",
                "name" => "songGoodForGroups",
                "type" => "select",
                "options" =>
                    [
                        "" => "None",
                        "yes" => "Yes",
                        "no" => "No",
                    ],

            ],
            [
                "id" => "songLocations",
                "class" => "form-control",
                "label" => "Geographic refferences",
                "name" => "songLocations",
                "placeholder" => "Comma separated locations...",
                "type" => "text",

            ],
        ];

        $songForm = new \DF\ArrayForm($songFormData, $songFormElements);
        $songForm = $songForm->build();

        $args = array
        (
            "session" => $session,
            "appName" => Config::APP_NAME,
            "appUrl" => Config::APP_URL,
            "form" => $songForm
        );



        return View::renderTemplate("recomend",$args);
    }

    /**
     * Get Song Recomendation Action Controllers
     */

    public function getRecomendationsAction()
    {
        //var_dump($this->is_request("POST"));

        $auth = new AuthenticateUtils();
        $session = $auth->return_session();

        $songTags = $this->hasRequest("POST","songTags") ? $this->getRequest("POST","songTags"): null;
        $songGenre= $this->hasRequest("POST","songGenre") ? $this->getRequest("POST","songGenre"): null;
        $songMood = $this->hasRequest("POST","songMood") ? $this->getRequest("POST","songMood"): null;
        $songAge = $this->hasRequest("POST","songAge") ? $this->getRequest("POST","songAge"): null;
        $songReleaseDate = $this->hasRequest("POST","releaseDate") ? $this->getRequest("POST","releaseDate"): null;
        $songEducationLevel = $this->hasRequest("POST","educationLevel") ? $this->getRequest("POST","educationLevel"): null;
        $songHabitat = $this->hasRequest("POST","songHabitat") ? $this->getRequest("POST","songHabitat"): null;
        $songGoodForGroups = $this->hasRequest("POST","songGoodForGroups") ? $this->getRequest("POST","songGoodForGroups"): null;
        $songLocationRefferences = $this->hasRequest("POST","songLocations") ? $this->getRequest("POST","songLocations"): null;

        $querySongs = new \MusicEngine\CoreSystem\Models\Recomend($songTags,$songGenre,$songMood,$songAge,$songReleaseDate,$songEducationLevel,$songHabitat,$songGoodForGroups,$songLocationRefferences);

        $songResults = $querySongs->filterResults();

        if($songResults)
        {
            /**
             * Generate RSS and Save it
             */

            $generateRss = $querySongs->generateRssFile($songResults);

            /**
             * If the user is logged in
             * proceed to posting the record on his wall
             */

            if($session["status"] == "true")
            {
                $querySongs->postRssToFeed($generateRss,$session["user_id"]);
            }

            $args = array
            (
                "session" => $session,
                "appName" => Config::APP_NAME,
                "appUrl" => Config::APP_URL,
                "results" => $songResults
            );
        }
        else
        {
            $args = array
            (
                "session" => $session,
                "appName" => Config::APP_NAME,
                "appUrl" => Config::APP_URL,
                "results" => null
            );
        }

        return View::renderTemplate("recomend_results",$args);


    }
}