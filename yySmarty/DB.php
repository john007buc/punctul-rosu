<?php
/**
 * DB
 *
 * A wrapper class for PDO. Implements iDB interface that contains the connection data
 */
class DB extends PDO implements iDB
{
   /**
    * Connection data
    */
    private $db_host;
    private $db_name;
    private $db_user;
    private $db_password;

   /**
    * Constructor
    *
    * @throws PDOException for invalid connection values
    */
  public function __construct()
    {
        $this->db_host=iDB::DB_HOST;
        $this->db_name=iDB::DB_NAME;
        $this->db_user=iDB::DB_USER;
        $this->db_password=iDB::DB_PASS;
        parent::__construct("mysql:host={$this->db_host};dbname={$this->db_name}",$this->db_user,$this->db_password);
        $this->setConfiguration();
    }

    /**
     * Set the exception error mode and allow prepare statement do the job
     *
     * @return void
     */
    public function setConfiguration()
    {
            $this->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $this->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
    }
}
