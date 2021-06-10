<?php
  header("Content-Type:application/json");
  require 'data.php';
        $requestUri= $_SERVER["REQUEST_URI"];
        $requestMethod= $_SERVER["REQUEST_METHOD"];
      
   $response = [
        "uri" => $requestUri,
        "method" => $requestMethod

    ];
if($requestMethod=="POST"){
    $payloadStr= file_get_contents("php://input");
    if($payloadStr){
        //am primit datele
        //le procesam si trimitem inapoi rezultatul
        $arr = explode("|", $payloadStr);
        $title1 = $arr[0];
        $author1 = $arr[1];
        $length1 = $arr[2];
        $tags1 = $arr[3];
        $genre1 = $arr[4];
        $comments1 =$arr[5];

        $title2 = $arr[6];
        $author2 = $arr[7];
        $length2 = $arr[8];
        $tags2 = $arr[9];
        $genre2 = $arr[10];
        $comments2 = $arr[11];
        
        $data = get_data($title1,$length1,$author1,$comments1,$tags1,$genre1,$title2,$length2,$author2,$comments2,$tags2,$genre2);
        
        if(empty($data))
        {
            $response["status_message"]="Product Not Found";
	        $response["data"]="empty";
            http_response_code(404);
	        $json_response = json_encode($response);
	        echo $json_response;
        }
        else
        {

            $response["status_message"]="Product Found";
	        $response["data"]=$data;
            http_response_code(200);
	        $json_response = json_encode($response);
	        echo $json_response; 
        }
        
    }
    else{
        
        $response["status_message"]="Payload is empty";
	        $response["data"]="empty";
            http_response_code(402);
	        $json_response = json_encode($response);
	        echo $json_response; 
    } 
}

if($requestMethod=="GET"){
        $data = "select all the songs from db";

        if(empty($data))
        {
            $response["status_message"]="Product Not Found";
	        $response["data"]="empty";
            http_response_code(404);
	        $json_response = json_encode($response);
	        echo $json_response;
        }
        else
        {
            $response["status_message"]="Product Found";
	        $response["data"]="the response contains songs with name, length, author";
            http_response_code(200);
	        $json_response = json_encode($response);
	        echo $json_response; 
        }
        
    
}
    


  
    
?>