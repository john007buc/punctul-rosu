<?php

class DB implements iDB
{

    private static $this_instance;
    private  $db_handler;
    private $db_host;
    private $db_name;
    private $db_user;
    private $db_password;

   private function __construct()
    {

            $this->db_host=iDB::DB_HOST;
            $this->db_name=iDB::DB_NAME;
            $this->db_user=iDB::DB_USER;
            $this->db_password=iDB::DB_PASS;
    }


    public static function getInstance()
    {
        if(!self::$this_instance)
            self::$this_instance=new self();

        return self::$this_instance;

    }

    public function connect()
    {

        try
        {
            $this->db_handler= new PDO("mysql:host={$this->db_host};dbname={$this->db_name}",$this->db_user,$this->db_password);
            $this->db_handler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $this->db_handler->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
            return $this->db_handler;

        }catch(PDOException $ex)
        {
            echo $ex->getMessage();
        }
    }



}


?>