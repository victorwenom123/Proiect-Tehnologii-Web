<?php

if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputSignup($name, $email, $pwd,$pwdRepeat) !== false){
        header("location: ../login/login.php?error=emptyinput");
        exit();
    }
    if(invalidUid($name) !== false){
        header("location: ../login/login.php?error=invalidusername");
        exit();
    }
    if(invalidEmail($email) !== false){
        header("location: ../login/login.php?error=invalidemail");
        exit();
    }
    if(pwdMatch($pwd, $pwdRepeat) !== false){
        header("location: ../login/login.php?error=paswworddontmatch");
        exit();
    }
    if(uidExists($conn,$name,$email) !== false){
        header("location: ../login/login.php?error=usernametaken");
        exit();
    }

    createUser($conn,$name,$email,$pwd);
}
else {
    header("location: ../login/login.php");
    exit();
}