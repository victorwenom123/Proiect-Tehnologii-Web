<?php
if(isset($_POST["submit1"])){
    $username1 = $_POST["name1"];
    $pwd1 = $_POST["pwd1"];
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    if(emptyInputLogin($username1,$pwd1) !== false){
        header("location: /MVC-Project/public/login?error=emptyinput");
        exit();
    }
    loginUser($conn, $username1, $pwd1);
}
else{
    header("location: /MVC-Project/public/login");
    exit();
}