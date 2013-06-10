<?php

class User
{

    public $db_link;

    public function __construct($db){

     //$db=DB::getInstance();
     //$this->db_link=$db->connect();
     $this->db_link=$db;

    }

    public function add_user($lang_id,$first_name,$last_name,$email,$password,$hash)
    {

        //verifica daca exista userul
        try
        {
                 $st=$this->db_link->prepare("select user_id from users where email=?");
                 $st->execute(array($email));

                if($st->rowCount()==0)
                {
                    $st=$this->db_link->prepare("insert into users (country_id,first_name,last_name,email,password,hash) values(?,?,?,?,?,?)");
                    $st->execute(array($lang_id,$first_name,$last_name,$email,sha1($password),$hash));
                    $result=$st->rowCount();
                    if($result){
                        return $this->db_link->lastInsertId();
                    }else{
                        return null;
                    }

                }
                else {
                    $st->closeCursor();
                    return false;
                }

        }catch(PDOException $ex)
        {
            echo $ex->getMessage();
            $st->closeCursor();
            return false;
        }

    }

    public function activate_user($user_id,$hash)
    {
       try
       {
            $st=$this->db_link->prepare("select first_name from users where user_id=? and hash=?");
            $st->execute(array($user_id,$hash));
            if($st->rowCount()==1)
            {
                //update
                $st=$this->db_link->prepare("update users set active=1 where user_id=:user_id and hash=:hash");
                $st->bindParam(':user_id',$user_id,PDO::PARAM_INT);
                $st->bindParam(':hash',$hash,PDO::PARAM_STR);
                $st->execute();
                $result=$st->rowCount();

                return $result;
            }
            else
            {

                return false;

            }
       }catch(PDOException $ex)
       {
           echo $ex->getMessage();
           $st->closeCursor();
           return false;
       }


    }

    public function login_user($email,$password)
    {
        try
        {
            $st=$this->db_link->prepare("select * from users where email=? and password=? and active=1");
            $st->execute(array($email,sha1($password)));


            if($st->rowCount()==1)
             {
              $st->setFetchMode(PDO::FETCH_ASSOC);
              $row=$st->fetch();
              Session::start();
              Session::set('user_id',$row['user_id']);
              Session::set('first_name',$row['first_name']);
              Session::set('last_name',$row['last_name']);
              Session::set('email',$row['email']);
              $st->closeCursor();
              return true;
             }
             else
              {
                $st->closeCursor();
                return false;

              }

        }catch(PDOException $ex)
        {
            echo $ex->getMessage();
            $st->closeCursor();
            return false;
        }


    }

    public function get_user_hash_by_email($email)
    {
        try{
                $st=$this->db_link->prepare("select user_id,hash from users where email=:email and active=1");
                $st->bindValue(":email",$email,PDO::PARAM_STR);
                $st->execute();
                if($st->rowCount()===1){
                    $st->setFetchMode(PDO::FETCH_ASSOC);
                    $row=$st->fetch();
                    return array($row['user_id'],$row['hash']);
                }
            }catch(PDOException $ex)
            {
                echo $ex->getMessage();
                return null;
            }
    }
    public function get_user_hash_by_id($user_id)
    {
        try{
            $st=$this->db_link->prepare("select hash from users where user_id=:user_id and active=1");
            $st->bindValue(":user_id",$user_id,PDO::PARAM_INT);
            $st->execute();
            if($st->rowCount()===1){
                $st->setFetchMode(PDO::FETCH_ASSOC);
                $row=$st->fetch();
                return $row['hash'];
            }
        }catch(PDOException $ex)
        {
            echo $ex->getMessage();
        }
    }


    /*public function reset_password($hash,$new_pass)
    {
        try{
            $st=$this->db_link->prepare("select user_id from users where hash=:hash");
            $st->bindParam(':hash',$hash,PDO::PARAM_STR);
            $st->execute();
            if($st->rowCount()===1)
            {
                $st=$this->db_link->prepare("update users set password=:password where hash=:hash");
                $st->bindParam(':password',sha1($new_pass),PDO::PARAM_STR);
                $st->bindParam(':hash',$hash,PDO::PARAM_STR);
                $success=$st->execute();
                return $success;
        }
        }catch(PDOException $ex){
            echo $ex->getMessage();
        }

    }*/

    public function reset_password($recovery_id,$hash,$new_pass)
    {
        try{
             $st=$this->db_link->prepare("update users set password=:password where email=(select email from recovery where recovery_id=:recovery_id and hash=:hash)");
             $st->bindParam(':password',sha1($new_pass),PDO::PARAM_STR);
             $st->bindParam(':hash',$hash,PDO::PARAM_STR);
             $st->bindParam(':recovery_id',$recovery_id,PDO::PARAM_INT);
             $st->execute();
             return $st->rowCount();
        }catch(PDOException $ex){
            echo $ex->getMessage();
        }

    }

    public function add_recovery($email,$hash){
        try{

            $st=$this->db_link->prepare("insert into recovery(email,hash,expiration,active) values(:email,:hash,DATE_ADD(NOW(), INTERVAL 24 HOUR),0)");
            $st->bindParam(':email',$email,PDO::PARAM_STR);
            $st->bindParam(':hash',$hash,PDO::PARAM_STR);
            $st->execute();
            return $this->db_link->lastInsertId();
        }catch(PDOException $ex)
        {
            echo $ex;
        }
    }

    public function verify_recovery($recovery_id,$hash){
       //UPDATE `recovery` SET `active`=0 WHERE `expiration`>NOW()
        try{
            $st=$this->db_link->prepare("update recovery set active=1 where (hash=:hash and recovery_id=:recovery_id) and expiration >NOW()");
            $st->bindParam(':recovery_id',$recovery_id,PDO::PARAM_INT);
            $st->bindParam(':hash',$hash,PDO::PARAM_STR);
            $st->execute();
            return $st->rowCount();
        }catch(PDOException $ex)
        {
            echo $ex;
        }

    }


    public function get_games_by_cat($cat)
    {
        try{
            $st=$this->db_link->prepare("select games.name from games INNER JOIN categories ON games.category_id=categories.cat_id AND categories.category=:cat ");
            $st->bindParam(":cat",$cat,PDO::PARAM_STR);
            $success=$st->execute();
            if($success){
                $st->setFetchMode(PDO::FETCH_ASSOC);
                return $st->fetchAll();
            }else{
                return null;
            }

        }catch(PDOException $ex)
        {
               echo $ex->getMessage();
               return null;
        }

    }

    public function get_category_by_game_id($games_id)
    {
        try{
            $st=$this->db_link->prepare("select categories.category from categories INNER JOIN games  ON games.category_id=categories.cat_id AND games.games_id=:games_id ");
            $st->bindParam(":games_id",$games_id,PDO::PARAM_INT);
            $st->execute();
            $st->setFetchMode(PDO::FETCH_ASSOC);
            $row=$st->fetch();
            return $row['category'];

        }catch(PDOException $ex)
        {
            echo $ex->getMessage();
        }

    }

    public function save_game_param($user_id,$id_joc,$subtip,$dificulty,$correct_responses,$fastest_response,$lowest_response,$average_response,$score)
    {
          try{
              $st=$this->db_link->prepare("insert into games_param (user_id,id_joc,subtip,dificulty,correct_responses,fastest_response,lowest_response,average_response,score) values (:user_id,:id_joc,:subtip,:dificulty,:correct_responses,:fastest_response,:lowest_response,:average_response,:score)");
              $st->bindParam(":user_id",$user_id,PDO::PARAM_INT);
              $st->bindParam(":id_joc",$id_joc,PDO::PARAM_INT);
              $st->bindParam(":subtip",$subtip,PDO::PARAM_INT);
              $st->bindParam(":dificulty",$dificulty,PDO::PARAM_INT);
              $st->bindParam(":correct_responses",$correct_responses,PDO::PARAM_INT);
              $st->bindParam(":fastest_response",$fastest_response);
              $st->bindParam(":lowest_response",$lowest_response,PDO::PARAM_INT);
              $st->bindParam(":average_response",$average_response,PDO::PARAM_INT);
              $st->bindParam(":score",$score,PDO::PARAM_INT);
              $st->execute();
              return $st->rowCount();

          }catch(PDOException $ex){
              echo $ex->getMessage();
          }
    }

    public function get_country_id($lang)
    {

        $st=$this->db_link->prepare("select country_id from countries where abr=:lang");
        $st->bindParam(':lang',$lang,PDO::PARAM_STR);
        $success=$st->execute();
        $row=$st->fetch();
        $st->closeCursor();
        if($success && count($row)>0)
            return $row['country_id'];
        else
            return null;



    }
    public function get_news($lang_id){
        try{
            $st=$this->db_link->prepare("select news_id,language_id,title,CONCAT(SUBSTRING(news,1,800),'.....')as news,date_posted from news where language_id=:language_id ORDER BY date_posted DESC");
            $st->bindParam(":language_id",$lang_id,PDO::PARAM_INT);
            $st->execute();
            $st->setFetchMode(PDO::FETCH_ASSOC);
            return $st->fetchAll();

        }catch(PDOException $ex)
        {
            echo $ex->getMessage();
        }
    }

    public function get_news_by_id($news_id)
    {
        try{
            $st=$this->db_link->prepare("select title,news,date_posted from news where news_id=:news_id");
            $st->bindParam(":news_id",$news_id,PDO::PARAM_INT);
            $st->execute();
            $st->setFetchMode(PDO::FETCH_ASSOC);
            return $st->fetch();

        }catch(PDOException $ex)
        {
            echo $ex->getMessage();
        }

    }


}




?>