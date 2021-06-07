<?php


// Create connection
//$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql11 = "SELECT songs.id as songid, songs.name as songname, commentlinking.idComment as comid, commentlinking.commentName as comname FROM songs inner join commentlinking on commentlinking.idSong=songs.id";
$result11 = mysqli_query($conn, $sql11);
//$sql12 = "SELECT *, commentlinking.idComment as comid, commentlinking.commentName as comname FROM songs inner join commentlinking on commentlinking.id=songs.id";
//$result12 = mysqli_query($conn, $sql);
if (mysqli_num_rows($result11) > 0) {
  // output data of each row
  $index1=0;
  while($row11 = mysqli_fetch_assoc($result11)) {
    $sql12 = "SELECT songs.id as songid, songs.name as songname, commentlinking.idComment as comid, commentlinking.commentName as comname FROM songs inner join commentlinking on commentlinking.id=songs.id";
    $result12 = mysqli_query($conn, $sql12);
    $index2=0;
    while($row12 = mysqli_fetch_assoc($result12))
      {if ($index1<$index2 && $row11[comid]==$row12[comid])
        echo "SongId1: " . $row11["songid"]. "; SongName1: " . $row11["songname"]. "; CommentId1: " . $row11["comid"]. "; CommentName1:" . $row11["comname"] . "SongId2: " . $row12["songid"]. "; SongName2: " . $row12["songname"]. "; CommentId2: " . $row12["comid"]. "; CommentName2:" . $row12["comname"] . "<br>";
      $index2++;
      }
      $index1++;
  }
} else {
  echo "0 results";
}

$sql21 = "SELECT songs.id as songid, songs.name as songname, genrelinking.idGenre as genreid, genrelinking.genreName as genrename FROM songs inner join genrelinking on genrelinking.idSong=genres.id";
$result21 = mysqli_query($conn, $sql21);
//$sql12 = "SELECT *, commentlinking.idComment as comid, commentlinking.commentName as comname FROM songs inner join commentlinking on commentlinking.id=songs.id";
//$result12 = mysqli_query($conn, $sql);
if (mysqli_num_rows($result11) > 0) {
  // output data of each row
  $index1=0;
  while($row21 = mysqli_fetch_assoc($result21)) {
    $sql12 = "SELECT songs.id as songid, songs.name as songname, genrelinking.idGenre as genreid, genrelinking.genreName as genrename FROM songs inner join genrelinking on genrelinking.idSong=genres.id";
    $result22 = mysqli_query($conn, $sql22);
    $index2=0;
    while($row22 = mysqli_fetch_assoc($result22))
      {if ($index1<$index2 && $row21["genreid"]==$row22["genreid"])
        echo "SongId1: " . $row21["songid"]. "; SongName1: " . $row21["songname"]. "; GenreId1: " . $row21["genreid"]. "; GenreName1:" . $row21["genrename"] . "SongId2: " . $row22["songid"]. "; SongName2: " . $row22["songname"]. "; GenreId2: " . $row22["genreid"]. "; GenreName2:" . $row22["genrename"] . "<br>";
      $index2++;
      }
      $index1++;
  }
} else {
  echo "0 results";
}

$sql31 = "SELECT songs.id as songid, songs.name as songname, locationlinking.locationid as locid, locationlinking.locationName as locname FROM songs inner join locationlinking on locationlinking.songId=songs.id";
$result31 = mysqli_query($conn, $sql31);
//$sql12 = "SELECT *, commentlinking.idComment as comid, commentlinking.commentName as comname FROM songs inner join commentlinking on commentlinking.id=songs.id";
//$result12 = mysqli_query($conn, $sql);
if (mysqli_num_rows($result31) > 0) {
  // output data of each row
  $index1=0;
  while($row31 = mysqli_fetch_assoc($result31)) {
    $sql32 = "SELECT songs.id as songid, songs.name as songname, locationlinking.locationid as locid, locationlinking.locationName as locname FROM songs inner join locationlinking on locationlinking.songId=songs.id";
    $result32 = mysqli_query($conn, $sql32);
    $index2=0;
    while($row32 = mysqli_fetch_assoc($result32))
      {if ($index1<$index2 && $row31[comid]==$row32[comid])
        echo "SongId1: " . $row31["songid"]. "; SongName1: " . $row31["songname"]. "; LocationId1: " . $row31["locid"]. "; GenreName1:" . $row31["locname"] . "SongId2: " . $row32["songid"]. "; SongName2: " . $row32["songname"]. "; LocationId2: " . $row32["locid"]. "; LocationName2:" . $row32["locname"] . "<br>";
      $index2++;
      }
      $index1++;
  }
} else {
  echo "0 results";
}

$sql41 = "SELECT songs.id as songid, songs.name as songname, moodlinking.idMood as moodid, moodlinking.moodName as moodname FROM songs inner join moodlinking on moodlinking.idSong=songs.id";
$result41 = mysqli_query($conn, $sql41);
//$sql12 = "SELECT *, commentlinking.idComment as comid, commentlinking.commentName as comname FROM songs inner join commentlinking on commentlinking.id=songs.id";
//$result12 = mysqli_query($conn, $sql);
if (mysqli_num_rows($result41) > 0) {
  // output data of each row
  $index1=0;
  while($row41 = mysqli_fetch_assoc($result41)) {
    $sql42 = "SELECT songs.id as songid, songs.name as songname, moodlinking.idMood as moodid, moodlinking.moodName as moodname FROM songs inner join moodlinking on moodlinking.idSong=songs.id";
    $result42 = mysqli_query($conn, $sql42);
    $index2=0;
    while($row42 = mysqli_fetch_assoc($result42))
      {if ($index1<$index2 && $row41[comid]==$row42[comid])
        echo "SongId1: " . $row41["songid"]. "; SongName1: " . $row41["songname"]. "; MoodId1: " . $row41["moodid"]. "; MoodName1:" . $row41["moodname"] . "SongId2: " . $row42["songid"]. "; SongName2: " . $row42["songname"]. "; MoodId2: " . $row42["moodid"]. "; MoodName2:" . $row42["moodname"] . "<br>";
      $index2++;
      }
      $index1++;
  }
} else {
  echo "0 results";
}

$sql51 = "SELECT songs.id as songid, songs.name as songname, taglinking.idTag as tagid, taglinking.tagName as tagname FROM songs inner join taglinking on taglinking.idSong=songs.id";
$result51 = mysqli_query($conn, $sql51);
//$sql12 = "SELECT *, commentlinking.idComment as comid, commentlinking.commentName as comname FROM songs inner join commentlinking on commentlinking.id=songs.id";
//$result12 = mysqli_query($conn, $sql);
if (mysqli_num_rows($result51) > 0) {
  // output data of each row
  $index1=0;
  while($row51 = mysqli_fetch_assoc($result51)) {
    $sql52 = "SELECT songs.id as songid, songs.name as songname, taglinking.idTag as tagid, taglinking.tagName as tagname FROM songs inner join taglinking on taglinking.idSong=songs.id";
    $result52 = mysqli_query($conn, $sql52);
    $index2=0;
    while($row52 = mysqli_fetch_assoc($result52))
      {if ($index1<$index2 && $row51[tagid]==$row52[tagid])
        echo "SongId1: " . $row51["tagid"]. "; SongName1: " . $row51["tagname"]. "; TagId1: " . $row51["tagid"]. "; TagName1:" . $row51["tagname"] . "SongId2: " . $row52["songid"]. "; SongName2: " . $row52["songname"]. "; TagId2: " . $row52["tagid"]. "; TagName2:" . $row52["tagname"] . "<br>";
      $index2++;
      }
      $index1++;
  }
} else {
  echo "0 results";
}

$sql61 = "SELECT * from songs";
$result61 = mysqli_query($conn, $sql61);
//$sql12 = "SELECT *, commentlinking.idComment as comid, commentlinking.commentName as comname FROM songs inner join commentlinking on commentlinking.id=songs.id";
//$result12 = mysqli_query($conn, $sql);
if (mysqli_num_rows($result51) > 0) {
  // output data of each row
  $index1=0;
  while($row61 = mysqli_fetch_assoc($result61)) {
    $sql62 = "SELECT * from songs";
    $result62 = mysqli_query($conn, $sql62);
    $index2=0;
    while($row62 = mysqli_fetch_assoc($result62))
      {if ($index1<$index2 && $row61[description]==$row62[description])
        echo "SongId1: " . $row61["id"]. "; SongName1: " . $row61["name"]. "; Description1: " . $row61["description"]. "SongId2: " . $row62["id"]. "; SongName2: " . $row62["name"]. "; Description2: " . $row62["description"] . "<br>";
        if ($index1<$index2 && $row61[length]==$row62[length])
        echo "SongId1: " . $row61["id"]. "; SongName1: " . $row61["name"]. "; Length1: " . $row61["length"]. "SongId2: " . $row62["id"]. "; SongName2: " . $row62["name"]. "; Length2: " . $row62["length"] . "<br>";
        if ($index1<$index2 && $row61[author]==$row62[author])
        echo "SongId1: " . $row61["id"]. "; SongName1: " . $row61["name"]. "; Author1: " . $row61["author"]. "SongId2: " . $row62["id"]. "; SongName2: " . $row62["name"]. "; Author: " . $row62["author"] . "<br>";
        if ($index1<$index2 && $row61[date]==$row62[date])
        echo "SongId1: " . $row61["id"]. "; SongName1: " . $row61["name"]. "; Date1: " . $row61["date"]. "SongId2: " . $row62["id"]. "; SongName2: " . $row62["name"]. "; Date2: " . $row62["date"] . "<br>";
        if ($index1<$index2 && $row61[ageInterval]==$row62[ageInterval])
        echo "SongId1: " . $row61["id"]. "; SongName1: " . $row61["name"]. "; AgeInterval1: " . $row61["ageInterval"]. "SongId2: " . $row62["id"]. "; SongName2: " . $row62["name"]. "; AgeInterval2: " . $row62["ageInterval"] . "<br>";
        if ($index1<$index2 && $row61[educationLevel]==$row62[educationLevel])
        echo "SongId1: " . $row61["id"]. "; SongName1: " . $row61["name"]. "; EducationLevel1: " . $row61["educationlevel"]. "SongId2: " . $row62["id"]. "; SongName2: " . $row62["name"]. "; EducationLevel2: " . $row62["educationlevel"] . "<br>";
        if ($index1<$index2 && $row61[zoneType]==$row62[zoneType])
        echo "SongId1: " . $row61["id"]. "; SongName1: " . $row61["name"]. "; ZoneType1: " . $row61["zoneType"]. "SongId2: " . $row62["id"]. "; SongName2: " . $row62["name"]. "; ZoneType2: " . $row62["zoneType"] . "<br>";
        if ($index1<$index2 && $row61[goodForGroups]==$row62[goodForGroups])
        echo "SongId1: " . $row61["id"]. "; SongName1: " . $row61["name"]. "; GoodForGroups1: " . $row61["zoneType"]. "SongId2: " . $row62["id"]. "; SongName2: " . $row62["name"]. "; GoodForGroups2: " . $row62["goodForGroups"] . "<br>";
        if ($index1<$index2 && $row61[habitatType]==$row62[habitatType])
        echo "SongId1: " . $row61["id"]. "; SongName1: " . $row61["name"]. "; HabitatType1: " . $row61["habitatType"]. "SongId2: " . $row62["id"]. "; SongName2: " . $row62["name"]. "; habitatType2: " . $row62["habitatType"] . "<br>";






      $index2++;
      }
      $index1++;
  }
} else {
  echo "0 results";
}

mysqli_close($conn);
?>