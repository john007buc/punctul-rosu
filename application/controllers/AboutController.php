<?php
/**
 * Created by JetBrains PhpStorm.
 * User: YWA
 * Date: 6/6/13
 * Time: 6:04 PM
 * To change this template use File | Settings | File Templates.
 */
class AboutController extends Controller{



    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $this->smarty->render("about/index");
    }
}