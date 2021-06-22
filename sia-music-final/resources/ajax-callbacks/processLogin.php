<?php
$auth = new \MusicEngine\Midleware\AuthenticateUtils();
$session = $auth->return_session();
if($session["status"] == "true")
{
   echo "Already Logged in. Cannot login if you're logged in!";
}
else
{
    if($core->hasRequest("POST","username") && $core->hasRequest("POST","password")) // post user and password
    {
        $username = $core->getRequest("POST","username");
        $password  = $core->getRequest("POST","password");

        $login = $auth->login($username,$password);

        if($login["status"])
        {
            echo true;
        }
        else
        {
           echo  $login["error"];
        }
    }
    else
    {
        echo "You did not fill in all the requirde fields!";
    }
}