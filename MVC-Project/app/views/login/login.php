<?php
include '../public/configs/configLogin.php';

error_reporting(0);
session_start();


if (isset($_POST['registerButton'])) {
    $username = $_POST['reg_username'];
    $email = $_POST['reg_email'];
    $password = md5($_POST['reg_password']);
    $waspressed = true;
    $username_login = "";
    $waspressed1 = false;
}
if (isset($_POST['loginButton'])) {
    $username = "";
    $email = "";
    $password = "";
    $waspressed = false;
    $password = md5($_POST['password']);
    $username_login = $_POST['username'];
    $waspressed1 = true;
}
if ($waspressed) {
    $sql = "SELECT * FROM `users` WHERE `usename` = '$username' OR `email` = '$email' ORDER BY `usename` ASC";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        echo "<script>alert('Email or username already used!')</script>";
    } else {
        $sql = "INSERT INTO `users` (`usename`, `email`, `password`) VALUES ('$username', '$email', '$password')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script>alert('Registration Complete!')</script>";
            $username = "";
            $email = "";
            $password = "";
            $waspressed = false;
            $_POST['reg_password'] = "";
        } else {
            echo "<script>alert('Woops! Sonething Went Wrong. $username  $email  $password ')</script>";
        }
    }
}

if ($waspressed1) {
    $sql = "SELECT * FROM `users` WHERE `usename` = '$username_login' AND `password` = '$password' ORDER BY `usename` ASC";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        echo "<script>alert('Login Succed!')</script>";
    } else {
        echo "<script>alert('username or pawwsord was wrong!')</script>";
    }    
}
?>

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
                    <form id="login" method="POST" class="input-group">
                        <input type="text" class="input-field" name="username" value="<?php echo $username_login ?>" placeholder="Username" required>
                        <input type="password" class="input-field" name="password" value="<?php echo $_POST1['password'] ?> placeholder=" Password " required>
                    <label>
                        <input type="checkbox " class="check-box "><span>Remember password!</span>
                    </label>
                    <button type="submit " name="loginButton " class="submit-button "><strong>Log In</strong></button>
                </form>
                <form action=" " id="register " method="POST " class="input-group ">
                    <input type="text " class="input-field " name="reg_username " value="<?php echo $username ?>" placeholder="Username" required>
                        <input type="email" class="input-field" name="reg_email" value="<?php echo $email ?>" placeholder="Email" required>
                        <input type="password" class="input-field" name="reg_password" value="<?php echo $_POST['reg_password'] ?>" placeholder="Password" required>
                        <label>
                        <input type="checkbox" class="check-box"><span>I agree with the terms and conditions!</span>
                    </label>
                        <button type="submit" name="registerButton" class="submit-button"><strong>Register</strong></button>
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