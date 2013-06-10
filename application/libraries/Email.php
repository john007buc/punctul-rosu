<?php
/**
 * Created by JetBrains PhpStorm.
 * User: YWA
 * Date: 5/16/13
 * Time: 8:12 PM
 * To change this template use File | Settings | File Templates.
 */
class Email
{
  public static function send($email,$message)
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

      $mail->From = "no-replay@amio.ro";
      $mail->FromName="AMIO";

      // below we want to set the email address we will be sending our email to.
      $mail->AddAddress($email, "Amio user");

      // set word wrap to 50 characters
      $mail->WordWrap = 50;
      // set email format to HTML
      $mail->IsHTML(true);

      $mail->Subject = "AMIO ACTIVATION ACCOUNT";

      //$message="Thank you for registration. To activate your account click the link: ";
      //$message.="<a href='http://localhost/iva/car-sharing/index/account_verification/$email/$hash'>http://localhost/iva/car-sharing/index/account-verification/$email/$hash</a>";

      $mail->Body    = $message;
      $mail->AltBody = $message;


      $result = $mail->Send();
      return $result;
  }

}
