<?php





function get_data($title1,$length1,$author1,$coms1,$tags1,$name1,$genre1,$title2,$length2,$author2,$coms2,$tags2,$name2,$genre2)
{
  $serverName = "localhost";
  $dBUsername = "root";
  $dBPassword = ""; 
  $dBName = "audiodb";
  $conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);
	/*$products = [
		"book"=>20,
		"pen"=>10,
		"pencil"=>5
	];
	
	foreach($products as $product=>$price)
	{
		if($product==$name)
		{
			return $price;
			break;
		}
	}*/
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
      
      // in locul acestor date de tip exemplu, vom avea datele din formular in alta pagina
     /* $title1="a";
      $description1="b";
      $length1="c";
      $author1="a";
      $coms1="This is#example#string";
      $savedcoms1=$coms;
      $tags1="#tag1;#tag2;#tag3";
      $savedtags1=$tags1;*/
      //$name1="a";
    //  $genre1="a";
      
    /*  $title2="a";
      $description2="b";
      $length2="c";
      $author2="a";
      $coms2="This is#example#string";
      $savedcoms2=$coms2;
      $tags2="#tag1#;tag2;#tag3";
      $savedtags2=$tags2;
      $name2="a";
      $genre2="a";*/
      $savedcoms1=$coms1;
      $savedcoms2=$coms2;
      
      $firstArray=array();
      $secondArray=array();
      $endArray=array();

      $sql = "SELECT * from songs";
      $result = mysqli_query($conn, $sql);
      $numberofelements=mysqli_num_rows($result);
      for ($i=0;$i<mysqli_num_rows($result);$i++)
      {array_push($firstArray,1);
        array_push($secondArray,1);}
      //$sql12 = "SELECT *, commentlinking.idComment as comid, commentlinking.commentName as comname FROM songs inner join commentlinking on commentlinking.id=songs.id";
      //$result12 = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $index1=0;
        while($row = mysqli_fetch_assoc($result)) {
         // $sql = "SELECT * from songs";
         // $result = mysqli_query($conn, $sql);
         /* if (strcmp($row["description"],$description1)!=0 && $firstArray[$index1]!=-1)
             $firstArray[$index1]=-1;
          if (strcmp($row["description"],$description2)!=0 && $secondArray[$index1]!=-1)
             $secondArray[$index1]=-1;*/
          if (strcmp($row["length"],$length1)!=0 && $firstArray[$index1]!=-1)
             $firstArray[$index1]=-1;
          if (strcmp($row["length"],$length2)!=0 && $secondArray[$index1]!=-1)
             $secondArray[$index1]=-1;
          if (strcmp($row["author"],$author1)!=0 && $firstArray[$index1]!=-1)
             $firstArray[$index1]=-1;
          if (strcmp($row["author"],$author2)!=0 && $secondArray[$index1]!=-1)
             $secondArray[$index1]=-1;
             if (strcmp($row["name"],$name1)!=0 && $firstArray[$index1]!=-1)
             $firstArray[$index1]=-1;
          if (strcmp($row["name"],$name2)!=0 && $secondArray[$index1]!=-1)
             $secondArray[$index1]=-1;
             if (strcmp($row["genre"],$genre1)!=0 && $firstArray[$index1]!=-1)
             $firstArray[$index1]=-1;
          if (strcmp($row["genre"],$genre2)!=0 && $secondArray[$index1]!=-1)
             $secondArray[$index1]=-1;
            $index1++;
        }
      } else {
        echo "0 results";
      }
      
      
      
      
      $sql = "SELECT songs.id as songid, songs.name as songname, commentlinking.idComment as comid, commentlinking.commentName as comname FROM songs inner join commentlinking on commentlinking.idSong=songs.id";
      $result = mysqli_query($conn, $sql);
      //$sql12 = "SELECT *, commentlinking.idComment as comid, commentlinking.commentName as comname FROM songs inner join commentlinking on commentlinking.id=songs.id";
      //$result12 = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $coms1=$savedcoms1;
       // $index1=0;
        while($row = mysqli_fetch_assoc($result)) {
          
          $tokcoms1 = strtok($coms1, "+");
          $ok=0;
          while ($tokcoms1 !== false) {
            
           
            if (strcmp($row["comname"],$tokcoms1)==0)
                   $ok=1;  // gaseste comentariu
          
            $tokcoms1 = strtok("+");
          }
          if ($ok==0 && $firstArray[$row["songid"]]!=-1)
           $firstArray[$row["songid"]]=-1;
          $ok=0;
          $coms2=$savedcoms2;
          $tokcoms2 = strtok($coms2, "+");
          while ($tokcoms2 !== false) {
            
           
            if (strcmp($row["comname"],$tokcoms2)==0) // gaseste comentariu
                   $ok=1;
          
            $tokcoms2 = strtok("+");
          }
          if ($ok==0 && $secondArray[$row["songid"]]!=-1)
           $secondArray[$row["songid"]]=-1;
          
         
         //   $index1++;
        }
      } else {
        echo "0 results";
      }
      
      
      $sql = "SELECT songs.id as songid, songs.name as songname, taglinking.idTag as tagid, taglinking.tagName as tagname FROM songs inner join taglinking on taglinking.idSong=songs.id";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $tags1=$savedtags1;
        $index1=0;
        while($row = mysqli_fetch_assoc($result)) {
          
          $toktags1 = strtok($tags1, ",");
          $ok=0;
          while ($toktags1 !== false) {
            
           
            if (strcmp($row["tagname"],$toktags1)==0)
                   $ok=1;
          
            $toktags1 = strtok(",");
          }
          if ($ok==10 && $firstArray[$row["songid"]]!=-1)
           $firstArray[$row["songid"]]=-1;
          $ok=0;
          $tags2=$savedtags2;
          $toktags2 = strtok($coms2, ",");
          while ($toktags2 !== false) {
            
           
            if (strcmp($row["tagname"],$toktags2)==0)
                   $ok=1;
          
            $toktags2 = strtok(",");
          }
          if ($ok==0 && $secondArray[$row["songid"]]!=-1)
           $secondArray[$row["songid"]]=-1;
          
         
           // $index1++;
        }
      } else {
        echo "0 results";
      }
      
      for ($i=0;$i<$numberofelements-1;$i++)
      for ($j=0;$j<$numberofelements;$j++)
         {$comm[$i][$j]=0;
         $tag[$i][$j]=0;
         $finalMatrix[$i][$j]=0;
         //$description[$i][$j]=0;
         $length[$i][$j]=0;
         $author[$i][$j]=0;
         $genre[$i][$j]=0;
         $title[$i][$j]=0;}
     // $finalArray=array();
     // for ($i=0;$i<$numberofelements-1;$i++)
      //{ okcom1=1;
      //  oktag1=1;
      
        $sql1="SELECT * FROM songs JOIN commentlinking ON commentlinking.idsong=song.id JOIN taglinking ON commentlinking.idsong=taglinking.idsong";
        $result1 = mysqli_query($conn, $sql1);
        while($row1 = mysqli_fetch_assoc($result1)) {
            $sql2="SELECT * FROM SONGS JOIN COMMENTLINKING ON COMMENTLINKING.IDSONG=SONG.ID JOIN TAGLINKING ON COMMENTLINKING.IDSONG=TAGLINKING.IDSONG";
            $result2 = mysqli_query($conn, $sql1);
            while($row2 = mysqli_fetch_assoc($result2))
            {/*if (strcmp($row1["description"],$row2["description"])==0 && $firstArray[$row1["id"]]!=-1 && secondArray[$row2["id"]]!=-1 && $row1["id"]!=$row2["id"])
                $description[$row1["id"]][$row2["id"]]=1;*/
            if (strcmp($row1["commentName"],$row2["commentName"])==0 && $firstArray[$row1["id"]]!=-1 && secondArray[$row2["id"]]!=-1 && $row1["id"]!=$row2["id"])
                $comm[$row1["id"]][$row2["id"]]=1;
            if (strcmp($row1["tagName"],$row2["tagName"])==0 && $firstArray[$row1["id"]]!=-1 && secondArray[$row2["id"]]!=-1 && $row1["id"]!=$row2["id"])
                $tag[$row1["id"]][$row2["id"]]=1;
            if (strcmp($row1["length"],$row2["length"])==0 && $firstArray[$row1["id"]]!=-1 && secondArray[$row2["id"]]!=-1 && $row1["id"]!=$row2["id"])
                $length[$row1["length"]][$row2["length"]]=1;
            if (strcmp($row1["author"],$row2["author"])==0 && $firstArray[$row1["id"]]!=-1 && secondArray[$row2["id"]]!=-1 && $row1["id"]!=$row2["id"])
                $author[$row1["author"]][$row2["author"]]=1;
            if (strcmp($row1["genre"],$row2["genre"])==0 && $firstArray[$row1["id"]]!=-1 && secondArray[$row2["id"]]!=-1 && $row1["id"]!=$row2["id"])
             $genre[$row1["genre"]][$row2["genre"]]=1;
            if (strcmp($row1["title"],$row2["title"])==0 && $firstArray[$row1["id"]]!=-1 && secondArray[$row2["id"]]!=-1 && $row1["id"]!=$row2["id"])
                $title[$row1["title"]][$row2["title"]]=1;

            }
        }
        for ( $i=0;$i<$numberofelements;$i++)
        for ( $j=0;$j<$numberofelements;$j++)
           if ($firstArray[$i][$j]!=-1 && $secondArray[$i][$j]!=-1 && $i!=$j)
                $finalMatrix[$i][$j]=($comm[$i][$j]+$tag[$i][$j]+$length[$i][$j]+$author[$i][$j]+$genre[$i][$j]+$title[$i][$j])/6;
        $sql1="SELECT * FROM SONGS";
        $index1=0;
        $result1 = mysqli_query($conn, $sql1);
                while($row1 = mysqli_fetch_assoc($result1)) {$index2=0;
                    $sql2="SELECT * FROM SONGS";
                    $result2 = mysqli_query($conn, $sql1);
                    while($row2 = mysqli_fetch_assoc($result2))  
                    {if ($index1!=$index2 && $finalMatrix[$index1][$index2]>0)
                        {$c=$finalMatrix[$i][$j]+65;
                        $a=$row1["name"];
                        $a.=" compatible with";
                        $a.=$row2["name"];
                        $a.="with a percentage of ";
                        $concat=$a.$c;
                        array_push($endArray,$concat);}
                        $index2++;
                    }
                $index1++;}
                // $myJSON=json_encode($endArray);
                // return $myJSON; // eventual are alt format
                return $endArray;
  

       // for ($j=0;$j<$numberofelements;$j++)
      /*  {if ($firstArray[$i]!=-1 && $secondArray[$j]!=-1 && $i!=$j)
            {
        $sql2="SELECT * FROM SONGS JOIN COMMENTLINKING ON COMMENTLINKING.IDSONG=SONG.ID JOIN TAGLINKING ON COMMENTLINKING.IDSONG=TAGLINKING.IDSONG";
        $result2 = mysqli_query($conn, $sql2);

        if ($com[$i][$j]==0 && $strcmp($result.,$j)==0)
          $finalMatrix[$i][$j]++;

        $finalArray[$i]=1;}
            else
            $finalArray[$i]=-1;
          }
      //  }
          $sql = "SELECT * from songs";
          $result = mysqli_query($conn, $sql);
          $finalIndex=0;
       while($row = mysqli_fetch_assoc($result)) {
         if ($finalArray[$finalIndex]==1)
         echo "SongId: " . $row["id"]. "; SongName: " . $row["name"] . "<br>";
         $finalIndex++;*/
      
       //}
      
      
      mysqli_close($conn);

    
}
?>