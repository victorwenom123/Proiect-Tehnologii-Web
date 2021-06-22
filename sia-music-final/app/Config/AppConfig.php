<?php
namespace MusicEngine\CoreSystem;

class Config
{
    /**
     * Enable Error Reporting
     */
    const SHOW_ERRORS = true;


    /**
     * MySQL Data
     */

    const MYSQL_HOST = "localhost";
    const MYSQL_USER = "id17075936_admin";
    const MYSQL_PASS = "rhtg7UuYXXH!";
    const MYSQL_DB = "id17075936_music";

    /**
     * App Meta
     */

    const APP_NAME = "MusicEngine BETA";

    //No trailing slash
    const APP_URL = "https://sia-music-project.000webhostapp.com/music-engine";

    /**
     * Audio API
     */

    //include trailing slashes
    const AUDIO_API_URL = "https://sia-music-project.000webhostapp.com/music-engine/api/";
    
    /**
     * Last FM API
     */

    const LAST_FM_API = "05729d5eea07395a89f1641125f5803e";
    const LAST_FM_SECRET = "f0d1f8d64c76bb6b5221adeda8384bd4";


}