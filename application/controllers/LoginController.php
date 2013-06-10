<?php
/**
 * Created by JetBrains PhpStorm.
 * User: YWA
 * Date: 5/16/13
 * Time: 9:42 PM
 * To change this template use File | Settings | File Templates.
 */
class LoginController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->db_user=$this->ioc->user;
    }

    public function index($errors=null)
    {

        if(!empty($_POST)){
            $conf=new ReadConf($GLOBALS['language_file']);

            $errors=array();
            if(!empty($_POST['email']) && filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
                $email=$_POST['email'];
            }else{
                $errors[]=$conf->getParam("email_error");
            }


            if(!empty($_POST['password'])){
                $password=$_POST['password'];
            }else{
                $errors[]=$conf->getParam("empty_password");
            }


            if(!empty($errors))
            {
                $error_msg=implode(",<br/>",$errors);
                //Router::getInstance()->run(array("controller"=>"login","action"=>"index","params"=>array($error_msg)));
                $this->smarty->render("login/index",array("errors"=>$error_msg));
                //header("Location:".BASE_PATH.$GLOBALS['language']."/login");
            }else{
                $db_user=$this->ioc->user;
                if($db_user->login_user($email,$password)){
                    header("Location:".BASE_PATH.$GLOBALS['language']);
                }else{
                    $login_error=$conf->getParam("login_error");
                    $this->smarty->render("login/index",array("errors"=>"Parola incorecta"));
                }

            }
        }else{
            //,array("errors"=>$errors)
            $this->smarty->render("login/index");
        }



    }


}
