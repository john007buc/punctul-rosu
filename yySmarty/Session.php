<?php
/**
 * Session
 */
class Session
{
    /**
     * Variabile for storing the state of session
     *
     * @var bool
     */
    private static $session_started=false;

    /**
     * @static
     * @return void
     */
    public static function start()
    {
        if(!self::$session_started)
        {
          session_start();
          self::$session_started=true;
        }
    }

    /**
     * @static
     * @param string $key
     * @param string|object $value
     * @return void
     */

    public static function set($key,$value)
    {
        $_SESSION[$key]=$value;
    }

    /**
     * @static
     * @param string $key
     * @param null|string $array_key
     * @return null|string|array
     */

    public static function get($key,$array_key=null)
    {

         if(!is_null($array_key))
         {

             return (isset($_SESSION[$key][$array_key]))?$_SESSION[$key][$array_key]:null;

         }
          else
          {
             return (isset($_SESSION[$key]))?$_SESSION[$key]:null;
          }

     }

    /**
     * @static
     * @return void
     */

    public static function destroy()
    {
        if(self::$session_started)
            session_destroy();
    }

    /**
     * @static
     * @param string $session_name
     * @return void
     */
    public static function clear_session($session_name)
    {
        if(isset($_SESSION[$session_name]))
            unset($_SESSION[$session_name]);


    }

}

?>