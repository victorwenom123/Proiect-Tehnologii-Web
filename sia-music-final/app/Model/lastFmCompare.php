<?php

namespace MusicEngine\CoreSystem\Models;

use MusicEngine\CoreSystem\Config;
use MusicEngine\CoreSystem\Model;
use LastFmApi\Api\AuthApi;
use LastFmApi\Api\TrackApi;

class lastFmCompare extends Model
{
    /**
     * @var string|null
     */
   private $firstSong;
   private $firstArtist;
   private $secondSong;
   private $secondArtist;

    /**
     * lastFmCompare constructor.
     * @param string $firstSong
     * @param string $firstArtist
     * @param string $secondSong
     * @param string $secondArtist
     * @throws \LastFmApi\Exception\InvalidArgumentException
     */

    public function __construct(string $firstSong, string $firstArtist, string $secondSong,string $secondArtist)
    {
        $this->firstArtist = $this->friendlySongAuthorTitle($firstArtist);
        $this->firstSong = $this->friendlySongAuthorTitle($firstSong);

        $this->secondArtist = $this->friendlySongAuthorTitle($secondArtist);
        $this->secondSong = $this->friendlySongAuthorTitle($secondSong);

        $auth = new AuthApi('setsession', array('apiKey' => Config::LAST_FM_API));
        $this->trackApi = new TrackApi($auth);
    }

    /**
     * @param string $songTitle
     * @return string|null
     */
    private function friendlySongAuthorTitle(string $songTitle)
    {
        $songTitle = explode(" ",$songTitle);
        if(count($songTitle))
        {
            $songTitle = array_filter($songTitle);
            foreach($songTitle as $title)
            {
                $titles[] = ucfirst($title);
            }

            return implode(" ", $titles);
        }
        else
        {
            return null;
        }

    }

    /**
     * return @array
     */
    private function titleToArray(string $string)
    {
        if($string)
        {
            $strings = explode(" ",$string);

            return $strings;
        }
        else
        {
            return null;
        }
    }

    /**
     * @return array
     */
    private function querySongTags(string $song, string $artist)
    {
        $songInfo = $this->trackApi->getInfo(array("artist" => $artist, "track"  => $song));

        if($songInfo)
        {
            if(isset($songInfo["toptags"]))
            {
                foreach($songInfo["toptags"] as $tag)
                {
                    $tags[] = $tag["name"];
                }
            }
            else
            {
                $tags[] = null;
            }

            return array_filter(array_unique($tags));
        }
        else
        {
            return null;
        }
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
     * @return array|null
     */

    public function initLastFmCompare()
    {
        $first = $this->querySongTags($this->firstSong,$this->firstArtist);
        $second = $this->querySongTags($this->secondSong,$this->secondArtist);

        if($first && $second)
        {
           return array
           (
               "songs" => $this->firstArtist." - " . $this->firstSong. " vs ". $this->secondArtist. " - ". $this->secondSong,
               "tags_similarity" => $this->compareArrays($first,$second),
               "song_similarity" => $this->compareArrays($this->titleToArray($this->firstSong), $this->titleToArray($this->secondSong)),
               "artist_similarity" => $this->compareArrays($this->titleToArray($this->firstArtist), $this->titleToArray($this->secondArtist)),
               "found_tags" => implode(",",array_unique(array_merge($first,$second))),
           );
        }
        else
        {
            return null;
        }
    }




}