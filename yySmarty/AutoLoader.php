<?php
require_once("../application/configuration/iAutoLoader.php");
/**
 * Autoloader
 */
class AutoLoader implements iAutoLoader
{
	/**
     * The directories array where to search
     *
     * @var array
     */
      private $directories;

    /**
     * The formats to use in path recognition
     *
     * @var array
     */
      private $formats;

	
	/**
     * @var AutoLoader
     */
    private static $autoLoaderInstance;
	
	/**
     * constructor
     */
	private function __construct()
	{
        $this->directories=explode(",",iAutoLoader::FOLDERS);
        $this->formats=explode(",",iAutoLoader::FORMATS);
	}

    /**
     * @static
     * @return AutoLoader
     */
	static function getInstance()
	{
		if(!self::$autoLoaderInstance)
		self::$autoLoaderInstance=new self();
		
		return self::$autoLoaderInstance;
	}

    /**
     * Register the autoload function
     *
     * @return void
     */
	public function begin()
	{
		spl_autoload_register(array($this,"autoLoad"));
	}
	
	/**
     * @param string $className
     * @return void
     */
	protected function autoLoad($className)
	{
		foreach($this->directories as $dir)
		{
			foreach($this->formats as $format)
			{
			  $path1=$dir.sprintf($format,$className);
              $path2=$dir.sprintf($format,strtolower($className));

			  if(file_exists($path1)){
                 require_once($path1);
              }else if(file_exists($path2)){
                 require_once($path2);
              }

			}
		}
	}
}

?>