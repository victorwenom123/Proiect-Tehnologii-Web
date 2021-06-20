<?php

namespace MusicEngine\CoreSystem\Models;

use MusicEngine\CoreSystem\Model;

class SongList extends Model
{
    public function listDbSongs()
    {
        $con = $this->connect();

        $getSongs = mysqli_query($con, "SELECT * FROM songs ORDER BY created_at DESC");
        if(mysqli_num_rows($getSongs))
        {
            while($songs = mysqli_fetch_assoc($getSongs))
            {
                $data[] = $songs;
            }

            return $data;
        }
        else
        {
            return false;
        }
    }
}