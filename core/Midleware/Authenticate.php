<?php
namespace MusicEngine\Midleware;
use MusicEngine\CoreSystem\Config;

class AuthenticateUtils extends Core
 {
     /**
      * Use the Database Conectivity
        */
        
       
      /**
       * Login functionality
       * Uses SHA512 Hashing
       */
      public function login($username,$password,$remember_me = false)
      {
          /**
           * Give access to 
           * MySQL Connection
           */

          $con = $this->connect();

          
          /**
           * Escape the string
           * Prevent SQL Injection
           */

          $username = mysqli_real_escape_string($con,$username);
          $password = mysqli_real_escape_string($con,$password);

            /**
             * Start hashing the password
             */

            $password = hash('sha512', $password . 'ENGINERSA1244');

             $get_data = mysqli_query($con,
                "SELECT id,status,user_rank FROM users WHERE username='$username' AND password='$password' OR email = '$username' AND password='$password' LIMIT 1");
    
                if (mysqli_num_rows($get_data) == 1) 
                {
                    $a = mysqli_fetch_assoc($get_data);
    
    
                    if ($a["status"] == "1") {
                        $user_id = $a["id"];
                        $user_rank = $a["user_rank"];
    
                        $this->register_session($user_id, $user_rank);

                        if($remember_me)
                        {
                            $this->remember_me();
                        }

                        return array("status" => true);
                    } 
                    else 
                    {
                    return array("status" => false, "error" => "Account is banned!");
                    }
    
                } 
                else 
                {
                     return array("status" => false, "error" => "Incorrect credentials!");
                }
      }

    /**
     * @return |null
     */

      public function remember_me()
      {
          $con = $this->connect();

          return null;
      }

      /**
       * Session Registering
       * Functionality
       */

    private function register_session($user_id,$user_rank)
    {
        $_SESSION["session_id"] = $this->generate_session_id();
        $_SESSION["user_id"] = $user_id;
        $_SESSION["user_rank"] = $user_rank;
        return true;
    }

    /**
     * Generate unique session_id
     */

    private function generate_session_id()
    {
        $ip = $_SERVER["REMOTE_ADDR"];
        $domain = $_SERVER["DOCUMENT_ROOT"];
        $date = date("Y-m-d");
    
        return base64_encode($ip . "_" . $domain . "_" . $date);
    }

    /**
     * Session ID Checking 
     * Functionality
     * Forces SessionID Checking 
     * and Generation
     */

    private function check_session()
    {
        if (isset($_SESSION["session_id"]) && !empty($_SESSION["session_id"])) 
        {
            if ($_SESSION["session_id"] == $this->generate_session_id()) 
            {
                return true;
            } 
            else 
            {
                return false;
            }
        } 
        else 
        {
            return false;
        }
    }

    /**
     * Returns Current Session
     * if exists
     */

     public function return_session()
     {
        $session_id = $this->generate_session_id();
        $check = $this->check_session();
    
        if (isset($_SESSION["user_id"]) && !empty($_SESSION["user_id"]) && !empty($_SESSION["session_id"])) {
            if ($check == true) 
            {
                return array(
                    "status" => "true",
                    "user_id" => $_SESSION["user_id"],
                    "user_rank" => $_SESSION["user_rank"],
                    "session_id" => $_SESSION["session_id"],
                    );
            } 
            else 
            {
                return array("status" => "false");
            }
    
        } 
        else 
        {
            return array("status" => "false");
        }
     }

     /**
      * URL Redirect Utility
      */
      public function url_redirect($url)
      {
          if (!headers_sent()) 
          {
          header('Location: ' . $url);
          } 
          else 
          {
              $content = '<script type="text/javascript">';
              $content .= 'window.location.href="' . $url . '";';
              $content .= '</script>';
              $content .= '<noscript>';
              $content .= '<meta http-equiv="refresh" content="0;url=' . $url . '" />';
              $content .= '</noscript>';
                  echo $content;
          }
      }
     /**
      * Destroy all sessions
      * Logout Functionality
      */

      public function logout()
      {
          $session  = $this->return_session();
          if($session["status"]  == "true")
          {
              session_destroy();
              return true;
          }
          else
          {
              return true;
          }
      }

      /**
     * Compares the existing user rank to an expected user rank 
     * and redirect the user to a logout page
     * Useful for securing pages that require
     * some kind of security
     * @expected_rank = the rank that can only access the page
     * @expected_rank  = array of user ranks as in admin,agent
     */


    public function secure_page($expected_rank = "admin")
    {
        /**
         * Grabs the current session
         */
            $session = $this->return_session();

           if(!empty($expected_rank))
            {
            /**
             * Checks the current session
             */
            if($session["status"] == "false")
            {
                $this->url_redirect(Config::APP_URL."/login");
            }
            else
            {
                /**
                 * Checks the session rank against
                 * the expected rank
                 */

                if(is_array($expected_rank))
                {
                    if(in_array($session["user_rank"],$expected_rank))
                    {
                        return true;
                    }
                    else
                    {
                        $this->url_redirect(Config::APP_URL);
                    }
                }
                else
                {
                    if($session["user_rank"] != $expected_rank)
                    {
                        $this->url_redirect(Config::APP_URL);
                    }
                    else
                    {
                        return true;
                    }
                }
            }
        }
        else
        {
            if($session["status"] == "false")
            {
                $this->url_redirect("login.php");
            }
            else
            {
                return true;
            }
        }
    }

 }

?>