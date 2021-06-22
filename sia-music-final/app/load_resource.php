<?php

if(isset($_GET["type"]) && isset($_GET["file"]))
{

    $type = $_GET["type"];

    $file = $_GET["file"];

    if($type == "css")
    {
        if(file_exists("../resources/css/".$file))
        {
            header("Content-type: text/css;charset=UTF-8");
            echo file_get_contents("../resources/css/".$file);
        }
        else
        {
            echo "CSS Resource not found!";
        }
    }
    elseif($type == "js")
    {
        if(file_exists("../resources/js/".$file))
        {
            header("Content-type: text/javascript;charset=UTF-8");
            echo file_get_contents("../resources/js/".$file);
        }
        else
        {
            echo "JS Resource not found!";
        }
    }
    elseif($type == "rss")
    {
        if(file_exists("../resources/rss/".$file))
        {
            header("Content-type: application/rss+xml");
            echo file_get_contents("../resources/rss/".$file);
        }
        else
        {
            echo "RSS Resource Not Found!";
        }
    }
    elseif($type == "image")
    {
        $fileLocation = __DIR__."/../resources/images/".$file;
        $fileExt  = pathinfo($fileLocation, PATHINFO_EXTENSION);
        if(file_exists($fileLocation))
        {
            switch ($fileExt){
                case "jpg":
                    header("Content-type: image/jpg");
                    break;
                case "jpeg":
                    header("Content-type: image/jpeg");
                    break;
                case "png":
                    header("Content-type: image/png");
                    break;
                case "gif":
                    header("Content-type: image/gif");
                    break;
            }

            echo file_get_contents($fileLocation);
        }
        else
        {
            echo "Image Resource Not Found!";
        }
    }
    else
    {

    }

}
else
{
    echo "You have failed to provide specific params!";
}