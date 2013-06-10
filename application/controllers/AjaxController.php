<?php
/**
 * Get the ajax request
 *
 * AjaxController
 */
class AjaxController extends Controller
{
    /**
     * Connstructor
     */
    public function __construct(){
        parent::__construct();
        $this->db_user=$this->ioc->user;
        $this->language_file=new ReadConf($GLOBALS['language_file']);
        Session::start();
    }

   /**
    * Get the game params send through ajax call
    */
   public function game_data()
   {
       $sParam = $_POST["parametri"];
       $nPozitie = 0;

       $param_data = substr($sParam, $nPozitie, 10);
       $nPozitie += 10;

       $param_idjoc = $this->DecodificaHexa(substr($sParam, $nPozitie, 2));
       $nPozitie += 2;

       $param_subtip = $this->DecodificaHexa(substr($sParam, $nPozitie, 2));
       $nPozitie += 2;

       $param_dificultate = $this->DecodificaHexa(substr($sParam, $nPozitie, 2));
       $nPozitie += 2;

       $param_numar_exercitii = $this->DecodificaHexa(substr($sParam, $nPozitie, 2));
       $nPozitie += 2;

       $param_raspunsuri_corecte = $this->DecodificaHexa(substr($sParam, $nPozitie, 2));
       $nPozitie += 2;

       $param_cel_mai_rapid_raspuns = $this->DecodificaHexa(substr($sParam, $nPozitie, 2)) * 256.0;
       $nPozitie += 2;
       $param_cel_mai_rapid_raspuns += $this->DecodificaHexa(substr($sParam, $nPozitie, 2));
       $nPozitie += 2;
       $param_cel_mai_rapid_raspuns /= 10.0;

       $param_cel_mai_lent_raspuns = $this->DecodificaHexa(substr($sParam, $nPozitie, 2)) * 256.0;
       $nPozitie += 2;
       $param_cel_mai_lent_raspuns += $this->DecodificaHexa(substr($sParam, $nPozitie, 2));
       $nPozitie += 2;
       $param_cel_mai_lent_raspuns /= 10.0;

       $param_timp_mediu_de_raspuns = $this->DecodificaHexa(substr($sParam, $nPozitie, 2)) * 256.0;
       $nPozitie += 2;
       $param_timp_mediu_de_raspuns += $this->DecodificaHexa(substr($sParam, $nPozitie, 2));
       $nPozitie += 2;
       $param_timp_mediu_de_raspuns /= 10.0 * $param_raspunsuri_corecte;

       $param_scor = $this->DecodificaHexa(substr($sParam, $nPozitie, 2)) * 256.0;
       $nPozitie += 2;
       $param_scor += $this->DecodificaHexa(substr($sParam, $nPozitie, 2));
       $nPozitie += 2;

       // === PARAMETRI ===
       /*
               $param_data						data si ora, in format AALLZZOOMM (an, luna, zi, ora, minut)
               $param_idjoc					ID joc ( == 1)
               $param_subtip					nefolosit
               $param_dificultate				nivel de dificultate
               $param_numar_exercitii			numar de exercitii
               $param_raspunsuri_corecte		raspunsuri corecte
               $param_cel_mai_rapid_raspuns	cel mai rapid raspuns
               $param_cel_mai_lent_raspuns		cel mai lent raspuns
               $param_timp_mediu_de_raspuns	timp mediu de raspuns
               $param_scor						scor
       */


       $user_id=Session::get("user_id");
       //$str1= "param_idjoc-".$param_idjoc."<br/>param-subtim->".$param_subtip."<br/>param_dificultate->".$param_dificultate."<br/>param_raspunsuri_corecte".$param_raspunsuri_corecte;
       //$str2="<br/>param_cel_mai_rapid_raspuns->".$param_cel_mai_rapid_raspuns."<br/>param_cel_mai_lent_raspuns->".$param_cel_mai_lent_raspuns."<br/>param_timp_mediu_de_raspuns->".$param_timp_mediu_de_raspuns."<br/>param_scor->".$param_scor;

       $success=$this->db_user->save_game_param($user_id,$param_idjoc,$param_subtip,$param_dificultate,$param_raspunsuri_corecte,$param_cel_mai_rapid_raspuns,$param_cel_mai_lent_raspuns,$param_timp_mediu_de_raspuns,round($param_scor,2));
       if($success){
          $cat=$this->db_user->get_category_by_game_id($param_idjoc);
          $game_cat=$this->language_file->getParam($cat);
          $this->send_results($game_cat,$param_idjoc,$param_dificultate,$param_numar_exercitii,$param_raspunsuri_corecte,round($param_cel_mai_rapid_raspuns,2),round($param_cel_mai_lent_raspuns,2),round($param_timp_mediu_de_raspuns,2),round($param_scor,2));
          echo $this->language_file->getParam("send_email");
       }
   }

    /**
     * Decodification
     * @param $l_sOctet
     * @return int
     */
    public function DecodificaHexa($l_sOctet)
    {
        $nCifra1 = ord($l_sOctet[0]);
        if ($nCifra1 >= 97) $nCifra1 -= 87;
        else
            if ($nCifra1 >= 65) $nCifra1 -= 55;
            else $nCifra1 -= 48;
        $nCifra2 = ord($l_sOctet[1]);
        if ($nCifra2 >= 97) $nCifra2 -= 87;
        else
            if ($nCifra2 >= 65) $nCifra2 -= 55;
            else $nCifra2 -= 48;
        return $nCifra1 * 16 + $nCifra2;
    }



    /**
     * Send emails with game results
     *
     * @param string $game_cat
     * @param int $param_idjoc
     * @param int $param_dificultate
     * @param int $param_numar_exercitii
     * @param int $param_raspunsuri_corecte
     * @param float $param_cel_mai_rapid_raspuns
     * @param float $param_cel_mai_lent_raspuns
     * @param float $param_timp_mediu_de_raspuns
     * @param float $param_scor
     * @return bool
     */
    public function send_results($game_cat,$param_idjoc,$param_dificultate,$param_numar_exercitii,$param_raspunsuri_corecte,$param_cel_mai_rapid_raspuns,$param_cel_mai_lent_raspuns,$param_timp_mediu_de_raspuns,$param_scor)
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
        $email_to=Session::get("email");
        $user_name=Session::get("first_name");
        $user_name.=" ".Session::get("last_name");
        // below we want to set the email address we will be sending our email to.
        $mail->AddAddress($email_to, "Amio user");

        // set word wrap to 50 characters
        $mail->WordWrap = 50;
        // set email format to HTML
        $mail->IsHTML(true);

        $mail->Subject = "Amio results";

        // $message is the user's message they typed in
        // on our contact us page. We set this variable at
        // the top of this page with:
        // $message = $_REQUEST['message'] ;
        $salut=$this->language_file->getParam("hi");
        $thanks=$this->language_file->getParam("thanks");
        $param=$this->language_file->getParam("param");
        $value=$this->language_file->getParam("value");
        $game_id=$this->language_file->getParam("game_id");
        $category=$this->language_file->getParam("category");
        $dificulty=$this->language_file->getParam("dificulty");
        $exercises_number=$this->language_file->getParam("exercises_numbers");
        $correct_responses=$this->language_file->getParam("correct_responses");
        $fastest_response=$this->language_file->getParam("fastest_response");
        $lowest_response=$this->language_file->getParam("lowest_response");
        $response_avg_time=$this->language_file->getParam("response_avg_time");
        $score=$this->language_file->getParam("score");

        $message = '<html><head> <style type="text/css"> table td,th{border:1px solid #BDBDBD;padding:2px;} </style></head><body>';
        $message.='<div style="width:400px;margin:5px auto;text-align: center"><img src="http://www.amio.biz/images/logo.png" alt="Amio.biz result" align="middle"/>';
        $message .= "<h1>{$salut}, {$user_name}!</h1>";
        $message .= "<h3>{$thanks}</h3>";
       // $message.="<table style='margin-left: auto;margin-right: auto;border-collapse: collapse;padding:10px'><tr style='background-color:#dedede;border: 1px solid red;'><th>Parametru</th><th>Data nasterii</th><th>Zodia europeana</th><th>zodia chinezeasca</th></tr>";
        $message.="<table style='margin-left: auto;margin-right: auto;border-collapse: collapse;padding:10px'><tr style='background-color:#dedede;border: 1px solid red;'><th>Parametru</th><th>Valoare</th></tr>";
        $message.="<tr><td>{$category}</td><td>{$game_cat}</td></tr>";
        $message.="<tr><td>{$game_id}</td><td>{$param_idjoc}</td></tr>";
        $message.="<tr><td>{$dificulty}</td><td>{$param_dificultate}</td></tr>";
        $message.="<tr><td>{$exercises_number}</td><td>{$param_numar_exercitii}</td></tr>";
        $message.="<tr><td>{$correct_responses}</td><td>{$param_raspunsuri_corecte}</td></tr>";
        $message.="<tr><td>{$fastest_response}</td><td>{$param_cel_mai_rapid_raspuns}</td></tr>";
        $message.="<tr><td>{$lowest_response}</td><td>{$param_cel_mai_lent_raspuns}</td></tr>";
        $message.="<tr><td>{$response_avg_time}</td><td>{$param_timp_mediu_de_raspuns}</td></tr>";
        $message.="<tr><td>{$score}</td><td>{$param_scor}</td></tr>";
        $message.="</table>";
        $mail->Body    = $message;
        $mail->AltBody = $message;
        $result = $mail->Send();
        return $result;
    }

    /**
     * Recovery password. Add a registration to recovery table (recovery_id,email,hash,expiration,active)
     * then send email with activation link
     */
    public function recovery_password()
    {
        $email=$_POST['email'];
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            $hash= md5(rand(0,1000000));
            $recovery_id=$this->db_user->add_recovery($email,$hash);

            if(isset ($recovery_id)){
                $language=$GLOBALS['language'];
                $email_msg=$this->language_file->getParam("recovery_email_message");
                $email_msg.="<a href='http://www.amio.biz/{$language}/change_password/complete/{$recovery_id}/{$hash}'>www.amio.biz/{$language}/change_password/complete/{$recovery_id}/{$hash}</a>";
                $ok=$this->send_email($email,$email_msg);
                if($ok){
                    echo $this->language_file->getParam("recovery_msg");
                }else{
                    echo $this->language_file->getParam("recovery_error1");
                }
            }else{
                echo $this->language_file->getParam("recovery_error2");
            }

        }else{
            echo $this->language_file->getParam("email_error");
        }
        //INSERT INTO `recovery`(`email`,`hash`,`expiration`,`active`) values('johnyahoo.com','cefregtghtgh',DATE_ADD(NOW(), INTERVAL 24 HOUR),1)
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

    /**************End of sending email************************************************************************/

    /**
     * Add news to database.
     */
    public function add_news(){

        $language_id= (isset($_POST['language_id'])?($_POST['language_id']):null);
        $article=((isset($_POST['article'])?($_POST['article']):null));
        $language=((isset($_POST['language'])?($_POST['language']):null));

        if($language_id && $article)
        {
            include('Zend/Search/Lucene.php');
            try
            {
                $lucene_index = Zend_Search_Lucene::open($GLOBALS['index_path']);
            }catch(Zend_Search_Lucene_Exception $e)
            {
                $lucene_index = Zend_Search_Lucene::create($GLOBALS['index_path']);
            }

            $myHelper=new Helpers();
            list($title,$body)=$myHelper->token_news($_POST['article']);

            $news_id=$this->ioc->admin->add_news($language_id,$title,$body);

            if($news_id)
            {
                $doc = new Zend_Search_Lucene_Document();
                //$titleUrl=str_replace(' ','-',$title);
                $title_url=str_replace(" ","-",$title);
                $title_url.="-".$news_id;
                $docUrl= BASE_PATH."{$language}/news/details/{$title_url}";
                $doc->addField(Zend_Search_Lucene_Field::UnIndexed('url', $docUrl));
                $doc->addField(Zend_Search_Lucene_Field::keyword('news_id', $news_id));
                $doc->addField(Zend_Search_Lucene_Field::Text('title',$title));
                $doc->addField(Zend_Search_Lucene_Field::UnStored('contents', $body));
                $lucene_index->addDocument($doc);
                $lucene_index->commit();
                echo "The article was added succefully";
            }
            else{
                echo "*ERROR*</br>Articolul nu a putut fi adaugat.Contacteaza administratorul";
            }
        }

    }


    /**
     * Update news with CK EDITOR
     */
    public function update_news(){
        //de language_id  nu cred ca este nevoie
        $news_id=$_POST['news_id'];
        $language_id= (isset($_POST['language_id'])?($_POST['language_id']):null);
        $language=((isset($_POST['language'])?($_POST['language']):null));
        $article=((isset($_POST['article'])?($_POST['article']):null));

        if($language_id && $article)
        {
            $myHelper=new Helpers();
            list($title,$body)=$myHelper->token_news($_POST['article']);
            if($this->ioc->admin->update_news($news_id,$language_id,$title,$body))
            {
               //sterge indexul
                include('Zend/Search/Lucene.php');
                $lucene_index = Zend_Search_Lucene::open($GLOBALS['index_path']);
                $term = new Zend_Search_Lucene_Index_Term($_POST['news_id'], 'news_id');
                $query = new Zend_Search_Lucene_Search_Query_Term($term);
                $results =$lucene_index->find($query);
                if(count($results) > 0) {
                    foreach($results as $result)
                    {
                        $lucene_index->delete($result->id);
                        $lucene_index->commit();
                    }
                }

                //reindexeaza
                $doc = new Zend_Search_Lucene_Document();
                $title_url=str_replace(" ","-",$title);
                $title_url.="-".$news_id;
                $docUrl= BASE_PATH."{$language}/news/details/{$title_url}";
                $doc->addField(Zend_Search_Lucene_Field::UnIndexed('url', $docUrl));
                $doc->addField(Zend_Search_Lucene_Field::keyword('news_id', $news_id));
                $doc->addField(Zend_Search_Lucene_Field::Text('title',$title));
                $doc->addField(Zend_Search_Lucene_Field::UnStored('contents', $body));
                $lucene_index->addDocument($doc);
                $lucene_index->commit();

                echo "The article was updated succefully";
            }
            else{
                echo "*ERROR*</br>Articolul nu a putut fi modificat.Contacteaza administratorul";
            }
        }

    }

    /**
     * Delete news by $_POST['news_id']
     */
    public function delete_news(){

        if($this->ioc->admin->delete_news($_POST['news_id']))
        {
            include('Zend/Search/Lucene.php');
            $lucene_index = Zend_Search_Lucene::open($GLOBALS['index_path']);
            $term = new Zend_Search_Lucene_Index_Term($_POST['news_id'], 'news_id');

            $query = new Zend_Search_Lucene_Search_Query_Term($term);
            $results =$lucene_index->find($query);
            if(count($results) > 0) {
                foreach($results as $result)
                {
                    $lucene_index->delete($result->id);
                    $lucene_index->commit();
                }
            }
            echo "Articolul a fost sters din baza de date";
        }
        else{
            echo "*ERROR*<BR/>Eroare la stergerea articolului.contactati administratorul";
        }
    }

    /**
     * Get news by $_POST['news_id'];
     */
    public function get_one_news(){
        $news_id=$_POST['news_id'];
        $news=$this->ioc->admin->get_one_news($news_id);
        $title='<h2 style="text-align:center">[['.$news[0]['title'].']]</h2>';
        $body=$news[0]['news'];
        echo $title.$body;
    }


    /**
     * Search news by  $_POST['search_txt'] entered in search input box
     */
    public function search_news(){
        if(!empty($_POST['search_txt'])){
            $search_text=$_POST['search_txt'];
            include('Zend/Search/Lucene.php');
            $lucene_index = Zend_Search_Lucene::open($GLOBALS['index_path']);
            $hits = $lucene_index->find($search_text);
            if (count($hits)==0)
            {
                echo "0 results founded";
            }
            else
            {
                foreach ($hits as $hit)
                {
                    echo '<div id="search-result"><a href="'.$hit->url.'">'.$hit->title."</a><br/>";
                    $news=$this->ioc->admin->get_one_news($hit->news_id);
                    $body=strip_tags($news[0]['news']);
                    echo substr($body,1,340);
                    //echo "<br/>".$hit->url;
                    // echo 'Director: '.$hit->director."<br/>";
                    //echo 'Description; '.$hit->description."<br/><hr/>";
                }
            }
        }
              // $this->smarty->render("ajax/search_news",array("name"=>"Hello"));
    }

    /**
     * Trimite in format json toate orasele din tara selectata.
     *
     * @param string $language
     * @return json
     */
    public function get_cities($language)
    {
        $db=$this->ioc->user;
        $country_id=$GLOBALS['country_id'][$language];
        $cities=$db->get_cities($country_id);
        //var_dump(json_encode($cities));
        //var_dump($cities);
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');
        echo json_encode($cities);

    }

}
?>