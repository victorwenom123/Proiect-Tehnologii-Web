<?php
if(isset($_POST["submit2"])){
    $song=$_POST["comments1"];
    require_once 'dbSongs.inc.php';
    require_once 'functions.inc.php';
    if(emptyInputSearch($song) !== false){
        header("location: /MVC-Project/public/social?error=emptyinput");
        exit();
    }
    searchForSong($conn1,$song);
}
else{
    header("location: /MVC-Project/public/social");
    exit();
}