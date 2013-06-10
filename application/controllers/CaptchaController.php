<?php

class CaptchaController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index($cache_param=null)
    {
        Captcha::generate();
    }



}