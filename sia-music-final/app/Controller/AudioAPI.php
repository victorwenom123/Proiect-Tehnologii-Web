<?php

namespace MusicEngine\CoreSystem\Controllers;
use MusicEngine\CoreSystem\Controller;
use MusicEngine\CoreSystem\Models\CompareSong;
use MusicEngine\Midleware\AuthenticateUtils;

class AudioAPI extends Controller
{
    public function indexAction()
    {
        $responseArray = array
        (
           "endpoints" => array
           (
               "/" => array("method" => "GET", "params" => NULL),
               "compareSongs" => array("method" => "POST", "params" => "firstSongName, firstSongAuthor, secondSongName, secondSongAuthor"),
           ),
        );

        echo json_encode($responseArray);
    }
    private function compareArrays($array1, $array2)
    {
        if(is_array($array1) && is_array($array2))
        {
           
            $matches = array_intersect($array1,$array2); // returns array containing only items that appear in both arrays

            // calculating the similarity of the 2 arrays :

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

    /**
     * Compares the 2 given songs
     */

    public function compareSongAction()
    {

        /**
         * Grabbing first song form input
         */
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
            $firstSongDetails = new CompareSong($firstSongName,$firstSongAuthor);
            $firstSongDetails = $firstSongDetails->findSongByCriteria();
            $secondSongDetails = new CompareSong($secondSongName,$secondSongAuthor);
            $secondSongDetails = $secondSongDetails->findSongByCriteria();

            if($firstSongDetails && $secondSongDetails)
            {
                //echo "<pre>";
                //var_dump($firstSongDetails);
                //echo "<hr/>";
                // var_dump($secondSongDetails);
                //echo "</pre>";

                $firstTags = $firstSongDetails["tags"];
                $firstGenre = $firstSongDetails["genre"];
                $firstComments = $firstSongDetails["comments"];
                $firstLength = $firstSongDetails["length"];

                $secondTags = $secondSongDetails["tags"];
                $secondGenre = $secondSongDetails["genre"];
                $secondComments = $secondSongDetails["comments"];
                $secondLength = $secondSongDetails["length"];

                if($firstGenre == $secondGenre)
                {
                    $similarGenre = "Identical";
                }
                else
                {
                    $similarGenre = "Different";
                }

                if($firstLength == $secondLength)
                {
                    $similarLength = "Identical";
                }
                else
                {
                    $similarLength = "Different";
                }

                if($firstSongDetails["artist"] == $secondSongDetails["artist"])
                {
                    $similarArtist = "Identical";
                }
                else
                {
                    $similarArtist = "Different";
                }

                if($firstSongDetails["name"] == $secondSongDetails["name"])
                {
                    $similarSong = "Identical";
                }
                else
                {
                    $similarSong = "Different";
                }

                $results = array
                (
                    "songs" => "[".$firstSongDetails["artist"]. " - ". $firstSongDetails["name"]. "] vs [".$secondSongDetails["artist"]." - ". $secondSongDetails["name"]."]",
                    "artist_similarity" => $similarArtist,
                    "song_similarity" => $similarSong,
                    "tags_similarity" => $this->compareArrays($this->convertToArray($firstTags,","),$this->convertToArray($secondTags,",")),
                    "comment_similarity" => $this->compareArrays($this->convertToArray($firstComments,"+"),$this->convertToArray($secondComments,"+")),
                    "genre_similarity" => $similarGenre,
                    "length_similarity" => $similarLength,
                    "found_tags" => $firstTags.",".$secondTags
                );


                echo json_encode(array("result" => $results));



            }
            else
            {
                echo json_encode(array("result" => false,"error" => "Could not find any data."));
            }


        }
        else
        {
            echo json_encode(array("result" => false,"error" => "Missing some parameters.","posted_fields" => $this->is_request("POST")));
         
        }

    }

    /**
     * @return |null
     */

    public function getAllSongsAction() // get every song with the implemented methods
    {
            $songs = new \MusicEngine\CoreSystem\Models\AudioAPI();

            $result = $songs->getAllSongs();

            if($result)
            {
                echo json_encode(array("results" => $result));
            }
            else
            {
                echo json_encode(array("results" => null));
            }
    }
}