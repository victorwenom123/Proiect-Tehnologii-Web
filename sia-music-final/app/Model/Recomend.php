<?php
namespace MusicEngine\CoreSystem\Models;
use Bhaktaraz\RSSGenerator\Channel;
use Bhaktaraz\RSSGenerator\Feed;
use Bhaktaraz\RSSGenerator\Item;
use MusicEngine\CoreSystem\Config;
use MusicEngine\CoreSystem\Model;
use PHPMicroTemplate\Render;

class Recomend extends Model
{  
    protected $songGenre;
    protected $songTags;
    protected $songMood;
    protected $songAge;
    protected $songReleaseDate;
    protected $songEducationLevel;
    protected $songHabitat;
    protected $songGoodForGroups;
    protected $songLocationRefferences;

    /**
     * Recomend constructor.
     * @param string $songTags
     * @param string $songGenre
     * @param string|string $songMood
     * @param string|string $songAge
     * @param string|string $songReleaseDate
     * @param string|string $songEducationLevel
     * @param string|string $songHabitat
     * @param string|string $songGoodForGroups
     * @param string|string $songLocationRefferences
     */
    public function __construct(string $songTags, string $songGenre, string $songMood = null, string $songAge = null, string $songReleaseDate = null,
                                string $songEducationLevel = null, string $songHabitat = null, string $songGoodForGroups = null,
                                string $songLocationRefferences = null)
    {
        $this->songTags = $songTags;
        $this->songGenre = $songGenre;
        $this->songMood = $songMood;
        $this->songAge = $songAge;
        $this->songEducationLevel = $songEducationLevel;
        $this->songReleaseDate = $songReleaseDate;
        $this->songHabitat = $songHabitat;
        $this->songGoodForGroups = $songGoodForGroups;
        $this->songLocationRefferences = $songLocationRefferences;
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
            $tags = array_filter($tags);//remove empty or eqivalent tags
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
     * @return data
     */

    private function getSongs()
    {

        $con = $this->connect();;

        $criterias  = array
        (
            "genre" => $this->songGenre,
            "mood" => $this->songMood,
            "age_rating"=> $this->songAge,
            "release_date" => $this->songReleaseDate,
            "education_level" => $this->songEducationLevel,
            "habitat" => $this->songHabitat,
            "good_for_groups" => $this->songGoodForGroups,
        );

        $criterias = array_filter($criterias);

        foreach($criterias as $column=>$value)
        {
            $crit[] = ' '.$column.' LIKE "%'.addslashes($value).'%" ';
        }

        $crit = implode(" AND ", $crit);

        $query = 'SELECT * FROM songs WHERE '.$crit.' ORDER BY created_at DESC';
        //echo $query;
        $run = mysqli_query($con,$query);

            if(mysqli_num_rows($run))
            {
                while($a = mysqli_fetch_assoc($run))
                {
                    $data[] = $a;
                }

                return $data;
            }
            else
            {
                return null;
            }
    }

    /**
     * @return array|false
     */

    public function filterResults()
    {

        $tags = $this->analyzeTags($this->songTags);


        $results = $this->getSongs();

        if($results)
        {
            if($tags)$tags = explode(",",$tags);
            foreach($tags as $tag)
            {
                foreach($results as $key=>$value)
                {   //the tags for each song are taken separately
                    $resultTags = $results[$key]["tags"];
                    $resultTags = explode(",",$resultTags);

                    foreach($resultTags as $resultTag)
                    {/*if the current tags are among the tags of a song the key of the song is saved in an array*/ 
                        if($tag == $resultTag)
                        {
                            $arrayKey[] = array("resultKey" => "$key");
                        }
                        else
                        {
                            $arrayKey[] = null;
                        }

                    }
                }
            }
            /*we check if we find songs with the respective tags*/
            if(count($arrayKey))
            {
                $arrayKey = array_filter($arrayKey);
            }
            else
            {
                $arrayKey = null;
            }

            if($arrayKey)
            {
                foreach($arrayKey as $d)
                {
                    $resultKeys[] = $d["resultKey"];
                }

                $resultKeys = array_values(array_unique($resultKeys));

                foreach($results as $key=>$value)
                {
                    foreach($resultKeys as $getKey)
                    {
                        if($key == $getKey)
                        {
                            $returnData[] = $results[$key];
                        }
                        else
                        {
                            $returnData[] = null;
                        }
                    }
                }

                return array_filter($returnData);

            }
            else
            {
                return false;
            }

        }
        else
        {
            return false;
        }


    }

    /**
     * @param array $array
     */

    public function generateRssFile(array $array)
    {

        $feed = new Feed();
        $channel = new Channel();
        $channel
            ->title("Music")
            ->description("Music Recomendations")
            ->url(Config::APP_URL)
            ->appendTo($feed);

        foreach($array as $a)
        {
            $item = new Item();
            $item
                ->title($a["artist"]." - ".$a["name"]. " ".ucfirst($a["genre"]))
                ->description("Length: ".$a["length"]." Mood:". ucfirst($a["mood"]) ." Release Date:". $a["release_date"])
                ->url(Config::APP_URL)
                ->appendTo($channel);
        }

        $saveRss = fopen(__DIR__."/../../resources/rss/".time()."_recomendation.rss","w");
        fwrite($saveRss,$feed);
        fclose($saveRss);
        return array("rss_feed" =>  Config::APP_URL."/load_resource.php?file=".time()."_recomendation.rss&type=rss", "items" => $array);
    }

    /**
     * @param string $fileUrl
     * @param int $user_id
     * @return false|void
     */

    public function postRssToFeed(array $data,int $user_id)
    {
        $fileUrl = $data["rss_feed"];

            if($data["items"])
            {
                foreach($data["items"] as $item)
                {
                    $songs[] = $item["artist"]." - " .$item["name"] . " - ".ucfirst($item["genre"]);
                }

                $songs = implode(" | ",$songs);

                $con = $this->connect();

                $insert = mysqli_query($con, "INSERT into social_wall VALUES (DEFAULT,'$user_id','#saudio ".addslashes($songs)." <br/> ".addslashes($fileUrl)."','".date("Y-m-d H:i:s")."')");
                if(!$insert)
                {
                    return false;
                }
                else
                {
                    return;
                }
            }
            else
            {
                return false;
            }

    }

}