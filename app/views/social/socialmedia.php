<?php
session_start();
?>
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>social media demo page</title>
        <link rel="stylesheet" href="/MVC-Project/public/css/socialmedia_style.css">
    </head>

    <body>
        <div class="hero">
            <div class="navbar">
                <a href="/MVC-Project/public/home">
                    <img src="/MVC-Project/public/css/images/logo2.png" alt="logo" class="logo" width="200" height="62">
                </a>
                <div class="buttons">
                    <button class="btn-1" onclick="window.location.href='/MVC-Project/public/home'"><strong>Home</strong></button>
                    <button class="btn-1" onclick="window.location.href='/MVC-Project/public/login'"><strong>Back</strong></button>
                </div>
            </div>
            <div class="live">
                <div class="person">
                    <div class="profile-pic"></div>
                    <p class="name">Andrei</p>
                </div>
                <div class="person">
                    <div class="profile-pic"></div>
                    <p class="name">Victor</p>
                </div>
                <div class="person">
                    <div class="profile-pic"></div>
                    <p class="name">Cristi</p>
                </div>
                <div class="person">
                    <div class="profile-pic"></div>
                    <p class="name">Marius</p>
                </div>
                <div class="person">
                    <div class="profile-pic"></div>
                    <p class="name">Maria</p>
                </div>
                <div class="person">
                    <div class="profile-pic"></div>
                    <p class="name">Alex</p>
                </div>
                <div class="person">
                    <div class="profile-pic"></div>
                    <p class="name">Paul</p>
                </div>
                <div class="person">
                    <div class="profile-pic"></div>
                    <p class="name">Laura</p>
                </div>

            </div>
            <div class="tweet">
                <form>
                    <div class="form-top">
                        <label for="c1"><strong>What are you thinking about? </strong></label>
                        <div class="send-button">
                            <input class="btn-2" type="submit" value="POST!">
                        </div>
                    </div>
                    <textarea id="c1" name="comments1" placeholder="Write a tweet..."></textarea>
                </form>
            </div>
            <div class="newsfeed">
                <div class="news-head">
                    <h4>Newsfeed</h4>
                </div>
                <div class="card">
                    <div class="picture"></div>
                    <div class="content">
                        <div class="hrader">
                            <div class="profile-pic"></div>
                            <div class="details">
                                <p class="name">Song-recommander-bot</p>
                                <p class="posted">1 day ago</p>
                            </div>
                        </div>
                        <div class="desc">
                            <!--Random text generate-->
                            In show dull give need so held. One order all scale sense her gay style wrote. Incommode our not one ourselves residence. Shall there whose those stand she end. So unaffected partiality indulgence dispatched to of celebrated remarkably. Unfeeling are
                            had allowance own perceived abilities.<br> Started his hearted any civilly. So me by marianne admitted speaking. Men bred fine call ask. Cease one miles truth day above seven. Suspicion sportsmen
                            provision suffering mrs saw engrossed something. Snug soon he on plan in be dine some.
                        </div>
                        <div class="tags">
                            <span>#saudio</span>
                            <span>#project</span>
                        </div>

                        <div class="footer">
                            <div class="like">
                                <img src="/MVC-Project/public/css/images/like.png" alt="like" width="20" height="20">
                                <span>120k</span>
                            </div>
                            <div class="comment">
                                <img src="/MVC-Project/public/css/images/com.png" alt="comm" width="20" height="20">
                                <span>20k</span>
                            </div>
                            <div class="share">
                                <img src="/MVC-Project/public/css/images/share.png" alt="share" width="20" height="20">
                                <span>13k</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="picture"></div>
                    <div class="content">
                        <div class="hrader">
                            <div class="profile-pic"></div>
                            <div class="details">
                                <p class="name">Song-recommmander-bot</p>
                                <p class="posted">1 day ago</p>
                            </div>
                        </div>
                        <div class="desc">
                            <strong>Tones and I - Dance Monkey</strong><br>
                            <!--Random text generate-->

                            In show dull give need so held. One order all scale sense her gay style wrote. Incommode our not one ourselves residence. Shall there whose those stand she end. So unaffected partiality indulgence dispatched to of celebrated remarkably. Unfeeling are
                            had allowance own perceived abilities.<br> Started his hearted any civilly. So me by marianne admitted speaking. Men bred fine call ask. Cease one miles truth day above seven. Suspicion sportsmen
                            provision suffering mrs saw engrossed something. Snug soon he on plan in be dine some.
                        </div>
                        <div class="tags">
                            <span>#saudio</span>
                            <span>#project</span>
                        </div>

                        <div class="footer">
                            <div class="like">
                                <img src="/MVC-Project/public/css/images/like.png" alt="like" width="20" height="20">
                                <span>120k</span>
                            </div>
                            <div class="comment">
                                <img src="/MVC-Project/public/css/images/com.png" alt="comm" width="20" height="20">
                                <span>20k</span>
                            </div>
                            <div class="share">
                                <img src="/MVC-Project/public/css/images/share.png" alt="share" width="20" height="20">
                                <span>13k</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>