<?php


// Create connection
//$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// in locul acestor date de tip exemplu, vom avea datele din formular in alta pagina
$title1="a";
$description1="b";
$length1="c";
$author1="a";
$coms1="This is#example#string";
$savedcoms1=$coms;
$tags1="#tag1;#tag2;#tag3";
$savedtags1=$tags1;
$name1="a";
$genre1="a";

$title2="a";
$description2="b";
$length2="c";
$author2="a";
$coms2="This is#example#string";
$savedcoms2=$coms2;
$tags2="#tag1#;tag2;#tag3";
$savedtags2=$tags2;
$name2="a";
$genre2="a";

$firstArray=array();
$secondArray=array();


$sql = "SELECT * from songs";
$nrofelements=mysqli_num_rows($result);
$result = mysqli_query($conn, $sql);
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
    if (strcmp($row["description"],$description1)!=0 && $firstArray[$index1]!=-1)
       $firstArray[$index1]=-1;
    if (strcmp($row["description"],$description2)!=0 && $secondArray[$index1]!=-1)
       $secondArray[$index1]=-1;
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
    if ($ok==0 && $firstArray[$songid]!=-1)
     $firstArray[$songid]=-1;
    $ok=0;
    $coms2=$savedcoms2;
    $tokcoms2 = strtok($coms2, "+");
    while ($tokcoms2 !== false) {
      
     
      if (strcmp($row["comname"],$tokcoms2)==0) // gaseste comentariu
             $ok=1;
    
      $tokcoms2 = strtok("+");
    }
    if ($ok==0 && $secondArray[$songid]!=-1)
     $secondArray[$songid]=-1;
    
   
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
    if ($ok==10 && $firstArray[$songid]!=-1)
     $firstArray[$songid]=-1;
    $ok=0;
    $tags2=$savedtags2;
    $toktags2 = strtok($coms2, ",");
    while ($toktags2 !== false) {
      
     
      if (strcmp($row["tagname"],$toktags2)==0)
             $ok=1;
    
      $toktags2 = strtok(",");
    }
    if ($ok==0 && $secondArray[$songid]!=-1)
     $secondArray[$songid]=-1;
    
   
     // $index1++;
  }
} else {
  echo "0 results";
}



$finalArray=array();
for ($i=0;$i<$numberofelements;$i++)
  {if ($firstArray[$i]!=-1 && $secondArray[$i]!=-1)
      $finalArray[$i]=1;
      else
      $finalArray[$i]=-1;
    }

    $sql = "SELECT * from songs";
    $result = mysqli_query($conn, $sql);
    $finalIndex=0;
 while($row = mysqli_fetch_assoc($result)) {
   if ($finalArray[$finalIndex]==1)
   echo "SongId: " . $row["id"]. "; SongName: " . $row["name"] . "<br>";
   $finalIndex++;

 }


mysqli_close($conn);
?>