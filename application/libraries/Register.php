<?php
/**
 * Register users using User class.
 *
 */
class Register
{
    public $db_user;
    public $first_name;
    public $last_name;
    public $email;
    public $password1;
    public $password2;
    public $errors;
    public $hash;
    public $language;
    public $language_id;
    public $language_file;
    public $user_id;


    public function __construct(User $user,ReadConf $language_file)
    {
        $this->db_user=$user;
        $this->language_file=$language_file;
        $this->first_name=$_POST['first_name'];
        $this->last_name=$_POST['last_name'];
        $this->email=$_POST['email'];
        $this->password1=$_POST['password1'];
        $this->password2=$_POST['password2'];
        $errors=array();
        $this->language=$GLOBALS['language'];
        $this->language_id=$GLOBALS['country_id'][$this->language];
        $this->hash=md5(rand(0,1000));
    }

    public function process()
    {
       if($this->validate()){
           $result=$this->db_user->add_user($this->language_id,$this->first_name, $this->last_name,$this->email,$this->password1,$this->hash);
           if($result){
              $this->user_id=$result;
              return true;
           }else{
               $this->errors['add_user']="Database connection error";
               return false;
           }
       }else{
           return false;
       }

    }

    public function validate()
    {
        if(!preg_match("/^[a-zA-Z0-9-_]{1,}$/", $this->first_name)){
            $this->errors['first_name']=$this->language_file->getParam("first_name_error");
        }

        if(!preg_match("/^[a-zA-Z0-9-_]{1,}$/",$this->last_name)){
            $this->errors['last_name']=$this->language_file->getParam("last_name_error");
        }

        if(!filter_var($this->email,FILTER_VALIDATE_EMAIL)){
            $this->errors['email']=$this->language_file->getParam("email_error");
        }

        if((strlen($this->password1)<6 || strlen($this->password2)<6) || ($this->password1!=$this->password2)){
            $this->errors['password']=$this->language_file->getParam("password_error");
        }
        return ((count($this->errors)==0)?true:false);
    }

    public function get_errors()
    {
        return $this->errors;
    }

}

?>