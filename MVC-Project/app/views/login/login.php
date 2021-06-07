<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Log-in/Sign-up page</title>
    <link rel="stylesheet" href="/MVC-Project/public/css/login_style.css">
</head>

<body>
    <div class="hero">
        <div class="navbar">
            <a href="/MVC-Project/public/home">
                <img src="/MVC-Project/public/css/images/logo.png" alt="logo" class="logo" width="200" height="62">
            </a>
            <div>
                <button class="btn-2" onclick="window.location.href='/MVC-Project/public/home'"><strong>Back to home</strong></button>
                <button class="btn-2" onclick="window.location.href='/MVC-Project/public/social'"><strong>socialmedia-demo</strong></button>
            </div>
        </div>
        <div class="form-container">
            <div class="form-box">
                <div class="button-box">
                    <div id="btn"></div>
                    <button type="button" class="btn-1" onclick="login()"><strong>Log In</strong></button>
                    <button type="button" class="btn-1" onclick="register()"><strong>Sign-up</strong></button>
                </div>
                <form id="login" action="/MVC-Project/public/includes/login.inc.php" method="post" class="input-group">
                    <input type="text" class="input-field" name="name1" placeholder="Username/Email..." required>
                    <input type="password" class="input-field" name="pwd1" placeholder="Password..." required>
                    <button type="submit" name="submit1" class="submit-button"><strong>Log In</strong></button>
                </form>
                <form id="register" action="/MVC-Project/public/includes/signup.inc.php" method="post" class="input-group">
                    <input type="text" class="input-field" name="name" placeholder="Username..." required>
                    <input type="email" class="input-field" name="email" placeholder="Email..." required>
                    <input type="password" class="input-field" name="pwd" placeholder="Password..." required>
                    <input type="password" class="input-field" name="pwdrepeat" placeholder="Repeat Password..." required>
                    <button type="submit" name="submit" class="submit-button"><strong>Register</strong></button>
                </form>
                <div>
                <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "invalidusername") {
                        echo "<p>Choose a proper username!</p>";
                    } else if ($_GET["error"] == "paswworddontmatch") {
                        echo "<p>Password don't match!</p>";
                    } else if ($_GET["error"] == "stmtfailed") {
                        echo "<p>Something went wrong!</p>";
                    } else if ($_GET["error"] == "usernametaken") {
                        echo "<p>Username or email already taken!</p>";
                    } else if ($_GET["error"] == "none") {
                        echo "<p>You have signed up</p>";
                    } else if ($_GET["error"] == "name") {
                        echo "<p>Incorrect login Information</p>";
                    } else if ($_GET["error"] == "wronglogin") {
                        echo "<p>Incorrect login information</p>";
                    }
                }
                ?>
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

</body>

</html>