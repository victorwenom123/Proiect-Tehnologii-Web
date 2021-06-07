<?php
header("Content-Type:application/json");
require "data.php";

if(!empty($_GET['comments1']) && !empty($_GET['length1']) && !empty($_GET['tags1']) && !empty($_GET['author1']) && !empty($_GET['genre1']) && !empty($_GET['title1']) && !empty($_GET['comments2']) && !empty($_GET['length2']) && !empty($_GET['tags2']) && !empty($_GET['author2']) && !empty($_GET['genre2']) && !empty($_GET['title2']) )
{
	$name1=$_GET['title1'];
    $coms1=$_GET['comments1'];
    $length1=$_GET['length1'];
    $tags=$_GET['tags1'];
    $author1=$_GET['author1'];
    $genre1=$_GET['genre1'];
    $name2=$_GET['title2'];
    $coms2=$_GET['comments2'];
    $length2=$_GET['length2'];
    $tag2=$_GET['tags2'];
    $author1=$_GET['author2'];
    $genre2=$_GET['genre2'];
	$data = get_data($title1,$length1,$author1,$coms1,$tags1,$name1,$genre1,$title2,$length2,$author2,$coms2,$tags2,$name2,$genre2);
	
	if(empty($data))
	{
		response(200,"Product Not Found",NULL);
	}
	else
	{
		response(200,"Product Found",$data); 
	}
	
}
else
{
	response(400,"Invalid Request",NULL);
}

function response($status,$status_message,$data)
{
	header("HTTP/1.1 ".$status);
	
	$response['status']=$status;
	$response['status_message']=$status_message;
	$response['data']=$data;
	
	$json_response = json_encode($response);
	echo $json_response;
}
?>