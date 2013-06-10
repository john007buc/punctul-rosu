<?php
/**
 * Created by JetBrains PhpStorm.
 * User: YWA
 * Date: 5/3/13
 * Time: 10:03 PM
 * To change this template use File | Settings | File Templates.
 */
class MathController extends Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->db_user=$this->ioc->user;
        Session::start();
    }

    public function index()
    {
        //codul pentru a prelua toate jocurile din categoria matematica
          $games=$this->db_user->get_games_by_cat("math");
        $this->smarty->render("math/index",array("games"=>$games));
    }



    public function game($nr=1)
    {
        Session::start();
        $id=Session::get('user_id');
        if(!isset($id)){
            $lang=$GLOBALS['language'];
            header("Location:".BASE_PATH.$lang."/login");
        }

        if($nr==8 || $nr>9){
            $nr=1;
        }

        $this->smarty->render("math/game",array("game_nr"=>$nr));
    }

}