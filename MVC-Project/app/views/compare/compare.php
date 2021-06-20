<?php
session_start();
?>
    <!doctype html>

    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Compare page</title>
        <link rel="stylesheet" href="/MVC-Project/public/css/compare_style.css">
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
                    </div>
                    <?php else : ?>
                    <div class="buttons">
                        <button class="btn-1" onclick="window.location.href='/MVC-Project/public/home'"><strong>Home</strong></button>
                        <button class="btn-1" onclick="window.location.href='/MVC-Project/public/login'"><strong>Login / Sign-up</strong></button>
                    </div>
                    <?php endif; ?>
            </div>
            <?php
                     if (isset($_GET["error"])) {
                        if ($_GET["error"] == "triedToHack") {
                            
                            echo "<h1 style=\"color:red;text-align:center\">This time don't try to hack!</h1>";
                        }
                    }
                    ?>
                <form class="forms" id="form" method="get">
                    <div class="form-container">
                        <!--First form-->


                        <div class="formbox1">
                            <h2>Details for the <span>first song!<span></h2>
                        <div class="form-1" id="f1">

                            <div class="row">
                                <div class="col-25">
                                    <label for="t1">Name of the song</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" id="t1" name="title1" placeholder="The title of the first song.." required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="a1">Author</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" id="a1" name="author1" placeholder="First author.." required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="l1">Length of the song (in minutes) </label>
                                </div>
                                <div class="col-75">
                                    <input type="number" id="l1" name="length1" min="1" placeholder="First length..." required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="tags1">Tags for the song (Write "," between them)</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" id="tags1" name="tags1" placeholder="First song tags.." required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="g1">Genre of the first song</label>
                                </div>
                                <div class="col-75">
                                    <select id="g1" name="genre1" required>
                                <option value="none">None</option>
                                <option value="rock">Rock</option>
                                <option value="pop">Pop</option>
                                <option value="electronic">Electronic</option>
                                <option value="rb">R&B</option>
                                <option value="latin">Latin</option>
                                <option value="reggae">Reggae</option>
                            </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="c1">Comments for the first song (Write "+" between them) </label>
                                </div>
                                <div class="col-75">
                                    <textarea id="c1" name="comments1" placeholder="Write something.." style="height:50px" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Second form-->


                    <div class="formbox1">
                        <h2>Details for the <span>second song!<span></h2>
                        <div class="form-2" id="f2">

                            <div class="row">
                                <div class="col-25">
                                    <label for="t2">Name of the song</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" id="t2" name="title2" placeholder="The title of the second song.." required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="a2">Author</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" id="a2" name="author2" placeholder="Second author.." required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="l2">Length of the song (in minutes) </label>
                                </div>
                                <div class="col-75">
                                    <input type="number" id="l2" name="length2" min="1" placeholder="Second length..." required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="tags2">Tags for the song (Write "," between them)</label>
                                </div>
                                <div class="col-75">
                                    <input type="text" id="tags2" name="tags2" placeholder="Second song tags.." required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="g2">Genre of the second song</label>
                                </div>
                                <div class="col-75">
                                    <select id="g2" name="genre2" required>
                                <option value="none">None</option>
                                <option value="rock">Rock</option>
                                <option value="pop">Pop</option>
                                <option value="electronic">Electronic</option>
                                <option value="rb">R&B</option>
                                <option value="latin">Latin</option>
                                <option value="reggae">Reggae</option>
                            </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="c2">Comments for the second song (Write "+" between them) </label>
                                </div>
                                <div class="col-75">
                                    <textarea id="c2" name="comments2" placeholder="Write something.." style="height:50px" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="send-button">
                    <button class="btn-2" type="submit" name="submit"><strong>SEND THE
                        INFORMATION</strong></button>
                </div>
            </form>
        </div>
        <script>
            function changeWindow(newWindow) {
                window.location.href = newWindow;
            }
        </script>
        <?php
            if(isset ($_GET["error"])){
                sleep(3);
                echo "<script>
                        changeWindow('/MVC-Project/public/compare');
                        </script> ";
            }
            

          if(isset($_GET["submit"])){
              
              $title1 = $_GET["title1"];
              checkStr($title1);
              $author1 = $_GET["author1"];
              checkStr($author1);
              $length1 = $_GET["length1"];
              checkStr($length1);
              $tags1 = $_GET["tags1"];
              checkStr($tags1);
              $genre1 = $_GET["genre1"];
              checkStr($genre1);
              $comments1 = $_GET["comments1"];
              checkStr($comments1);
      
              $title2 = $_GET["title2"];
              checkStr($title2);
              $author2 = $_GET["author2"];
              checkStr($author2);
              $length2 = $_GET["length2"];
              checkStr($length2);
              $tags2 = $_GET["tags2"];
              checkStr($tags2);
              $genre2 = $_GET["genre2"];
              checkStr($genre2);
              $comments2 = $_GET["comments2"];
              checkStr($comments2);

    
              $data = array($title1, $author1, $length1, $tags1, $genre1, $comments1, $title2, $author2, $length2, $tags2, $genre2, $comments2);
              
              if(!empty($title1) &&!empty($author1) &&!empty($length1) &&!empty($tags1) &&!empty($genre1) &&!empty($comments1) &&!empty( $title2) &&!empty($author2) &&!empty($length2) &&!empty($tags2) &&!empty($genre2) &&!empty($comments2)){
                  $_SESSION['info'] = $data;
                  echo "<script>
                        changeWindow('/MVC-Project/public/compare/result');
                        </script> ";
              }
              
          }
        function checkStr($string){   
            $scr="<script>";
            if(strpos($string, $scr) !== false){
                   echo "<script>
                        changeWindow('/MVC-Project/public/compare?error=triedToHack');
                        </script> ";
                    exit();
                        
            }
            
            
        }
          ?>
    </body>

    </html>