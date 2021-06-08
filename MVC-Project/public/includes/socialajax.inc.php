<?php

require_once 'dbSongs.inc.php';
$sql = "SELECT * FROM songs";
$result = mysqli_query($conn1,$sql);
$resultCheck = mysqli_num_rows($result);
if($resultCheck > 0){
    while ($row = mysqli_fetch_assoc($result)){
        $songs[] = $row['name'];
    }
}


//Get Query String
$q = $_REQUEST['q'];

$suggestion = "";

if($q !== ""){
    $q = strtolower($q);
    $len = strlen($q);
    foreach($songs as $song){
        if(stristr($q, substr($song,0,$len))){
            if($suggestion === ""){
                $suggestion = $song;
            }else{
                $suggestion .= ", $song";
            }
        }
    }
}

echo $suggestion === "" ? "No Suggestion" : $suggestion;