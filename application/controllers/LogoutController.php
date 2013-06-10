<?php
class LogoutController extends Controller
{

    public function __construct()
    {
       // parent::__construct();
    }

    public function index()
    {
        Session::start();
        Session::destroy();
        //Cookies::destroy("email");

        header("Location:".BASE_PATH.$GLOBALS['language']."/index");
    }


}
?>