<?php
namespace MusicEngine\Midleware;
use MusicEngine\CoreSystem\Config;

class Database
{

    /**
     * Initiate the MySQL Connection Here
     */


    public function connect()
    {
        $connection = mysqli_connect(Config::MYSQL_HOST,Config::MYSQL_USER,Config::MYSQL_PASS, Config::MYSQL_DB);
        if($connection)
        {
            /**
             * deal with romanian characters :
             */

            mysqli_set_charset( $connection, 'utf8'); 
            mysqli_query($connection,"SET NAMES 'utf8'");
            mb_internal_encoding('UTF-8');


            
            return $connection;
        }
        else
        {
            die("Unable to connect to the MySQL Server")." - ".mysqli_error($connection);
        }
        
    }
}
?>