<?php
use MusicEngine\MusicEngineClient;
require "Config.php";
require "API.php";


if(isset($_POST["test"]))
{
    $firstSong = $_POST["first"];
    $secondSong = $_POST["second"];

    $firstArtist = $_POST["firstArtist"];
    $secondArtist = $_POST["secondArtist"];

    $query = new MusicEngineClient($firstSong,$firstArtist,$secondSong,$secondArtist);
    $data = $query->compareSongs();
    $query->prettyPrint($data);
}
else
{
    $query = new MusicEngineClient();
    $data = $query->index();
    $query->prettyPrint($data);
}

?>
<hr>
<form action="Client.php" method="POST">
<label>First Song</label>
<input type="text" name="first" required=""/>
<label>First Artist</label>
<input type="text" name="firstArtist" required=""/>
<label>Second Song</label>
<input type="text" name="second" required=""/>
<label>Second Artist</label>
<input type="text" name="secondArtist" required=""/>

<button type="submit" name="test">Test API</button>
</form>
