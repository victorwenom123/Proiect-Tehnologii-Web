<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{$appName}}  - Compare Songs</title>
    <link rel="stylesheet" href="load_resource.php?file=compare_style.css&type=css">
</head>
<body>
<div class="hero">
    <div class="navbar">
        <a href="home">
            <img src="load_resource.php?file=logo.png&type=image" alt="logo" class="logo" width="200" height="62">
        </a>
        @if($session["status"] == "true")
            <div class="buttons">
                <button class="btn-1" onclick="window.location.href='home'"><strong>Home</strong></button>
                <button class="btn-1" onclick="window.location.href='logout'"><strong>Log out</strong></button>
            </div>
        @else
            <div class="buttons">
                <button class="btn-1" onclick="window.location.href='home'"><strong>Home</strong></button>
                <button class="btn-1" onclick="window.location.href='login'"><strong>Login / Sign-up</strong></button>
            </div>
        @endif

    </div>
    <form class="forms" id="form" method="POST" action="compareSong">
        <div class="form-container">
            <!--First form-->
            <div class="formbox1">
                <h2>Details for the <span>first song!<span></h2>
                <div class="form-1" id="f1">
                    {!! $firstSongForm !!}
                </div>
            </div>
            <!--Second form-->
            <div class="formbox1">
                <h2>Details for the <span>second song!<span></h2>
                <div class="form-2" id="f2">
                    {!! $secondSongForm !!}
                </div>
            </div>
        </div>
        <div class="send-button">
            <button class="btn-2" type="submit" name="submit"><strong>SEND THE INFORMATION</strong></button>
        </div>
    </form>
</div>
<script>
    function changeWindow(newWindow) {
        window.location.href = newWindow;
    }
</script>
</body>

</html>