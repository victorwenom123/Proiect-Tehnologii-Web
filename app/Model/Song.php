<?php
namespace MusicEngine\CoreSystem\Models;

use MusicEngine\CoreSystem\Model;

class Song extends Model
{
    protected $songTitle;
    protected $songArtist;
    protected $songLength;
    protected $songTags;
    protected $songGenre;
    protected $songComments;
    protected $songMood;
    protected $songAge;
    protected $songReleaseDate;
    protected $songEducationLevel;
    protected $songHabitat;
    protected $songGoodForGroups;
    protected $songLocationRefferences;

    /**
     * Song constructor.
     * @param string $songTitle
     * @param string $songArtist
     * @param string $songLength
     * @param string $songTags
     * @param string $songGenre
     * @param string $songComments
     * @param string $songMood
     * @param string $songAge
     * @param string $songReleaseDate
     * @param string $songEducationLevel
     * @param string $songHabitat
     * @param string $songGoodForGroups
     * @param string $songLocationRefferences
     */

    public function __construct(string $songTitle, string $songArtist, string $songLength, string $songTags, string $songGenre, string $songComments, string $songMood,
    string $songAge, string $songReleaseDate, string $songEducationLevel, string $songHabitat, string $songGoodForGroups, string $songLocationRefferences)
    {
         $this->songTitle = $songTitle;
         $this->songArtist = $songArtist;
         $this->songLength = $songLength;
         $this->songTags = $songTags;
         $this->songGenre = $songGenre;
         $this->songComments = $songComments;
         $this->songMood = $songMood;
         $this->songAge = $songAge;
         $this->songEducationLevel = $songEducationLevel;
         $this->songReleaseDate = $songReleaseDate;
         $this->songHabitat = $songHabitat;
         $this->songGoodForGroups = $songGoodForGroups;
         $this->songLocationRefferences = $songLocationRefferences;
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
                    $titles[] = ucfirst($this->clean($title));
                }

                return implode(" ", $titles);
            }
            else
            {
                return null;
            }

    }

    /**
     * @param string $tags
     * @return |null
     */

    private function analyzeTags(string $tags)
    {
        $tags = str_replace(" ","",$tags);
        $tags = explode(",",$tags);
        if(count($tags))
        {
            $tags = array_filter($tags);
            foreach($tags as $tag)
            {
                $tagss[] = strtolower($tag);
            }
            $tags = implode(",",$tagss);
            return $tags;
        }
        else
        {
            return null;
        }
    }

    /**
     * @param string $comments
     * @return string
     */

    private function analyzeComments(string $comments)
    {
        $comments = str_replace(" ","",$comments);
        $comments = explode("+",$comments);
        if(count($comments))
        {
            $comments = array_filter($comments);
            foreach($comments as $comment)
            {
                $commentss[] = strtolower($comment);
            }
            $comments = implode("+",$commentss);
            return $comments;
        }
        else
        {
            return null;
        }
    }

    /**
     * @param string $currentTags
     * @return string|null
     */

    private function mergeTags(string $currentTags)
    {
        $newTags = $this->songTags;
        $newTags = str_replace(" ","",$newTags);

        if(strlen($currentTags) && strlen($newTags))
        {
            $currentTags = str_replace(" ","",$currentTags);
            $currentTags = explode(",",$currentTags);
            $newTags = explode(",",$newTags);

            $mergeAll = array_merge($currentTags,$newTags);
            $mergeAll = array_unique($mergeAll);
            $mergeAll = array_filter($mergeAll);
            $mergeAll = implode(",",$mergeAll);
            $mergeAll = str_replace(" ","",$mergeAll);
            return $mergeAll;
        }
        else
        {
            return null;
        }
    }

    /**
     * @param string $currentLocations
     * @return string|null
     */

    private function mergeLocations(string $currentLocations)
    {
        $newLocations = $this->songLocationRefferences;
        $newLocations = str_replace(" ","",$newLocations);

        if(strlen($currentLocations) && strlen($newLocations))
        {
            $currentLocations = str_replace(" ","",$currentLocations);
            $currentLocations = explode(",",$currentLocations);
            $newLocations = explode(",", $newLocations);

            $mergeAll = array_merge($currentLocations,$newLocations);
            $mergeAll = array_unique($mergeAll);
            $mergeAll = array_filter($mergeAll);
            $mergeAll = implode(",",$mergeAll);

            return $mergeAll;
        }
        else
        {
            return null;
        }
    }

    /**
     * @param string $currentComments
     * @return string|null
     */

    private function mergeComments(string $currentComments)
    {
        $newComments = $this->analyzeComments($this->songLocationRefferences);
        $newComments = str_replace(" ","",$newComments);
        if(strlen($currentComments) && strlen($newComments))
        {
            $currentComments = str_replace(" ","",$currentComments);
            $currentComments = explode("+",$currentComments);
            $newComments = explode("+",$newComments);

            $mergeAll = array_merge($currentComments,$newComments);
            $mergeAll = array_unique($mergeAll);
            $mergeAll = array_filter($mergeAll);
            $mergeAll = implode("+",$mergeAll);
            return $mergeAll;
        }
        else
        {
            return null;
        }
    }

    /**
     * @return bool|mixed|string
     */

    public function saveSongToDb()
    {
        $con = $this->connect();

        $songTitle = mysqli_real_escape_string($con,$this->friendlySongAuthorTitle($this->songTitle));
        $songArtist = mysqli_real_escape_string($con,$this->friendlySongAuthorTitle($this->songArtist));
        $songLength = mysqli_real_escape_string($con, $this->songLength);
        $songTags = mysqli_real_escape_string($con, $this->analyzeTags($this->songTags));
        $songGenre = mysqli_real_escape_string($con, $this->songGenre);
        $songComments = mysqli_real_escape_string($con, $this->analyzeComments($this->songComments));
        $songMood = mysqli_real_escape_string($con, $this->songMood);
        $songAge = mysqli_real_escape_string($con,$this->songAge);
        $songReleaseDate = mysqli_real_escape_string($con, $this->songReleaseDate);
        $songEducationLevel = mysqli_real_escape_string($con, $this->songEducationLevel);
        $songHabitat = mysqli_real_escape_string($con, $this->songHabitat);
        $songGoodForGroups = mysqli_real_escape_string($con, $this->songGoodForGroups);
        $songLocationRefferences = mysqli_real_escape_string($con, $this->analyzeTags($this->songLocationRefferences));


        $getSong = mysqli_query($con, "SELECT id,tags,comments,location_refferences FROM songs WHERE name = '".addslashes($songTitle)."' AND artist = '".addslashes($songArtist)."'");

        if(mysqli_num_rows($getSong) < 1)
        {
            /**
             * Run a plain insert
             */
            $cols = ["name","artist","length","tags","genre","comments","mood","age_rating","release_date","education_level","habitat","good_for_groups","location_refferences","created_at"];
            $vals = [$songTitle,$songArtist,$songLength,$songTags,$songGenre,$songComments,$songMood,$songAge,$songReleaseDate,$songEducationLevel,$songHabitat,$songGoodForGroups,$songLocationRefferences,date("Y-m-d H:i:s")];

            $insertData = $this->insert_data("songs",$cols,$vals);

                if($insertData["result"])
                {
                    return true;
                }
                else
                {
                    return $insertData["error"];
                }
        }
        else
        {
            /**
             * Run a update of a current song with tags,location tags and comments
             */
                $a = mysqli_fetch_assoc($getSong);

                    $id = $a["id"];
                    $tags = $a["tags"];
                    $comments = $a["comments"];
                    $location_refferences = $a["location_refferences"];

                    $newTags = $this->mergeTags($tags);
                    $newComments = $this->mergeComments($comments);
                    $newLocations = $this->mergeLocations($location_refferences);

                    $cols = ["tags","comments","location_refferences"];
                    $vals = [$newTags,$newComments,$newLocations];

                    $updateSong = $this->update_data("songs",["id" => $id],$cols,$vals);

                    if($updateSong["result"])
                    {
                        return true;
                    }
                    else
                    {
                        return $updateSong["error"];
                    }

        }
    }


}