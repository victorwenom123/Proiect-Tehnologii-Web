<?php
session_start();
?>
    <!doctype html>

    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Compare page</title>
        <link rel="stylesheet" href="/MVC-Project/public/css/recommendations_style.css">
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
            <div class="form-container">
                <div class="forms">
                    <h2>We need some information about you!</h2>
                    <div class="formbox1">
                        <form class="form-1">
                            <div class="row">
                                <div class="col-25">
                                    <label for="pref">Preferences (genre of the song)</label>
                                </div>
                                <div class="col-75">
                                    <select id="pref" name="preferences">
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
                                    <label for="state">Choose the mood</label>
                                </div>
                                <div class="col-75">
                                    <select id="state" name="mood">
                <option value="none">None</option>
                <option value="happy">Happy</option>
                <option value="sad">Sad</option>
                <option value="angry">Angry</option>
                <option value="tired">Tired</option>
                <option value="relaxed">Relaxed</option>
                <option value="humorous">Humorous</option>
                <option value="reflective">Reflective</option>
                <option value="romantic">Romantic</option>
              </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="spot">Geographical locations (Write "," between them) </label>
                                </div>
                                <div class="col-75">
                                    <input type="text" id="spot" name="spot" placeholder="Countries/Regions of reference..">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="time">Date of song appearance </label>
                                </div>
                                <div class="col-75">
                                    <input type="date" id="time" name="theDate">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="age">Age </label>
                                </div>
                                <div class="col-75">
                                    <input type="number" id="age" name="age" placeholder="Age..">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="type">Habitat type</label>
                                </div>
                                <div class="col-75">
                                    <select id="type" name="habitat">
                              <option value="none">None</option>
                              <option value="rural">Rural</option>
                              <option value="urban">Urban</option>
                            </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="level">Educational level</label>
                                </div>
                                <div class="col-75">
                                    <select id="level" name="education">
                <option value="none">None</option>
                <option value="high">High</option>
                <option value="low">Low</option>
              </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="z">Zone type</label>
                                </div>
                                <div class="col-75">
                                    <select id="z" name="zone">
                <option value="none">None</option>
                <option value="mountain">Mountain</option>
                <option value="sea">Seaside</option>
              </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-25">
                                    <label for="e">Good for groups (in your entourage)</label>
                                </div>
                                <div class="col-75">
                                    <select id="e" name="entourage">
                <option value="yes">Yes</option>
                <option value="no">No</option>
              </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="send-button">
                        <button class="btn-2" onclick="window.location.href='/MVC-Project/public/recommendations/result'"><strong>SEND THE
            INFORMATION</strong></button>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>