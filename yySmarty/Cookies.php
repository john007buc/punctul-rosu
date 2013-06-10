<?php
/**
 * Cookies
 */
class Cookies
{
    /**
     * @static
     * @param string $name
     * @param string|int $value
     * @param int|float $expire
     * @param string $domain
     * @return void
     */

    public static function set($name,$value,$expire,$domain=BASE_PATH)
    {

      setcookie($name,$value,time()+$expire,$domain);
    }

    /**
     * @static
     * @param string $name
     * @return void
     */
    public static function destroy($name)
    {
        $value=self::get($name);
        setcookie($name,$value,time()- 3600*24*90,BASE_PATH);
    }

    /**
     * @static
     * @param string $name
     * @return null|string|int|float
     */
    public static function get($name)
    {
          return (isset($_COOKIE[$name]))?($_COOKIE[$name]):null;
    }

}

?>