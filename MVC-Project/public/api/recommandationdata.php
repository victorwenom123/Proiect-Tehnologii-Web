<?php


// Create connection
//$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// in locul acestor date de tip exemplu, vom avea datele din formular in alta pagina


$date="a";
$habitatType="b";
$zoneType="c";
$goodForGroups="a";
$age="5";
$educationLevel="High";
$genre="a";
$locations="loc1;loc2";
$savedlocations=$locations;
$mood="Happy";

$Array=array();


$sql = "SELECT * from songs";
$nrofelements=mysqli_num_rows($result);
$result = mysqli_query($conn, $sql);
for ($i=0;$i<mysqli_num_rows($result);$i++)
{array_push($Array,1);
}
//$sql12 = "SELECT *, commentlinking.idComment as comid, commentlinking.commentName as comname FROM songs inner join commentlinking on commentlinking.id=songs.id";
//$result12 = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  $index1=0;
  while($row = mysqli_fetch_assoc($result)) {
   // $sql = "SELECT * from songs";
   // $result = mysqli_query($conn, $sql);
    if (strcmp($row["date"],$date)!=0 && $Array[$index1]!=-1)
       $Array[$index1]=-1;
    if (strcmp($row["habitatType"],$habitatType)!=0 && $Array[$index1]!=-1)
       $Array[$index1]=-1;
    if (strcmp($row["zoneType"],$zoneType)!=0 && $Array[$index1]!=-1)
       $Array[$index1]=-1;
    if (strcmp($row["goodForGroups"],$goodForGroups)!=0 && $Array[$index1]!=-1)
       $Array[$index1]=-1;
    if (strcmp($row["age"],$age)!=0 && $Array[$index1]!=-1)
       $Array[$index1]=-1;
    if (strcmp($row["educationLevel"],$educationLevel)!=0 && $Array[$index1]!=-1)
       $Array[$index1]=-1;
    if (strcmp($row["genre"],$genre)!=0 && $Array[$index1]!=-1)
       $Array[$index1]=-1;
    if (strcmp($row["mood"],$mood)!=0 && $Array[$index1]!=-1)
       $Array[$index1]=-1;
      $index1++;
  }
} else {
  echo "0 results";
}




$sql = "SELECT songs.id as songid, songs.name as songname, locationlinking.locationid as locid, locationlinking.locationName as locname FROM songs inner join locationlinking on locationlinking.songId=songs.id";
$result = mysqli_query($conn, $sql);
//$sql12 = "SELECT *, commentlinking.idComment as comid, commentlinking.commentName as comname FROM songs inner join commentlinking on commentlinking.id=songs.id";
//$result12 = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  $locations=$savedlocations;
 // $index1=0;
  while($row = mysqli_fetch_assoc($result)) {
    
    $toklocations = strtok($locations, ",");
    $ok=0;
    while ($toklocations !== false) {
      
     
      if (strcmp($row["locname"],$toklocations)==0)
             $ok=1;
    
      $tokgenres = strtok(",");
    }
    if ($ok==0 && $Array[$songid]!=-1)
     $Array[$songid]=-1;
    
    
   
    //  $index1++;
  }
} else {
  echo "0 results";
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