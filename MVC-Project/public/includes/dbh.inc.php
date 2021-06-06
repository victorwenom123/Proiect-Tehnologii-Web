<?php

$serverName = "localhost:3000";
$dBUsername = "root";
$dBPassword = "";
$dBName = "LoginSystem";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if(!$conn){
    die("Connection failed:  " . mysqli_connect_error());
}