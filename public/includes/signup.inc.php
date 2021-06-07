<?php

if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputSignup($name, $email, $pwd,$pwdRepeat) !== false){
        header("location: /MVC-Project/public/login?error=emptyinput");
        exit();
    }
    if(invalidUid($name) !== false){
        header("location: /MVC-Project/public/login?error=invalidusername");
        exit();
    }
    if(pwdMatch($pwd, $pwdRepeat) !== false){
        header("location: /MVC-Project/public/login?error=paswworddontmatch");
        exit();
    }
    if(uidExists($conn,$name,$email) !== false){
        header("location: /MVC-Project/public/login?error=usernametaken");
        exit();
    }

    createUser($conn,$name,$email,$pwd);
}
else {
    header("location: /MVC-Project/public/login");
    exit();
}