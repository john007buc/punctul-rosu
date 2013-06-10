<?php
/**
 * Created by JetBrains PhpStorm.
 * User: YWA
 * Date: 5/31/13
 * Time: 3:58 PM
 * To change this template use File | Settings | File Templates.
 */
class Change_passwordController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->db_user=$this->ioc->user;
        $this->language_file=new ReadConf($GLOBALS['language_file']);
       // $this->language_file->getParam("send_email");
    }
    public function complete($recovery_id=null,$hash=null)
    {
        if(!empty($_POST)){
            if(strlen($_POST['password1'])<7 || strlen($_POST['password2'])<7 || $_POST['password2']!= $_POST['password1']){
                $errors=$this->language_file->getParam("password_error");
                //in caz de eroare retrimite din nou recovery_id si hash pentru a fi create cmapurile type[hidden]
                $this->smarty->render("change_password/complete",array("errors"=>$errors,"recovery_id"=>$_POST['recovery_id'],"hash"=>$_POST['hash']));
            }else{
                $update_ok=$this->db_user->reset_password($_POST['recovery_id'],$_POST['hash'],$_POST['password1']);


                if($update_ok){
                    header("Location:".BASE_PATH.$GLOBALS['language']."/login");
                }else{
                    $message=$this->language_file->getParam("recovery_password_error");
                    $this->smarty->render("change_password/complete",array("errors"=>$message));
                }
            }
        }elseif(!empty($recovery_id) && is_numeric($recovery_id) && !empty($hash)){
           //verifica daca linkul este expirat
            $not_expiration=$this->db_user->verify_recovery($recovery_id,$hash);
           //$db_hash=$this->db_user->get_user_hash_by_id($user_id);
           if($not_expiration>0){
               $this->smarty->render("change_password/complete",array("recovery_id"=>$recovery_id,"hash"=>$hash));
           }else{
              echo "The link is no more valid";
           }

        }else{
            header("HTTP/1.0 404 Not Found");
        }

    }

}