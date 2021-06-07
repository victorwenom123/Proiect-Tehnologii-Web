<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Log-in/Sign-up page</title>
    <link rel="stylesheet" href="style1.css">
</head>

<body>
    <div class="hero">
        <div class="navbar">
            <a href="index.html">
                <img src="images/logo.png" alt="logo" class="logo" width="200" height="62">
            </a>
            <div>
                <button class="btn-2" onclick="window.location.href='index.html'"><strong>Back to home</strong></button>
                <button class="btn-2" onclick="window.location.href='socialmedia.html'"><strong>socialmedia-demo</strong></button>
            </div>
        </div>
        <div class="form-container">
            <div class="form-box">
                <div class="button-box">
                    <div id="btn"></div>
                    <button type="button" class="btn-1" onclick="login()"><strong>Log In</strong></button>
                    <button type="button" class="btn-1" onclick="register()"><strong>Sign-up</strong></button>
                </div>
                <form id="login" class="input-group" action="usefullogin.php" method="post" enctype="multipart/form-data">
                    <input type="username" class="input-field" name="username" placeholder="Username" required="required">
                    <input type="password" class="input-field" name="pass" placeholder="Password" required="required">
                    <label>
                <input type="checkbox" class="check-box"><span>Remember password!</span>
                </label>
                    <button type="submit" name="save" class="submit-button"><strong>Log In</strong></button>
                </form>
                <form id="register" class="input-group" action="registration.php" method="post" enctype="multipart/form-data" >
                    <input type="username" class="input-field" name="username" placeholder="Username" required="required">
                    <input type="email" class="input-field" name="email" placeholder="Email" required="required">
                    <input type="password" class="input-field" name="pass" placeholder="Password" required="required">
                    <label>
                <input type="checkbox" class="check-box"><span>I agree with the terms and conditions!</span>
                </label>
                    <button type="submit" name="save" class="submit-button"><strong> Register</strong></button>
                </form>

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
</body>

</html>