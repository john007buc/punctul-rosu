<?php
//require_once("classes/iiSmarty.class.php");

class IndexController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

	public function index ($form_message=null,$params=null)
	{
      Session::start();
      $this->smarty->render("index/index");
      // iiSmarty::getInstance()->render("index/index",array("nume"=>"carsharing",'message'=> FlashMessenger::getMessage()));
	}
    public function account_verification($user_id,$hash)
    {
        $db_user=$this->ioc->user;
        if($db_user->activate_user($user_id,$hash)){
            $lang=$GLOBALS['language'];
            header("Location:".BASE_PATH.$lang."/");
        }else{
            echo "<h1>Verification process failed</h1>";
            exit(1);
        }
    }
}

?>