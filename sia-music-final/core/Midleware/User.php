<?php
namespace MusicEngine\Midleware;

class User extends Core
{
    /**
     * Returns user information based on user ID
     */

    public function return_user(int $user_id)
    {
        $grab_user = mysqli_query($this->connect(), "SELECT * FROM users WHERE id='$user_id' LIMIT 1");
        if (mysqli_num_rows($grab_user) == 1) {
            return mysqli_fetch_assoc($grab_user);
        } else {
            return false;
        }
    }

    /**
     * @param string $password
     * @return string
     */
    
    public function hashPassword(string $password)
    {
        return hash('sha512', $password . 'ENGINERSA1244');
    }
    /**
     * Adds user
     * Creates a basic account with no extra metadata
     * Requires user fields
     * Requires table name
     * !! User fields must match the array
     */

    public function add_user(array $user_fields = null, string $user_table = "users")
    {

        $con = $this->connect();

        if (mysqli_num_rows(mysqli_query($con, "SELECT id FROM $user_table WHERE username = '" . addslashes($user_fields["username"]) . "' OR email = '" . addslashes($user_fields["email"]) . "'")) < 1) {
            $user_cols = array_keys($user_fields);
            $user_vals = array_values($user_fields);



            $do_insert = $this->insert_data($user_table, $user_cols, $user_vals);

            if ($do_insert["result"] == true) {
                return array("status" => true, "user_id" => $do_insert["query_id"]);
            } else {
                return array("status" => false, "error" => $do_insert["error"]);
            }

        } else {
            return array("status" => false, "error" => "Userul exista deja!");
        }
    }


    /**
     * update user info
     */

    public function update_user(int $user_id, string $username, string $email, string $first_name, string $last_name)
    {
        $con = $this->connect();

        if(mysqli_num_rows(mysqli_query($con , "SELECT id FROM users WHERE id = '$user_id' LIMIT 1")) == 1)
        {
            $cols = array(
                "username",
                "email",
                "first_name",
                "last_name"
            );

            $vals = array(
                $username,
                $email,
                $first_name,
                $last_name
            );

            $criteria = array("id" => $user_id);

            $run_update = $this->update_data("users",$criteria,$cols,$vals);

            if($run_update["result"] == "true")
            {
                return true;
            }
            else
            {
                return $run_update["error"].$run_update["sql"];
            }
        }
        else
        {
            return false;
        }
    }

    /**
     * Change user password
     */

    public function change_password(int $user_id, string $password)
    {
        $con = $this->connect();

        if(mysqli_num_rows(mysqli_query($con , "SELECT id FROM users WHERE id = '$user_id' LIMIT 1")) == 1)
        {
            $password = hash('sha512', $password . 'ENGINERSA1244');

            $update = mysqli_query($con , "UPDATE users SET password = '".addslashes($password)."' WHERE id = '$user_id'");
            if($update)
            {
                return true;
            }
            else
            {
                return mysqli_error($con);
            }
        }
        else
        {
            return "User not found!";
        }
    }


}
