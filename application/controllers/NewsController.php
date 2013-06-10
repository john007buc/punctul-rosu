<?php
class NewsController extends Controller{

    public function __construct(){
        parent::__construct();
        $this->db_user=$this->ioc->user;
        Session::start();
    }

    public function index()
    {
       $lang=$GLOBALS['language'];
       $news=$this->db_user->get_news($GLOBALS['country_id'][$lang]);
       $this->smarty->render("news/index",array("news"=>$news));
    }

    public function details($title)
    {
        $news_id=end(explode("-",$title));
        $news=$this->db_user->get_news_by_id($news_id);
        $this->smarty->render("news/details",array("news"=>$news));
    }
}
?>