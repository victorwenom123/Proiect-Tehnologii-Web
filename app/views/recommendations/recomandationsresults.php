<?php
session_start();
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Web page Home Design</title>
        <link rel="stylesheet" href="/MVC-Project/public/css/recommendations_result_style.css">
    </head>

    <body>
        <div class="hero">
            <div class="navbar">
                <a href="/MVC-Project/public/home">
                    <img src="/MVC-Project/public/css/images/logo.png" alt="logo" class="logo" width="200" height="62">
                </a>
                <?php
                if(isset($_SESSION["userid"])) : ?>
                    <div class="buttons">
                        <button class="btn-1" onclick="window.location.href='/MVC-Project/public/home'"><strong>Home</strong></button>
                        <button class="btn-1" onclick="window.location.href='/MVC-Project/public/includes/logout.inc.php'"><strong>Log out</strong></button>
                        <button class="btn-1" onclick="window.location.href='/MVC-Project/public/recommendations'"><strong>Back</strong></button>
                    </div>
                    <?php else : ?>
                    <div class="buttons">
                        <button class="btn-1" onclick="window.location.href='/MVC-Project/public/home'"><strong>Home</strong></button>
                        <button class="btn-1" onclick="window.location.href='/MVC-Project/public/login'"><strong>Log in/Sign-up</strong></button>
                        <button class="btn-1" onclick="window.location.href='/MVC-Project/public/recommendations'"><strong>Back</strong></button>
                    </div>
                    <?php endif; ?>

            </div>
            <div class="main-page">
                <h1>This page will recommend songs based on the data entered in the form</h1>
                <h2>Only some recommendations will be displayed here!</h2>
                <h2>But more recommendations will also appear on each user's social media page along with the hashtag #saudio!</h2>
            </div>
        </div>
    </body>

    </html>