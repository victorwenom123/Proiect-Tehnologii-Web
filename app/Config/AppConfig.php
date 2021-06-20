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
    const MYSQL_USER = "root";
    const MYSQL_PASS = "";
    const MYSQL_DB = "music-engine";

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
}