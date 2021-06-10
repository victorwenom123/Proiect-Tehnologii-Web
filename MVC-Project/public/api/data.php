<?php





function get_data($title1,$length1,$author1,$coms1,$tags1,$genre1,$title2,$length2,$author2,$coms2,$tags2,$genre2)
{
  $serverName = "localhost";
  $dBUsername = "root";
  $dBPassword = ""; 
  $dBName = "audiodb2";
  $conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);
  // echo "ajunge aici";
  //echo $title1;
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
      $savedtags1=$tags1;
      $savedtags2=$tags2;
      $firstArray=array();
      $secondArray=array();
      $endArray=array();

      $sql = "SELECT * from songs";
      $result = mysqli_query($conn, $sql);
      $numberofelements=mysqli_num_rows($result);
      for ($i=0;$i<mysqli_num_rows($result);$i++)
      {array_push($firstArray,1);
        array_push($secondArray,1);
      }
     // echo $numberofelements;
      //$sql12 = "SELECT *, commentlinking.idComment as comid, commentlinking.commentName as comname FROM songs inner join commentlinking on commentlinking.id=songs.id";
      //$result12 = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $index1=0;
        $sql = "SELECT * from songs";
        $result = mysqli_query($conn, $sql);
        $numberofelements=mysqli_num_rows($result);
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
          if (strcmp(strtolower($row["author"]),strtolower($author1))!=0 && $firstArray[$index1]!=-1)
             $firstArray[$index1]=-1;
          if (strcmp(strtolower($row["author"]),strtolower($author2))!=0 && $secondArray[$index1]!=-1)
             $secondArray[$index1]=-1;
          if (strcmp(strtolower($row["name"]),strtolower($title1))!=0 && $firstArray[$index1]!=-1)
             $firstArray[$index1]=-1;
          if (strcmp(strtolower($row["name"]),strtolower($title2))!=0 && $secondArray[$index1]!=-1)
             $secondArray[$index1]=-1;
             if (strcmp(strtolower($row["genre"]),strtolower($genre1))!=0 && $firstArray[$index1]!=-1)
             $firstArray[$index1]=-1;
          if (strcmp(strtolower($row["genre"]),strtolower($genre2))!=0 && $secondArray[$index1]!=-1)
             $secondArray[$index1]=-1;
            $index1++;
        }
      } else {
        // echo "0 results";
      }
      
      
      
      
      $sql = "SELECT songs.id as songid, songs.name as songname, commentlinking.idComment as comid, commentlinking.commentName as comname FROM songs inner join commentlinking on commentlinking.idSong=songs.id";
      $result = mysqli_query($conn, $sql);
      //$sql12 = "SELECT *, commentlinking.idComment as comid, commentlinking.commentName as comname FROM songs inner join commentlinking on commentlinking.id=songs.id";
      //$result12 = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        // output data of each row
       // $coms1=$savedcoms1;
       // $index1=0;
        while($row = mysqli_fetch_assoc($result)) {
          $coms1=$savedcoms1;
          $tokcoms1 = strtok($coms1, "+");
          $ok=0;
          while ($tokcoms1 !== false) {
            
           
            if (strcmp(strtolower($row["comname"]),strtolower($tokcoms1))==0)
                   $ok=1;  // gaseste comentariu
          
            $tokcoms1 = strtok("+");
          }
          if ($ok==0 && $firstArray[$row["songid"]]!=-1)
           $firstArray[$row["songid"]]=-1;
          $ok=0;
          $coms2=$savedcoms2;
          $tokcoms2 = strtok($coms2, "+");
          while ($tokcoms2 !== false) {
            
           
            if (strcmp(strtolower($row["comname"]),strtolower($tokcoms2))==0) // gaseste comentariu
                   $ok=1;
          
            $tokcoms2 = strtok("+");
          }
          if ($ok==0 && $secondArray[$row["songid"]]!=-1)
           $secondArray[$row["songid"]]=-1;
          
         
         //   $index1++;
        }
      } else {
        // echo "0 results";
      }
      
      
      $sql = "SELECT songs.id as songid, songs.name as songname, taglinking.idTag as tagid, taglinking.tagName as tagname FROM songs inner join taglinking on taglinking.idSong=songs.id";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        // output data of each row
      //  $tags1=$savedtags1;
        $index1=0;
        while($row = mysqli_fetch_assoc($result)) {
          $tags1=$savedtags1;
          $toktags1 = strtok($tags1, ",");
          $ok=0;
          while ($toktags1 !== false) {
            
           
            if (strcmp(strtolower($row["tagname"]),strtolower($toktags1))==0)
                   $ok=1;
          
            $toktags1 = strtok(",");
          }
          if ($ok==0 && $firstArray[$row["songid"]]!=-1)
           $firstArray[$row["songid"]]=-1;
          $ok=0;
          $tags2=$savedtags2;
          $toktags2 = strtok($coms2, ",");
          while ($toktags2 !== false) {
            
           
            if (strcmp(strtolower($row["tagname"]),strtolower($toktags2))==0)
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
    //  echo $firstArray[0];
    //  echo $firstArray[1];
    //  echo $secondArray[0];
    //  echo $secondArray[1]; 


      for ($i=0;$i<$numberofelements;$i++)
      for ($j=0;$j<$numberofelements;$j++)
         {$commM[$i][$j]=0;
         $tagM[$i][$j]=0;
         $finalMatrix[$i][$j]=0;
         //$description[$i][$j]=0;
         $lengthM[$i][$j]=0;
         $authorM[$i][$j]=0;
         $genreM[$i][$j]=0;
         $titleM[$i][$j]=0;}
     // $finalArray=array();
     // for ($i=0;$i<$numberofelements-1;$i++)
      //{ okcom1=1;
      //  oktag1=1;
      
        $sql1="SELECT * FROM songs INNER JOIN commentlinking ON commentlinking.idsong=songs.id INNER JOIN taglinking ON commentlinking.idsong=taglinking.idsong";
        $result1 = mysqli_query($conn, $sql1);
        $index1=0;
        // echo "nr of rows";
        // echo mysqli_num_rows($result1);
        //if ($result1)
      // if (mysqli_num_rows($result1) > 0) 
        while($row1 = mysqli_fetch_assoc($result1 )) {$index2=0;
            $sql2="SELECT * FROM SONGS INNER JOIN COMMENTLINKING ON COMMENTLINKING.IDSONG=SONGS.ID INNER JOIN TAGLINKING ON COMMENTLINKING.IDSONG=TAGLINKING.IDSONG";
            $result2 = mysqli_query($conn, $sql2);
            while($row2 = mysqli_fetch_assoc($result2))
            {/*if (strcmp($row1["description"],$row2["description"])==0 && $firstArray[$row1["id"]]!=-1 && secondArray[$row2["id"]]!=-1 && $row1["id"]!=$row2["id"])
                $description[$row1["id"]][$row2["id"]]=1;*/
                // echo $row1["commentName"];
                // echo "nu";
            if (strcmp(strtolower($row1["commentName"]),strtolower($row2["commentName"]))==0 && $firstArray[(int)$row1["id"]]!=-1 && $secondArray[(int)$row2["id"]]!=-1 && strcmp($row1["id"],$row2["id"])!=0)
                $commM[$row1["id"]][$row2["id"]]=1;
            if (strcmp(strtolower($row1["tagName"]),strtolower($row2["tagName"]))==0 && $firstArray[$row1["id"]]!=-1 && $secondArray[$row2["id"]]!=-1 && $row1["id"]!=$row2["id"])
                $tagM[$row1["id"]][$row2["id"]]=1;
            if (strcmp(strtolower($row1["length"]),strtolower($row2["length"]))==0 && $firstArray[$row1["id"]]!=-1 && $secondArray[$row2["id"]]!=-1 && $row1["id"]!=$row2["id"])
                $lengthM[$row1["id"]][$row2["id"]]=1;
            if (strcmp(strtolower($row1["author"]),strtolower($row2["author"]))==0 && $firstArray[$row1["id"]]!=-1 && $secondArray[$row2["id"]]!=-1 && $row1["id"]!=$row2["id"])
                $authorM[$row1["id"]][$row2["id"]]=1;
            if (strcmp(strtolower($row1["genre"]),strtolower($row2["genre"]))==0 && $firstArray[$row1["id"]]!=-1 && $secondArray[$row2["id"]]!=-1 && $row1["id"]!=$row2["id"])
             $genreM[$row1["id"]][$row2["id"]]=1;
            if (strcmp(strtolower($row1["name"]),strtolower($row2["name"]))==0 && $firstArray[$row1["id"]]!=-1 && $secondArray[$row2["id"]]!=-1 && $row1["id"]!=$row2["id"])
                $titleM[$row1["id"]][$row2["id"]]=1;
$index2++;

            }
            $index1++;
        }
        // echo "nu s-a oprit";
        // echo $firstArray[0];
        // echo $firstArray[1];
        // echo $secondArray[0];
        // echo $secondArray[1]; 
        for ( $i=0;$i<$numberofelements;$i++)
        for ( $j=0;$j<$numberofelements;$j++)
           if ($firstArray[$i]!=-1 && $secondArray[$j]!=-1 && $i!=$j)
                {
                // echo "intr-adevar";
                  $finalMatrix[$i][$j]=($commM[$i][$j]+$tagM[$i][$j]+$lengthM[$i][$j]+$authorM[$i][$j]+$genreM[$i][$j]+$titleM[$i][$j])/6;
                // echo $finalMatrix[$i][$j];
              }
        $sql1="SELECT * FROM SONGS";
        $index1=0;
        $result1 = mysqli_query($conn, $sql1);
        $k=0;
        if ($result1)
                while($row1 = mysqli_fetch_assoc($result1)) {$index2=0;
                    $sql2="SELECT * FROM SONGS";
                    $result2 = mysqli_query($conn, $sql1);
                    while($row2 = mysqli_fetch_assoc($result2))  
                    {if ($index1!=$index2 && $finalMatrix[$index1][$index2]>0)
                        {$c=(string)$finalMatrix[$index1][$index2];
                        //  echo $finalMatrix[$index1][$index2];
                        $a=$row1["name"];
                        $a.=" compatible with ";
                        $a.=$row2["name"];
                        $a.=" with a percentage of ";
                        $concat=$a.$c;
                        array_push($endArray,$concat);
                        // echo "da";
                      }
                        $index2++;
                        
                    }
                $index1++;}
                foreach ($endArray as $value)
                  // echo $value;
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