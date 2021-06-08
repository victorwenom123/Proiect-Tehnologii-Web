<?php
session_start();
header("Content-Type:application/json");
require "data.php";

$info = $_SESSION['info'];

// echo "array content: " . $info[0] . " " . $info[1];

 if(isset($_GET['comments1']) )
{	
	echo "in if";
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
	echo "nu sunt toate";
	// response(400,"Invalid Request",NULL); 
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