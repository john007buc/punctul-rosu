<?php
/**
 * Router
 */
class Router implements iRouter
{
	/**
     * Defualts constants
     */

    protected $controller=iRouter::DEFAULT_CONTROLLER;
    protected $action=iRouter::DEFAULT_ACTION;
    protected $error_controller=iRouter::DEFAULT_ERROR_CONTROLLER;
    protected $module=iRouter::DEFAULT_MODULE;
    protected $base=iRouter::BASE;
    protected $language=DEFAULT_LANGUAGE;
    protected $params=array();

    /**
     * @var Router
     */
    private static $thisInstance;

	/**
     * Constructor
     */
	private function __construct()
	{
	}

    /**
     * @static
     * @return Router
     */
    static function getInstance()
    {
        if(!self::$thisInstance)
            self::$thisInstance=new self();

        return self::$thisInstance;
    }

    /**
     * @return mixed
     */
	
	public function parseAdress()
	{
		$path=($this->base!="")?(strpos($_SERVER['REQUEST_URI'],$this->base)===0)?substr($_SERVER['REQUEST_URI'], strlen($this->base)):false:$_SERVER['REQUEST_URI'];

        if($path===false || trim($path,'/')==""){
            $this->setController($this->controller);
            $this->setAction($this->action);
            return $this;
        }

        /***************If there exist a specific adress in url explode it in an array*******************/
        $pathArray=explode('/',trim($path,'/'));

        if(defined('MULTILANGUAGE_MODULE')){
            $this->language=$pathArray[0];
            $start_position=1;
        }
        else{
            $start_position=0;
        }

		if(count($pathArray)== $start_position)
		{
			$this->setController($this->controller);
			$this->setAction($this->action);
            return $this;
		}
		elseif (count($pathArray)== ($start_position+1)) {
			$this->setController($pathArray[$start_position]);
			$this->setAction($this->action);
            return $this;
		}
		elseif (count($pathArray)== ($start_position+2)) {
			$this->setController($pathArray[$start_position]);
			$this->setAction($pathArray[($start_position+1)]);
            return $this;
		}
		else {
			$params=array_slice($pathArray, $start_position+2);
			$this->setParams($params);
			$this->setController($pathArray[$start_position]);
			$this->setAction($pathArray[$start_position+1]);
            return $this;
		}
	}

    /**
     * @param string $controller
     * @return Router
     */
	public function setController($controller)
	{
		$controller=ucfirst(strtolower($controller))."Controller";
		if(class_exists($controller)){
            $this->controller=$controller;
        } else{
            $this->setController($this->error_controller);
        }
		return $this;
	}

    /**
     * @param string $action
     * @return Router
     */
	public function setAction($action)
	{
      if(strpos($action,'-')!==false){
        $action=str_replace('-','_',$action);
      }
		$reflector = new ReflectionClass($this->controller);
		
		if($reflector->hasMethod($action)){
            $this->action=$action;
        }else{
            //Call for ErrorController
            $this->setController($this->error_controller);

            //If Error controller doesn't include index method,stop the execution process
            $reflector = new ReflectionClass($this->controller);
            if(!$reflector->hasMethod("index")){
                echo "<h1>Probleme Gogule?</h1>";
                exit();
            }
        }
     return $this;
	}

    /**
     * @param string $params
     * @return Router
     */
	public function setParams($params)
	{
		$this->params=$params;
		return $this;
	}

    /**
     * @param array $options
     * @return void
     */
	public function run($options=array())
	{
        if(empty($options)){
            $this->parseAdress();
        }else{
                if(isset($options['controller'])){
                    $this->setController($options['controller']);
                }

                if(isset($options['action'])){
                    $this->setAction($options['action']);
                }

                if(isset($options['params'])){
                    $this->setParams($options['params']);
                }
        }

        //Setting the global language file and the global language parametter in idex.php
        if(defined('MULTILANGUAGE_MODULE')){
            $this->set_language_file();
        }


		call_user_func_array(array(new $this->controller,$this->action),$this->params);
	}

    /**
     * Set the language file for multilanguage mode.
     * Set the global language variabile (located in index.php)
     *
     * @return void
     */
    public function set_language_file()
    {
        $db_user=EasyContainer::getInstance()->user;
        if(file_exists(LANGUAGE_FOLDER."/{$this->language}.conf"))
        {
           $GLOBALS['language_file']=LANGUAGE_FOLDER."/{$this->language}.conf";
           global $language;
           $language=$this->language;

            /*****************************************************************/
            /*Get the country id for future database interogations*/
            if(!isset($GLOBALS['country_id'][$this->language])){
                $GLOBALS['country_id'][$this->language]= $db_user->get_country_id($this->language);
            }
           // var_dump($GLOBALS['country_id'][$this->language]);
            /************************************************************************************/
        }
        else{
            $this->setController($this->error_controller);
            $this->action="index";
           // $GLOBALS['language_file']=LANGUAGE_FOLDER."/".DEFAULT_LANGUAGE.".conf";
            //$GLOBALS['country_id'][DEFAULT_LANGUAGE]= $db_user->get_country_id(DEFAULT_LANGUAGE);
        }
    }
}
?>