<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{$appName}} - Login</title>
    <link rel="stylesheet" href="load_resource.php?type=css&file=login_style.css">
</head>

<body>
<div class="hero">
    <div class="navbar">
        <a href="home">
            <img src="load_resource.php?type=image&file=logo.png" alt="logo" class="logo" width="200" height="62">
        </a>
        <div>
            <button class="btn-2" onclick="window.location.href='home'"><strong>Back to home</strong></button>
        </div>
    </div>
    <div class="form-container">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="btn-1" onclick="login()"><strong>Log In</strong></button>
                <button type="button" class="btn-1" onclick="register()"><strong>Sign-up</strong></button>
            </div>
            <form id="login" class="input-group">
                <input type="text" id="loginUsername"  class="input-field" name="name1" placeholder="Username/Email..." required>
                <input type="password" id="loginPassword"  class="input-field" name="pwd1" placeholder="Password..." required>
                <button type="button" id="loginAction" name="submit1" class="submit-button"><strong>Log In</strong></button>
                <br/>
                <div id="loginMessage"></div>
            </form>
            <form id="register" class="input-group">
                <input type="text"  id="firstName" class="input-field" name="name" placeholder="First name..." required>
                <input type="text" id="lastName" class="input-field" name="name" placeholder="Last name..." required>
                <input type="text"  id="registerUsername" class="input-field" name="name" placeholder="Username..." required>
                <input type="email"  id="email" class="input-field" name="email" placeholder="Email..." required>
                <input type="password"  id="registerPassword" class="input-field" name="pwd" placeholder="Password..." required>
                <input type="password"  id="repeatPassword" class="input-field" name="pwdrepeat" placeholder="Repeat Password..." required>
                <button type="button" id="registerAction" name="submit" class="submit-button"><strong>Register</strong></button>
                <br/>
                <div id="registerMessage"></div>
            </form>
            <div>
            </div>
        </div>
    </div>
</div>
<script>
    var li = document.getElementById("login");
    var reg = document.getElementById("register");
    var btn = document.getElementById("btn");

    function register() {
        li.style.left = "-100%";
        reg.style.left = "15%"
        btn.style.left = "50%"
    }

    function login() {
        li.style.left = "15%";
        reg.style.left = "115%"
        btn.style.left = "0%"
    }
</script>
<script src="load_resource.php?type=js&file=ajaxActions.js"></script>
</body>

</html>