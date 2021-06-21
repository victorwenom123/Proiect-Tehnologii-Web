<?php

namespace MusicEngine\CoreSystem\Models;

use MusicEngine\CoreSystem\Model;

class UserList extends Model
{
    public function listDbUsers()
    {
        $con = $this->connect();

        $getUsers = mysqli_query($con, "SELECT id,first_name,last_name,email,username,created_at FROM users ORDER BY id asc");
        if(mysqli_num_rows($getUsers))
        {
            while($users = mysqli_fetch_assoc($getUsers))
            {
                $data[] = $users;
            }

            return $data;
        }
        else
        {
            return false;
        }
    }
}