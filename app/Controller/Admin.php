<?php
namespace MusicEngine\CoreSystem\Controllers;
use MusicEngine\CoreSystem\Config;
use MusicEngine\CoreSystem\Controller;
use MusicEngine\CoreSystem\Models\Song;
use MusicEngine\CoreSystem\Models\SongList;
use MusicEngine\CoreSystem\Models\UserList;
use MusicEngine\Midleware\AuthenticateUtils;
use MusicEngine\CoreSystem\View;
use DF\ArrayForm;

class Admin extends Controller
{
    public function indexAction()
    {
        $auth = new AuthenticateUtils();
        $session = $auth->return_session();

        if($session["status"] == "true" && $session["user_rank"] == "admin")
        {
            $args = array("appName" => Config::APP_NAME, "appUrl" => Config::APP_URL, "pageTitle" => "Home");
            return View::renderTemplate("admin",$args);
        }
        else
        {
            $this->redirect(Config::APP_URL."/login");
        }
    }

    public function addSongIndexAction()
    {
        $auth = new AuthenticateUtils();
        $session = $auth->return_session();

        if($session["status"] == "true" && $session["user_rank"] == "admin")
        {
            /**
             * Generate form for this
             */

            $songFormData = [
                "action" => Config::APP_URL."/admin/add-song-action",
                "method"=> "POST",
                "class" => "addSongFormDB",
                "display" => "div"
            ];
            $songFormElements = [
                [
                    "id" => "songName",
                    "label" => "Song Name",
                    "class" => "form-control",
                    "name" => "songName",
                    "type" => "text",
                    "placeholder"=> "What's the song name?",
                    "required" => true,
                ],
                [
                    "id" => "songAuthor",
                    "class" => "form-control",
                    "label" => "Author",
                    "name" => "songAuthor",
                    "type" => "text",
                    "placeholder" => "Who wrote the song?",
                    "required" => true

                ],
                [
                    "id" => "songLength",
                    "class" => "form-control",
                    "label" => "Song duration",
                    "name" => "songLength",
                    "placeholder" => "Type the song duration in minutes",
                    "type" => "number",
                    "required" => true,
                ],
                [
                    "id" => "songTags",
                    "class" => "form-control",
                    "label" => "Song tags",
                    "name" => "songTags",
                    "placeholder" => "Separate the tags by comma (,)",
                    "type" => "text",
                    "required" => true,
                ],
                [
                    "id" => "songGenre",
                    "class" => "form-control",
                    "label" => "Song genre",
                    "name" => "songGenre",
                    "type" => "select",
                    "options" =>
                        [
                            "none" => "None",
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
                    "required" => true,
                ],
                [
                    "id" => "songComments",
                    "class" => "form-control",
                    "label" => "Song comments",
                    "name" => "songComments",
                    "placeholder" => "Type + in between them...",
                    "type" => "textarea",
                    "required" => true,
                ],
                [
                    "id" => "songMood",
                    "class" => "form-control",
                    "label" => "Song Mood",
                    "name" => "songMood",
                    "type" => "select",
                    "options" =>
                        [
                            "none" => "None",
                            "happy" => "Happy",
                            "sad" => "Sad",
                            "tired" => "Tired",
                            "angry" => "Angry",
                            "relaxed" => "Relaxed",
                            "humorous" => "Humorous",
                            "reflective" => "Reflective",
                            "romantic" => "Romantic",
                        ],
                    "required" => true,
                ],
                [
                    "id" => "songAge",
                    "class" => "form-control",
                    "label" => "Age rated",
                    "name" => "songAge",
                    "placeholder" => "Recommended age for this song...",
                    "type" => "number",
                    "required" => true,
                ],
                [
                    "id" => "songReleaseDate",
                    "class" => "form-control",
                    "label" => "Release date",
                    "name" => "releaseDate",
                    "placeholder" => "When was this released?",
                    "type" => "date",
                    "required" => true,
                ],
                [
                    "id" => "educationLevel",
                    "class" => "form-control",
                    "label" => "Education Level",
                    "name" => "educationLevel",
                    "type" => "select",
                    "options" =>
                        [
                            "none" => "None",
                            "high" => "High",
                            "low" => "Low",
                        ],
                    "required" => true,
                ],
                [
                    "id" => "habitat",
                    "class" => "form-control",
                    "label" => "Habitat",
                    "name" => "songHabitat",
                    "type" => "select",
                    "options" =>
                        [
                            "none" => "None",
                            "rural" => "Rural",
                            "urban" => "Urbam",
                        ],
                    "required" => true,
                ],
                [
                    "id" => "goodForGroups",
                    "class" => "form-control",
                    "label" => "Good for groups",
                    "name" => "songGoodForGroups",
                    "type" => "select",
                    "options" =>
                        [
                            "none" => "None",
                            "yes" => "Yes",
                            "no" => "No",
                        ],
                    "required" => true,
                ],
                [
                    "id" => "songLocations",
                    "class" => "form-control",
                    "label" => "Geographic refferences",
                    "name" => "songLocations",
                    "placeholder" => "Comma separated locations...",
                    "type" => "text",
                    "required" => true,
                ],
                [
                    "id" => "submit-btn",
                    "class" => "btn",
                    "name" => "createSong",
                    "value" => "Create entry",
                    "type" => "submit"
                ],
            ];

            $songForm = new \DF\ArrayForm($songFormData, $songFormElements);
            $songForm = $songForm->build();
            $args = array
            (
                "appName" => Config::APP_NAME,
                "appUrl" => Config::APP_URL,
                "pageTitle" => "Add song to database",
                "songForm" => $songForm,
                "songFormResult" => null
            );
            return View::renderTemplate("add_song",$args);
        }
        else
        {
            $this->redirect(Config::APP_URL."/login");
        }
    }

    /**
     * add song
     */

    public function addSongAction()
    {
        $auth = new AuthenticateUtils();
        $session = $auth->return_session();

        if($session["status"] == "true" && $session["user_rank"] == "admin")
        {
            $songTitle = $this->getRequest("POST","songName");
            $songArtist = $this->getRequest("POST","songAuthor");
            $songLength = $this->getRequest("POST","songLength");
            $songTags = $this->getRequest("POST","songTags");
            $songGenre= $this->getRequest("POST","songGenre");
            $songComments = $this->getRequest("POST","songComments");
            $songMood = $this->getRequest("POST","songMood");
            $songAge = $this->getRequest("POST","songAge");
            $songReleaseDate = $this->getRequest("POST","releaseDate");
            $songEducationLevel = $this->getRequest("POST","educationLevel");
            $songHabitat = $this->getRequest("POST","songHabitat");
            $songGoodForGroups = $this->getRequest("POST","songGoodForGroups");
            $songLocationRefferences = $this->getRequest("POST","songLocations");

            $song = new Song($songTitle,$songArtist,$songLength,$songTags,$songGenre,$songComments,$songMood,$songAge,$songReleaseDate,
                                    $songEducationLevel,$songHabitat,$songGoodForGroups,$songLocationRefferences);

            $result = $song->saveSongToDb();

                if($result)
                {
                    return View::renderTemplate("add_song_result",["appName" => Config::APP_NAME, "pageTitle" => "Add Song","appUrl" => Config::APP_URL, "result" => "Song was saved in the database! Yay"]);
                }
                else
                {
                    return View::renderTemplate("add_song_result",["appName" => Config::APP_NAME, "pageTitle" => "Add Song", "appUrl" => Config::APP_URL, "result" => $result["error"]]);
                }
        }
        else
            {
                $this->redirect(Config::APP_URL."/login");
            }

    }

    /**
     * List all songs
     */

    public function listSongsAction()
    {
        $auth = new AuthenticateUtils();
        $session = $auth->return_session();

        if($session["status"] == "true" && $session["user_rank"] == "admin")
        {
            $songs = new SongList();
            $songs = $songs->listDbSongs();

                if($songs)
                {
                    $tableHTML = $this->build_html_table($songs,"inline");
                    $error = null;
                }
                else
                {
                    $tableHTML = null;
                    $error = "No song records found in the database.";
                }

                $args = array
                (
                    "appName" => Config::APP_NAME,
                    "appUrl" => Config::APP_URL,
                    "pageTitle" => "Database storage for songs",
                    "listHTML" => $tableHTML,
                    "error" => $error
                );

            return View::renderTemplate("list_songs",$args);
        }
        else
        {
            $this->redirect(Config::APP_URL."/login");
        }
    }

    /**
     * List all users
     */

    public function listUsersAction()
    {
        $auth = new AuthenticateUtils();
        $session = $auth->return_session();

        if($session["status"] == "true" && $session["user_rank"] == "admin")
        {
            $users = new UserList();
            $users= $users->listDbUsers();

            if($users)
            {
                $tableHTML = $this->build_html_table($users,"inline");
                $error = null;
            }
            else
            {
                $tableHTML = null;
                $error = "No user records found in the database.";
            }

            $args = array
            (
                "appName" => Config::APP_NAME,
                "appUrl" => Config::APP_URL,
                "pageTitle" => "Database storage for users",
                "listHTML" => $tableHTML,
                "error" => $error
            );

            return View::renderTemplate("list_users",$args);
        }
        else
        {
            $this->redirect(Config::APP_URL."/login");
        }
    }

    /**
     * Import Songs via CSV File
     */

    public function importCsvAction()
    {
        $auth = new AuthenticateUtils();
        $session = $auth->return_session();

        if($session["status"] == "true" && $session["user_rank"] == "admin")
        {
            $args = array
            (
                "appName" => Config::APP_NAME,
                "appUrl" => Config::APP_URL,
                "pageTitle" => "Import CSV"
            );

            return View::renderTemplate("import_csv",$args);
        }
        else
        {
            $this->redirect(Config::APP_URL."/login");
        }
    }

    /**
     * Process CSV
     */

    public function processCsv()
    {
        if($this->get_files_request("csv-file") && $this->getRequest("POST","delimiter"))
        {
            $csv_file = $this->get_files_request("csv-file");
            $delimiter = $this->getRequest("POST","delimiter");

            $fileName = $csv_file["tmp_name"];
            $data = file_get_contents($fileName);

            $csvArray = $this->csv_to_array($data,$delimiter);

            if(isset($csvArray[0]["name"]) && isset($csvArray[0]["artist"]) && isset($csvArray[0]["length"]) && isset($csvArray[0]["tags"]) && isset($csvArray[0]["genre"]) && isset($csvArray[0]["comments"]) && isset($csvArray[0]["mood"]) && isset($csvArray[0]["age_rating"]) && isset($csvArray[0]["release_date"]) && isset($csvArray[0]["education_level"]) && isset($csvArray[0]["habitat"]) && isset($csvArray[0]["good_for_groups"]) && isset($csvArray[0]["location_refferences"]))
            {
                foreach($csvArray as $csv)
                {
                    $name = $csv["name"];
                    $artist = $csv["artist"];
                    $length = $csv["length"];
                    $tags = $csv["tags"];
                    $genre = $csv["genre"];
                    $comments = $csv["comments"];
                    $mood = $csv["mood"];
                    $age_rating = $csv["age_rating"];
                    $release_date = $csv["release_date"];
                    $education_level = $csv["education_level"];
                    $habitat = $csv["habitat"];
                    $good_for_groups = $csv["good_for_groups"];
                    $location_refferences = $csv["location_refferences"];

                    $songModel = new Song($name,$artist,$length,$tags,$genre,$comments,$mood,$age_rating,$release_date,$education_level,$habitat,$good_for_groups,$location_refferences);
                    $result = $songModel->saveSongToDb();
                }

                if($result)
                {
                    $args = array
                    (
                        "appName" => Config::APP_NAME,
                        "appUrl" => Config::APP_URL,
                        "pageTitle" => "Import CSV",
                        "result" => "Your file was imported succesfully!"
                    );
                    return View::renderTemplate("import_csv_results",$args);
                }
            }
            else
            {
                $args = array
                (
                    "appName" => Config::APP_NAME,
                    "appUrl" => Config::APP_URL,
                    "pageTitle" => "Import CSV",
                    "result" => "Mandatory column names missing. Check your csv structure or chose a different delimiter!"
                );
                return View::renderTemplate("import_csv_results",$args);
            }

        }
        else
        {
            die("You did not specify a CSV file or delimiter!");
        }
    }
}