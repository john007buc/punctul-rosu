<?php

class RegisterController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->db_user=$this->ioc->user;
    }

    public function index()
    {
        if(isset($_POST['Submit'])){
            $language_file=new ReadConf($GLOBALS['language_file']);
            //get params for register
           $register=new Register($this->db_user,$language_file);
           if($register->process()){
               $user_id=$register->user_id;
               $email=$register->email;
               $hash=$register->hash;
               $lang=$GLOBALS['language'];


               $message_email=$language_file->getParam("activation_message");
               $message_email.="<a href='http://www.amio.biz/{$lang}/index/account_verification/$user_id/$hash'>http://www.amio.biz/{$lang}/index/account-verification/$user_id/$hash</a>";
               $email_ok=Email::send($email,$message_email);

               if($email_ok){
                  $registration_message=$language_file->getParam("registration_message");
               }else{
                     $registration_message="Activation account problem. Contact the administrator";
               }
               $this->smarty->render("register/index",array("registration_message"=>$registration_message));
           }else{
               $errors=$register->get_errors();
               $this->smarty->render("register/index",array("errors"=>$errors));
           }
        }else{
            $this->smarty->render("register/index");
        }
    }

}
?>