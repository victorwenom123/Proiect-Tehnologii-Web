<?php
namespace MusicEngine\CoreSystem\Models;
use MusicEngine\CoreSystem\Model;

class CompareSong extends Model
{
    protected $songTitle;
    protected $songArtist;

    /**
     * Compare constructor.
     * @param string $songTitle
     * @param string $songArtist
     * */

    public function __construct(string $songTitle, string $songArtist)
    {
        $this->songTitle = $songTitle;
        $this->songArtist = $songArtist;
    }

        /**
         * @param string $songTitle
         * @return string|null
         */
        protected function friendlySongAuthorTitle(string $songTitle)
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

        public function findSongByCriteria()
        {
            $con = $this->connect();

            $songTitle = mysqli_real_escape_string($con,$this->friendlySongAuthorTitle($this->songTitle));
            $songArtist = mysqli_real_escape_string($con,$this->friendlySongAuthorTitle($this->songArtist));

            $selectQuery = "
            SELECT * 
            FROM 
            songs 
            WHERE `name` LIKE  '%".addslashes($songTitle)."%' AND  `artist` LIKE '%".addslashes($songArtist)."%' 
            ORDER BY created_at DESC";

            $find = mysqli_query($con, $selectQuery);

            if(mysqli_num_rows($find))
            {
                return mysqli_fetch_assoc($find);
            }
            else
            {

                return false;
            }

        }

}