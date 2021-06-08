<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Web page Home Design</title>
    <link rel="stylesheet" href="/MVC-Project/public/css/index_style.css">
</head>

<body>
    <div class="hero">
        <div class="navbar">
            <a href="/MVC-Project/public/home">
                <img src="/MVC-Project/public/css/images/logo.png" alt="logo" class="logo" width="200" height="62">
            </a>
            <?php
             if(isset($_SESSION["userid"])) : ?>
            <div class="navbarButtons">
            <button class="btn-1" onclick="window.location.href='/MVC-Project/public/includes/logout.inc.php'"><strong>Log out</strong></button>
            <button class="btn-1" onclick="window.location.href='/MVC-Project/public/social'"><strong>Profile</strong></button>
            </div>
             <?php else : ?>
            <button class="btn-1" onclick="window.location.href='/MVC-Project/public/login'"><strong>Log in</strong></button>
             <?php endif; ?>
            <!-- <button class="btn-1" onclick="window.location.href='/MVC-Project/public/login'"><strong>Log in</strong></button> -->
        </div>
        <div class="content">
            <h2>Welcome to our</h2>
            <h1>New innovative page<br>that compares songs!</h1>
            <button type="button" class="btn-2" onclick="window.location.href='/MVC-Project/public/compare'"><strong>Compare
                    songs!</strong></button>
            <button type="button" class="btn-2" onclick="window.location.href='/MVC-Project/public/recommendations'"><strong>Get
                    recommendations!</strong></button>
            <button type="button" class="btn-2" onclick="window.location.href='/MVC-Project/public/report'"><strong>Scholarly HTML Report!</strong></button>
        </div>
        <div class="sounds">
            <img src="/MVC-Project/public/css/images/sound1_r.png" alt="sound" width="50">
            <img src="/MVC-Project/public/css/images/sound2_r.png" alt="sound" width="50">
            <img src="/MVC-Project/public/css/images/sound3_r.png" alt="sound" width="50">
            <img src="/MVC-Project/public/css/images/sound4_r.png" alt="sound" width="50">
            <img src="/MVC-Project/public/css/images/sound5_r.png" alt="sound" width="50">
            <img src="/MVC-Project/public/css/images/sound6_r.png" alt="sound" width="50">
            <img src="/MVC-Project/public/css/images/sound7_r.png" alt="sound" width="50">
        </div>
    </div>
</body>

</html>