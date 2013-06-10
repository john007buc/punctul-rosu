<?php
class ContactController extends Controller{

    public function __construct()
    {
        parent::__construct();
        Session::start();
        $this->language_file=new ReadConf($GLOBALS['language_file']);
    }

    /**
     *Contact form
     *Send the form to adiministrator email
     *
     * @return void
     */
    public function index()
    {
        //$this->language_file->getParam("send_email");
      if(!empty($_POST))
      {
          $messages=array();
          if(strlen($_POST['name'])<1){

              $messages[]=$this->language_file->getParam("first_name_error");
          }

          if(strlen($_POST['subject'])<1){
              $messages[]=$this->language_file->getParam("subject_error");
          }

          if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
              $messages[]=$this->language_file->getParam("email_error");
          }


          if(strlen($_POST['message'])<10){
              $messages[]=$this->language_file->getParam("message_error");
          }

          Session::start();
          $secure_code=Session::get("secure_code");

          if(empty($_POST['secure']) || $_POST['secure']!=$secure_code ){
              $messages[]=$this->language_file->getParam("captcha_error");
          }

          if(empty($messages)){
              $name=htmlspecialchars($_POST['name']);
              $email=htmlspecialchars($_POST['email']);
              $subject=htmlspecialchars($_POST['subject']);
              $user_msg=htmlspecialchars($_POST['message']);

              $email_messages=<<<EOT
              Aveti un mesaj primit de la APTIO:</br>
              Nume utilizator: {$name}<br/>
              Email utilizator:{$email}<br/>
              Subiect:{$subject}<br/>
              Mesaj:{$user_msg}

EOT;
              if($this->send_email("john007buc@yahoo.com",$email_messages)){
                  $messages=$this->language_file->getParam("contact_message_ok");

                  unset($_POST);
              }
              else{
                  $messages=array("Email sending error!");
              }
          }
       $this->smarty->render("contact/index",array("messages"=>$messages));
      }else{
          $this->smarty->render("contact/index");
      }
    }

    /**
     * send email
     *
     * @param string $email
     * @param string $message
     * @return bool
     */
    private function send_email($email,$message)
    {

        $mail = new PHPMailer();

        // set mailer to use SMTP
        $mail->IsSMTP();

        // As this email.php script lives on the same server as our email server
        // we are setting the HOST to localhost
        $mail->Host = "mail.aptio.ro";  // specify main and backup server

        $mail->SMTPAuth = true;     // turn on SMTP authentication

        // When sending email using PHPMailer, you need to send from a valid email address
        // In this case, we setup a test email account with the following credentials:
        // email: send_from_phpmailer@bradm.inmotiontesting.com
        // pass: password
        $mail->Username = "no-replay@aptio.ro";  // SMTP username
        $mail->Password = "elIilT^zO){1"; // SMTP password

        // $email is the user's email address the specified
        // on our contact us page. We set this variable at
        // the top of this page with:
        // $email = $_REQUEST['email']

        $mail->From = "no-replay@aptio.ro";
        $mail->FromName="AMIO";

        // below we want to set the email address we will be sending our email to.
        $mail->AddAddress($email, "APTIO MESSAGE");

        // set word wrap to 50 characters
        $mail->WordWrap = 50;
        // set email format to HTML
        $mail->IsHTML(true);

        $mail->Subject = "AMIO CONTACT FORM MESSAGE";

        //$message="Thank you for registration. To activate your account click the link: ";
        //$message.="<a href='http://localhost/iva/car-sharing/index/account_verification/$email/$hash'>http://localhost/iva/car-sharing/index/account-verification/$email/$hash</a>";

        $mail->Body    = $message;
        $mail->AltBody = $message;

        if(!$mail->Send()) {
            return false;
        } else {
            return true;
        }

    }

    /**************End of sending email************************************************************************/

}