<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{$appName}} - REST API Test</title>
    <link rel="stylesheet" href="load_resource.php?file=compare_style.css&type=css">
</head>

<body>
<div class="hero">
    <div class="navbar">
        <a href="{{$appUrl}}/home">
            <img src="load_resource.php?type=image&file=logo.png" alt="logo" class="logo" width="200" height="62">
        </a>

        @if($session["status"] == "true")
            <div class="buttons">
                <button class="btn-1" onclick="window.location.href='api-rest'"><strong>API REST</strong></button>
                <button class="btn-1" onclick="window.location.href='home'"><strong>Home</strong></button>
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
            <div class="form-container" style="background-color: white;">
                <!--First form-->
                    <div class="post-box" style="width: 100%;color: black;">
                        <p style="text-align: center;"> <h2 style="color:black;">API Rest </h2></p>
                        <p style="text-align: left;"><h2 style="color:black;">Compare Songs -> POST -> <b>/api/compare-songs</b> </h2></p>
                        <form action="{{$appUrl}}/api-rest/compare" method="POST">
                           <div class="form-group">
                               <input type="text" placeholder="First Song Title.." required="true" name="firstSongName">
                           </div>
                            <br/>
                            <div class="form-group">
                                <input type="text" placeholder="First Song Artist" required="true" name="firstSongAuthor">
                            </div>
                            <br/>
                            <div class="form-group">
                                <input type="text" placeholder="Second Song Title" required="true" name="secondSongName">
                            </div>
                            <br/>
                            <div class="form-group">
                                <input type="text" placeholder="Second Song Artist" required="true" name="secondSongAuthor">
                            </div>
                           <p style="text-align: center;"> <button type="submit">TEST /api/compare-songs</button></p>
                        </form>
                        <br/>
                        <p style="text-align: left;"><h2 style="color:black;">List all songs -> GET -> <b>/api/get-songs</b> </h2></p>
                        <p style="text-align: center;"><a href="{{$appUrl}}/api-rest/list-songs"><button type="button">TEST /api/get-songs</button></a></p>
                    </div>
    </div>

</div>
</body>

</html>