<?php
session_start();
require "../core/class.loader.php";
$core = new \MusicEngine\Midleware\Core();
if(isset($_GET["file"]) && !empty($_GET["file"]))
{
    $file = $core->clean($_GET["file"]);
    if(file_exists("../resources/ajax-callbacks/".$file.".php"))
    {

        include("../resources/ajax-callbacks/".$file.".php");
    }
}