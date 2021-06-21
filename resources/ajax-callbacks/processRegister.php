<?php
if($_POST) {
    $auth = new \MusicEngine\Midleware\AuthenticateUtils();
    $user = new \MusicEngine\Midleware\User();

    $session = $auth->return_session();

    if ($session["status"] == "true") {
        $core->redirect("home");
    } else {
        if ($core->hasRequest("POST", "username") && $core->hasRequest("POST", "email") &&
            $core->hasRequest("POST", "firstName") && $core->hasRequest("POST", "lastName") &&
            $core->hasRequest("POST", "password") && $core->hasRequest("POST", "repeatPassword")) {
            if ($core->getRequest("POST", "password") == $core->getRequest("POST", "repeatPassword") && strlen($core->getRequest("POST", "password")) > 4) {
                $userArray = array
                (
                    "username" => $core->getRequest("POST", "username"),
                    "password" => $user->hashPassword($core->getRequest("POST", "password")),
                    "email" => $core->getRequest("POST", "email"),
                    "first_name" => $core->getRequest("POST", "firstName"),
                    "last_name" => $core->getRequest("POST", "lastName"),
                    "user_rank" => "user",
                    "status" => "1",
                    "created_at" => date("Y-m-d H:i:s")
                );

                $createUser = $user->add_user($userArray, "users");

                if ($createUser["status"]) {
                    $autoLogin = $auth->login($core->getRequest("POST", "username"), $core->getRequest("POST", "password"));
                    if ($autoLogin["status"]) {
                        echo true;
                    }
                } else {
                    echo $createUser["error"];
                }
            } else {
                echo "Password must contain at least 5 characters!";
            }
        } else {
            echo "You have missing mandatory fields!";
        }
    }
}