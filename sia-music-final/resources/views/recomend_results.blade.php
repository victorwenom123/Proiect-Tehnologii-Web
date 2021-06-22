<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{$appName}} - Recomendation Results</title>
    <link rel="stylesheet" href="{{$appUrl}}/load_resource.php?file=recommendations_result_style.css&type=css">
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
            <button class="btn-1" onclick="window.location.href='{{$appUrl}}/recommendations'"><strong>Back</strong></button>
        </div>
        @else
        <div class="buttons">
            <button class="btn-1" onclick="window.location.href='{{$appUrl}}/home'"><strong>Home</strong></button>
            <button class="btn-1" onclick="window.location.href='{{$appUrl}}/login'"><strong>Log in/Sign-up</strong></button>
            <button class="btn-1" onclick="window.location.href='{{$appUrl}}/recommendations'"><strong>Back</strong></button>
        </div>
        @endif

    </div>
    <div class="main-page">
        <h1>This is what we found</h1>
        <div style="color: #ffffff;">
        @if($results)
            @foreach($results as $r)
                <p style="font-size: 17px;"><b>{{$r["name"]}}</b> by <b>{{$r["artist"]}}</b> - Playtime : {{$r["length"]}} minute(s) - Genre: {{ucfirst($r["genre"])}} - Mood: {{ucfirst($r["mood"])}}</p>
            @endforeach
        @else
            <h3>No results found! Please retry using a different combination.</h3>
         @endif
        </div>
    </div>
</div>
</body>

</html>