<!DOCTYPE html>
<html lang="en">
require "data.php";
<head>
    <meta charset="UTF-8">
    <title>Web page Home Design</title>
    <link rel="stylesheet" href="/MVC-Project/public/css/results_style.css">
</head>

<body>
    <div class="hero">
        <div class="navbar">
            <a href="/MVC-Project/public/home">
                <img src="/MVC-Project/public/css/images/logo.png" alt="logo" class="logo" width="200" height="62">
            </a>
            <div class="buttons">
                <button class="btn-1" onclick="window.location.href='/MVC-Project/public/home'"><strong>Home</strong></button>
                <button class="btn-1" onclick="window.location.href='/MVC-Project/public/login'"><strong>Log in/Sign-up</strong></button>
                <button class="btn-1" onclick="window.location.href='/MVC-Project/public/compare'"><strong>Back</strong></button>
            </div>
        </div>
        <div class="main-page">
            <h1>This page will show the results of the songs compared!</h1>
            <h2>The similarities between the two songs introduced in the earlier form will be displayed here!</h2>
            <h2>At the same time, the similarities between the two songs and other songs in a database will be displayed also here!
            </h2>
        </div>
    </div>
</body>

</html>