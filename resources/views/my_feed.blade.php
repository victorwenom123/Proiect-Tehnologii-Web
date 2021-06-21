<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{$appName}}  - Feed</title>
    <link rel="stylesheet" href="{{$appUrl}}/load_resource.php?file=compare_style.css&type=css">
</head>
<body>
<div class="hero">
    <div class="navbar">
        <a href="{{$appUrl}}/home">
            <img src="{{$appUrl}}/load_resource.php?file=logo.png&type=image" alt="logo" class="logo" width="200" height="62">
        </a>

        @if($session["status"] == "true")
            <div class="buttons">
                <button class="btn-1" onclick="window.location.href='{{$appUrl}}/home'"><strong>Home</strong></button>
                <button class="btn-1" onclick="window.location.href='{{$appUrl}}/logout'"><strong>Log out</strong></button>
            </div>
        @else
            <div class="buttons">
                <button class="btn-1" onclick="window.location.href='{{$appUrl}}/home'"><strong>Home</strong></button>
                <button class="btn-1" onclick="window.location.href='{{$appUrl}}/login'"><strong>Log in</strong></button>
            </div>
            @endif

    </div>
    <div class="main-page">
                <h2>Social Feed</h2>
                <div style="color: #0000">
                   @if($session["status"] == "true")
                        <p>
                        <div class="post-box" style="text-align: center;">

                            <form action="{{$appUrl}}/wall/{{$session["user_id"]}}/create-post" method="POST">
                                <textarea style="resize: none; width: 100%;" name="post_content" placeholder="Something to say about this..." required=""></textarea>
                                <button type="submit" class="btn-1">Submit post</button>
                            </form>

                        </div>
                        </p>
                       @endif

                    @if($posts)
                        @foreach($posts as $post)
                            <p>
                                <div class="post-box">
                                    <div class="post-content">
                                        <span><b>{{$post["username"]}}</b> - {!! $post["post_content"] !!} - <small>{{$post["created_at"]}}</small></span>
                                        @if($session["status"] == "true"  && $session["user_id"] == $post["user_id"])
                                            [<a href="{{$appUrl}}/wall/{{$session["user_id"]}}/remove-post/{{$post["id"]}}">Remove</a>]
                                            @endif
                                    </div>
                                </div>
                            </p>
                        @endforeach
                    @else
                        No posts found for this user!
                    @endif
                </div>



            </div>
<script>
    function changeWindow(newWindow) {
        window.location.href = newWindow;
    }
</script>
</body>

</html>