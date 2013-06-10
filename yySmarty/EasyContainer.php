<?php
/**
 * EasyContainer
 *
 * Uses closures, so it doesn't work 100% in older version of PHP
 *
 * Can store objects and return same instance multiple times (emulate singleton pattern)
 */
class EasyContainer
{
   /**
    * An array for storring data
    *
    * @var array
    */
   private $registry;

    /**
     * Static variabile use in singleton pattern
     *
     * @var self
     */
   private static $this_instance;

    /**
     * Constructor
     *
     * Initilaize the container storage array
     */
    private function __construct()
    {

        $this->registry=array();
    }

    /**
     * Empty clone function to disallow clonning of this instance
     */
    private function __clone()
    {

    }

    /**
     * @static
     * @return EasyContainer
     */
    public static function getInstance()
    {
        if(!self::$this_instance)
            self::$this_instance=new self();

        return self::$this_instance;

    }

    /**
     * @param string $name
     * @param object|callback $value
     * @return void
     */
    public function __set($name,$value)
    {
            $this->registry[$name]=$value;
    }

    /**
     * @param string $name The name of the container element
     * @return object|null
     */
    public function __get($name)
    {

        if(array_key_exists($name,$this->registry) && isset($this->registry[$name]))
        {
            return is_callable($this->registry[$name])?$this->registry[$name]($this):$this->registry[$name];

        }
        else
            return null;
    }
}