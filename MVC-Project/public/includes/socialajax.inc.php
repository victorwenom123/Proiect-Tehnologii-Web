<?php

$songs[] = "We are the champions";
$songs[] = "Back in black";
$songs[] = "Thundestruck";
$songs[] = "Rap God";
$songs[] = "Unravel";
$songs[] = "Gods Plan";
$songs[] = "Blah Blah Blah";
$songs[] = "Old Town Road";
$songs[] = "I See Fire";
$songs[] = "Billie Jean";
$songs[] = "Make it Rain";
$songs[] = "All Time Low";
$songs[] = "Better Came Along";
$songs[] = "Godzilla";
$songs[] = "Way down we go";


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