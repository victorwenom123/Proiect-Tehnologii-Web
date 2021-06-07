<?php

$serverName1 = "localhost";
$dBUsername1 = "root";
$dBPassword1 = "";
$dBName1 = "musicweb";

$conn1 = mysqli_connect($serverName1, $dBUsername1, $dBPassword1, $dBName1);

if(!$conn1){
    die("Connection failed:  " . mysqli_connect_error());
}