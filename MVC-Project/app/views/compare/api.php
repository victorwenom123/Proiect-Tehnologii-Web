<?php
session_start();
header("Content-Type:application/json");
require "data.php";

$info = $_SESSION['info'];

$title1 = $info[0];
$author1 = $info[1];
$length1 = $info[2];
$tags1 = $info[3];
$genre1 = $info[4];
$comments1 =$info[5];

$title2 = $info[6];
$author2 = $info[7];
$length2 = $info[8];
$tags2 = $info[9];
$genre2 = $info[10];
$comments2 = $info[11];

// echo "array content: " . $info[0] . " " . $info[1];


	echo "in if";
	// $name1=$_GET['title1'];
    // $coms1=$_GET['comments1'];
    // $length1=$_GET['length1'];
    // $tags=$_GET['tags1'];
    // $author1=$_GET['author1'];
    // $genre1=$_GET['genre1'];
    // $name2=$_GET['title2'];
    // $coms2=$_GET['comments2'];
    // $length2=$_GET['length2'];
    // $tag2=$_GET['tags2'];
    // $author1=$_GET['author2'];
    // $genre2=$_GET['genre2'];
	$data = get_data($title1,$length1,$author1,$comments1,$tags1,$title1,$genre1,$title2,$length2,$author2,$comments2,$tags2,$title2,$genre2);
	
	if($data==[])
	{
		response(200,"Product Not Found",NULL);
	}
	else
	{
		response(200,"Product Found",$data); 
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