<?php

namespace MusicEngine\CoreSystem\Models;

use MusicEngine\CoreSystem\Model;

class Wall extends Model
{
    /**
     * @param int $user_id
     * @return false
     */
    public function retrieveWallPosts()
    {

        $con = $this->connect();

        $get = mysqli_query($con, "SELECT social_wall.*,users.username FROM social_wall LEFT JOIN users on social_wall.user_id = users.id ORDER BY created_at DESC");

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
            return false;
        }


    }

    /**
     * @param int $user_id
     * @param string $content
     * @return bool|string
     */
    public function createPost(int $user_id, string $content)
    {
        $con = $this->connect();
        $content = mysqli_real_escape_string($con,$content);

        $insert = mysqli_query($con ,"INSERT into social_wall VALUES (DEFAULT, '$user_id','".addslashes($content)."','".date("Y-m-d H:i:s")."')");

        if($insert)
        {
            return true;
        }
        else
        {
            return mysqli_error($con);
        }
    }

    /**
     * @param int $post_id
     * @return bool
     */

    public function removePost(int $post_id)
    {
        $con = $this->connect();
        $remove = mysqli_query($con, "DELETE FROM social_wall WHERE id = '$post_id'");
        if($remove)
        {
            return true;
        }
        else
        {
            return false;
        }
    }



}