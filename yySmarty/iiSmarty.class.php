<?php
/**
 * iiSmarty
 */
 class iiSmarty extends Smarty  implements iSmartyInfo
 {
 	
	/**
     * Constructor
     *
     */
	public function __construct()
	{
        parent::__construct();

		//$this->smarty=new Smarty();
		//$this->smarty->compile_dir=iSmartyInfo::COMPILE_DIR;
		//$this->smarty->template_dir=iSmartyInfo::TEMPLATE_DIR;
		//$this->smarty->addTemplateDir(iSmartyInfo::LAYOUT_DIR);
		//$this->smarty->cache_dir=iSmartyInfo::CACHE_DIR;
		//$this->smarty->config_dir=iSmartyInfo::CONFIG_DIR;

        $this->compile_dir=iSmartyInfo::COMPILE_DIR;
        $this->template_dir=iSmartyInfo::TEMPLATE_DIR;
        $this->addTemplateDir(iSmartyInfo::LAYOUT_DIR);
        $this->cache_dir=iSmartyInfo::CACHE_DIR;
      //  $this->caching = 1;
        // Set the cache lifetime to 30 minutes.
        //$this->cache_lifetime = 1800;
	}
	
	/**
     * @param string $view
     * @param array $params
     * @return void
     */
	public function render($view,$params=null)
	{
		
		if(!is_null($params) && is_array($params))
		{
			
			foreach($params as $key=>$value)
			{
                $this->assign($key,$value);
            }
		}

        if(defined('BASE_PATH'))
            $this->assign('BASE_PATH',BASE_PATH);

        if(defined('ROOT'))
            $this->assign('ROOT',ROOT);

        //fisierul pentru language
        $this->assign('LANGUAGE_FILE',$GLOBALS['language_file']);

        $this->assign('LANGUAGE',$GLOBALS['language']);

        $this->display($view.".tpl");
		
	}
	
 }


?>