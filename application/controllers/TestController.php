<?php
/**
 * Created by JetBrains PhpStorm.
 * User: YWA
 * Date: 4/19/13
 * Time: 11:30 PM
 * To change this template use File | Settings | File Templates.
 */
class TestController extends Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->db_user=$this->ioc->user;
    }

    public function index()
    {

        /*$iterator=new FileIterator("languages/ro.conf");
        foreach($iterator as $k=>$v)
        {
            echo "{$k}=>{$v}<br/>";
        }*/

        //$r=new ReadConf("languages/ro.conf");
        //echo $r->getParam("select_language");
       // $fp=fopen("languages/ro.conf","r");
       // $fp=fopen("languages/ro.conf","r");
       // $fp=fopen("http://localhost/iva/aptio/public/languages/ro.conf","r");
       /* if(!$fp)
            die("Error");
        else
            echo "open succesuly";*/
      //  echo "../../".__FILE__;
       // echo "..".BASE_PATH."languages/ro.conf";



        /*list($id,$hash)=$this->db_user->get_user_hash("john007buc@yahoo.com");
        var_dump($hash);*/
       // echo $this->db_user->get_user_hash("john007buc@yahoo.com");
       echo $this->db_user->get_category_by_game_id(1);
    }

}