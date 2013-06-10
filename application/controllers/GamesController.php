<?php
/**
 * Created by JetBrains PhpStorm.
 * User: YWA
 * Date: 5/16/13
 * Time: 9:49 PM
 * To change this template use File | Settings | File Templates.
 */
class GamesController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->db_user=$this->ioc->user;
    }

    public function index()
    {
        $this->smarty->render("games/index",array("msg"=>"Hello"));
    }

}
