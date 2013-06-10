<?php
require_once '../yySmarty/AutoLoader.php';

//define("BASE_PATH","/");
//define("ROOT","/");

//on local host
define("BASE_PATH","/iva/amio/public/");
define("ROOT","/iva/amio/public/");
/*** Set multilanguage module in router class***/
define("MULTILANGUAGE_MODULE",true);

define("DEFAULT_LANGUAGE","ro");
define("LANGUAGE_FOLDER","languages");
$language_file="";
$language=DEFAULT_LANGUAGE;
$country_id=array();
$index_path="indexes";
$secure_code="";

//$conf['language_file']="languages/ro.conf";

//define("PUBLIC_DIR","/public/");
//define("BASE_URL","http://localhost");

AutoLoader::getInstance()->begin();
$ioc = EasyContainer::getInstance();
$ioc->DB=new DB();
/*$ioc->user=function($c){
   //$user=new User(DB::getInstance());
    $user=new User($c->DB);
    return $user;
};
$ioc->smarty=function($c){

    $smarty=new iiSmarty();
    return $smarty;
};*/
$ioc->user=new User($ioc->DB);
$ioc->admin=new Admin($ioc->DB);
$ioc->smarty=new iiSmarty();

//$ioc->user=new User(DB::getInstance());
Router::getInstance()->run();
?>