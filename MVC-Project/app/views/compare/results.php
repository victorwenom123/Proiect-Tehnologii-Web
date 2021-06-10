<?php
session_start();
// $uri= $_SERVER["REQUEST_URI"];
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Web page Home Design</title>
        <link rel="stylesheet" href="/MVC-Project/public/css/results_style.css">
        <script>
            async function getResults(json) {
                console.log(json);
                let response = await fetch("http://localhost:3000/MVC-Project/public/home/api/compare_res", {
                    method: "POST",
                    body: json
                });
                let resultJSON = await response.json();
                console.log(resultJSON);
                // const obj = JSON.parse(resultJSON);
                // console.log(obj);
                let newElem = document.createElement("h1");
                newElem.textContent = resultJSON.data;
                document.getElementById("content").appendChild(newElem);


            }
        </script>
    </head>

    <body>

        <div class="hero">
            <div class="navbar">
                <a href="/MVC-Project/public/home">
                    <img src="/MVC-Project/public/css/images/logo.png" alt="logo" class="logo" width="200" height="62">
                </a>
                <?php
                if(isset($_SESSION["userid"])) : ?>
                    <div class="buttons">
                        <button class="btn-1" onclick="window.location.href='/MVC-Project/public/home'"><strong>Home</strong></button>
                        <button class="btn-1" onclick="window.location.href='/MVC-Project/public/includes/logout.inc.php'"><strong>Log out</strong></button>
                        <button class="btn-1" onclick="window.location.href='/MVC-Project/public/compare'"><strong>Back</strong></button>
                    </div>
                    <?php else : ?>
                    <div class="buttons">
                        <button class="btn-1" onclick="window.location.href='/MVC-Project/public/home'"><strong>Home</strong></button>
                        <button class="btn-1" onclick="window.location.href='/MVC-Project/public/login'"><strong>Log in/Sign-up</strong></button>
                        <button class="btn-1" onclick="window.location.href='/MVC-Project/public/compare'"><strong>Back</strong></button>
                    </div>
                    <?php endif; ?>
            </div>
            <div class="main-page" id="content">
                <?php
                if(isset($_SESSION["info"])){
                    $info = $_SESSION["info"];
                    $infoS = implode("|", $info);
                    echo "<script>
                    getResults(". "\"". $infoS . "\"". ");
                    </script> ";
                } 

                ?>



                
            </div>
        </div>


    </body>

    </html>