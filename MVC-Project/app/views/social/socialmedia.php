<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>social media demo page</title>
    <link rel="stylesheet" href="/MVC-Project/public/css/socialmedia_style.css">

    <script>
        function showSuggestion(str) {
            if (str.length == 0) {
                document.getElementById('output').innerHTML = '';
            } else {
                //AJAX REQUEST
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById('output').
                        innerHTML = this.responseText;
                    }
                }
                xmlhttp.open("GET", "/MVC-Project/public/includes/socialajax.inc.php?q=" + str, true);
                xmlhttp.send();
            }
        }
    </script>
</head>

<body>
    <div class="hero">
        <div class="navbar">
            <a href="/MVC-Project/public/home">
                <img src="/MVC-Project/public/css/images/logo2.png" alt="logo" class="logo" width="200" height="62">
            </a>
            <div class="buttons">
                <button class="btn-1" onclick="window.location.href='/MVC-Project/public/home'"><strong>Home</strong></button>
                <button class="btn-1" onclick="window.location.href='/MVC-Project/public/login'"><strong>Back</strong></button>
            </div>
        </div>
        <div class="live">
            <div class="person">
                <div class="profile-pic"></div>
                <p class="name">Andrei</p>
            </div>
            <div class="person">
                <div class="profile-pic"></div>
                <p class="name">Victor</p>
            </div>
            <div class="person">
                <div class="profile-pic"></div>
                <p class="name">Cristi</p>
            </div>
            <div class="person">
                <div class="profile-pic"></div>
                <p class="name">Marius</p>
            </div>
            <div class="person">
                <div class="profile-pic"></div>
                <p class="name">Maria</p>
            </div>
            <div class="person">
                <div class="profile-pic"></div>
                <p class="name">Alex</p>
            </div>
            <div class="person">
                <div class="profile-pic"></div>
                <p class="name">Paul</p>
            </div>
            <div class="person">
                <div class="profile-pic"></div>
                <p class="name">Laura</p>
            </div>

        </div>
        <div class="tweet">
            <form id="search" action="/MVC-Project/public/includes/social.inc.php" method="post">
                <div class="form-top">
                    <label for="c1"><strong>Search for a song!</strong></label>
                    <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "emptyinput") {
                            echo "<p style='color:black'>Give us a name for the song</p>";
                        } else if ($_GET["error"] == "tryedToHack") {
                            echo "<p style='color:black'>Police will be alerted!!!</p>";
                        } else if ($_GET["error"] == "songNotFound") {
                            echo "<p style='color:black'>We don't have this song in our DB!</p>";
                        } else if ($_GET["error"] == "noSongInDB") {
                            echo "<p style='color:black'>Something went wrong!</p>";
                        }
                    }
                    ?>
                    <div class="send-button">
                        <input class="btn-2" name="submit2" type="submit" value="SEARCH!">
                    </div>
                </div>
                <input type="text" id="c1" name="comments1" onkeyup="showSuggestion(this.value)" placeholder="Write a tweet...">
            </form>
            <p style="color:red"><b>Suggestions:</b> <span id="output" style="font-weight:bold; color:blue"></span> </p>
        </div>
        <?php
$saudio = "#Saudio";
$str = "<?xml version='1.0' encoding='UTF-8'?>";
$str .= "<rss version='2.0'>";
    $str .= "<channel>";
        $str .= "<title>Our website</title>";
        $str .= "<description>Our website</description>";
        $str .= "<language>en-US</language>";
        
        $conn = mysqli_connect("localhost", "root", "", "musicweb");
        $result = mysqli_query($conn, "SELECT * FROM songs");

        while($row = mysqli_fetch_object($result)){
            $str .= "<item>";
                $str .= "<title>" . htmlspecialchars($row->name) . "</title>";
                $str .= "<description>" . htmlspecialchars($row->description) . "</description>";
                $str .= "<author>" . htmlspecialchars($row->author) . "</author>";
                $str .= "<link>" . htmlspecialchars($row->youtubeLink) . "</link>";
                $str .= "<tag>" . $saudio . "</tag>";
            $str .= "</item>";
        }
    
    $str .= "</channel>";
$str .= "</rss>";

file_put_contents("rss.xml",$str);
?>
        <div class="newsfeed">
            <div class="news-head">
                <h4>Newsfeed</h4>
            </div>
            <?php
    $domOBJ = new DOMDocument();
    $domOBJ->load("rss.xml");
    
    $content = $domOBJ->getElementsByTagName("item");
    

    foreach( $content as $data)
    {
        $title = $data->getElementsByTagName("title")->item(0)->nodeValue;
        $description = $data->getElementsByTagName("description")->item(0)->nodeValue;
        $author = $data->getElementsByTagName("author")->item(0)->nodeValue;
        $tag = $data->getElementsByTagName("tag")->item(0)->nodeValue;
        $link = $data->getElementsByTagName("link")->item(0)->nodeValue;
        echo "<div class='card'>
        <div class='picture'></div>
        <div class='content'>
            <div class='hrader'>
                <div class='profile-pic'></div>
                <div class='details'>
                    <p class='name'>Song-recommander-bot</p>
                    <p class='posted'>1 day ago</p>
                </div>
            </div>
            <div class='desc'>
                <strong> $author - $title </strong><br>
                <!--Random text generate-->
                $description<br>
                $link
            </div>
            <div class='tags'>
                $tag
            </div>

            <div class='footer'>
                <div class='like'>
                    <img src='/MVC-Project/public/css/images/like.png' alt='like' width='20' height='20'>
                    <span>120k</span>
                </div>
                <div class='comment'>
                    <img src='/MVC-Project/public/css/images/com.png' alt='comm' width='20' height='20'>
                    <span>20k</span>
                </div>
                <div class='share'>
                    <img src='/MVC-Project/public/css/images/share.png' alt='share' width='20' height='20'>
                    <span>13k</span>
                </div>
            </div>
        </div>
    </div>";
    }
    ?>
            <div class="card">
                <div class="picture"></div>
                <div class="content">
                    <div class="hrader">
                        <div class="profile-pic"></div>
                        <div class="details">
                            <p class="name">Song-recommmander-bot</p>
                            <p class="posted">1 day ago</p>
                        </div>
                    </div>
                    <div class="desc">
                        <strong>Tones and I - Dance Monkey</strong><br>
                        <!--Random text generate-->

                        In show dull give need so held. One order all scale sense her gay style wrote. Incommode our not one ourselves residence. Shall there whose those stand she end. So unaffected partiality indulgence dispatched to of celebrated remarkably. Unfeeling are
                        had allowance own perceived abilities.<br> Started his hearted any civilly. So me by marianne admitted speaking. Men bred fine call ask. Cease one miles truth day above seven. Suspicion sportsmen provision
                        suffering mrs saw engrossed something. Snug soon he on plan in be dine some.
                    </div>
                    <div class="tags">
                        <span>#saudio</span>
                        <span>#project</span>
                    </div>

                    <div class="footer">
                        <div class="like">
                            <img src="/MVC-Project/public/css/images/like.png" alt="like" width="20" height="20">
                            <span>120k</span>
                        </div>
                        <div class="comment">
                            <img src="/MVC-Project/public/css/images/com.png" alt="comm" width="20" height="20">
                            <span>20k</span>
                        </div>
                        <div class="share">
                            <img src="/MVC-Project/public/css/images/share.png" alt="share" width="20" height="20">
                            <span>13k</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>