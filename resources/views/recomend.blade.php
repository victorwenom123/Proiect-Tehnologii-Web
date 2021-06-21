<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{$appName}} - Recomendations</title>
    <link rel="stylesheet" href="{{$appUrl}}/load_resource.php?file=recommendations_style.css&type=css">
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
            <button class="btn-1" onclick="window.location.href='{{$appUrl}}/login'"><strong>Login / Sign-up</strong></button>
        </div>
        @endif

    </div>
    <form action="{{$appUrl}}/recommendations/process" method="POST">
    <div class="form-container">
        <div class="forms">
            <h2>We need some information about you!</h2>
            <div class="formbox1">
                <form class="form-1">
                    {!! $form !!}
                </form>
            </div>
            <div class="send-button">
                <button class="btn-2" type="submit"><strong>SEND THE
                        INFORMATION</strong></button>
            </div>
        </div>
    </div>
    </form>
</div>
</body>

</html>