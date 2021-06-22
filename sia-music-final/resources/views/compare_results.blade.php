<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{$appName}}  - Comparison Results</title>
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
    <form class="forms">
        <div class="form-container">
            <!--First form-->
            <div class="formbox1" style="text-align:center; margin:auto;color:white;">
                <h2>Compare results</h2>


                   @if($results)
                        <h3>{{$results["songs"]}}</h3>
                        <br/>
                        <hr/>
                        <br/>
                        <b>Artist similarity</b>: {{$results["artist_similarity"]}} <br/>
                        <b>Song Similarity</b>:{{$results["song_similarity"]}} <br/>
                        <b>Tag similarity</b>: {{$results["tags_similarity"]}} <br/>
                        <b>Found Tags:</b> {{$results["found_tags"]}} <br/>
                    @else
                       Could not find any suitable matches for your songs.
                       Please retry using a different name and artist combination.
                    @endif

                <br/>
                <br/>
                <hr/>
                <h4>powered by Last.fm</h4>

            </div>
            <!--Second form-->
        </div>
        <div class="send-button">
            <a href="{{$appUrl}}/compare"><button class="btn-2" type="button"><strong>Compare another pair</strong></button>
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