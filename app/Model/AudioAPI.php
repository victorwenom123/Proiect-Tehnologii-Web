<?php

namespace MusicEngine\CoreSystem\Models;

use MusicEngine\CoreSystem\Model;

class AudioAPI extends Model
{
    /**
     * @return |null
     */

    public function getAllSongs()
    {
        $con = $this->connect();

        $get = mysqli_query($con, "SELECT * FROM songs ORDER BY created_at DESC");

        if(mysqli_num_rows($get) > 0)
        {
            while($a = mysqli_fetch_assoc($get))
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
}