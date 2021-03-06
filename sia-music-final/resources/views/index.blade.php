<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{$appName}} - Home</title>
    <link rel="stylesheet" href="load_resource.php?type=css&file=index_style.css">
</head>

<body>
<div class="hero">
    <div class="navbar">
        <a href="home">
            <img src="load_resource.php?type=image&file=logo.png" alt="logo" class="logo" width="200" height="62">
        </a>

        @if($session["status"] == "true")
            <div class="buttons">
                <button class="btn-1" onclick="window.location.href='api-rest'"><strong>API REST</strong></button>
                <!--<button class="btn-1" onclick="window.location.href='home'"><strong>Home</strong></button>-->
                <button class="btn-1" onclick="window.location.href='logout'"><strong>Log out</strong></button>
                   @if($session["user_rank"] == "admin")
                    <button class="btn-1" onclick="window.location.href='admin'"><strong>Admin</strong></button>
                   @endif
                <button class="btn-1" onclick="window.location.href='wall/{{$session["user_id"]}}'"><strong>My Feed</strong></button>
            </div>
        @else
            <div class="buttons">
                <button class="btn-1" onclick="window.location.href='api-rest'"><strong>API REST</strong></button>
                <button class="btn-1" onclick="window.location.href='login'"><strong>Log in</strong></button>
            </div>

        @endif
        <!-- <button class="btn-1" onclick="window.location.href='/projects/mvc-project/public/login'"><strong>Log in</strong></button> -->
    </div>
    <div class="content">
        <h2>Welcome to our</h2>
        <h1>New innovative page<br>that compares songs!</h1>
        <button type="button" class="btn-2" onclick="window.location.href='compare'"><strong>Compare
                songs!</strong></button>
        <button type="button" class="btn-2" onclick="window.location.href='recommendations'"><strong>Get
                recommendations!</strong></button>
        <button type="button" class="btn-2" onclick="window.location.href='scholarly.html'"><strong>Scholarly HTML Report!</strong></button>
        <button type="button" class="btn-2" onclick="window.location.href='userguide.html'"><strong>User Guide</strong></button>
    </div>
    <div class="sounds">
        <img src="load_resource.php?type=image&file=sound1_r.png" alt="sound" width="50">
        <img src="load_resource.php?type=image&file=sound2_r.png" alt="sound" width="50">
        <img src="load_resource.php?type=image&file=sound3_r.png" alt="sound" width="50">
        <img src="load_resource.php?type=image&file=sound4_r.png" alt="sound" width="50">
        <img src="load_resource.php?type=image&file=sound5_r.png" alt="sound" width="50">
        <img src="load_resource.php?type=image&file=sound6_r.png" alt="sound" width="50">
        <img src="load_resource.php?type=image&file=sound7_r.png" alt="sound" width="50">
    </div>
</div>
</body>

</html>