<?php
/**
 * ErrorController
 *
 * Created by JetBrains PhpStorm.
 * User: YWA
 * Date: 3/27/13
 * Time: 9:07 PM
 * To change this template use File | Settings | File Templates.
 */

class ErrorController{



    /**
     * Construct
     */
    public function __construct(){

    }

    /**
     * Forbidden page
     *
     * @return void
     */
    public function index(){

        echo "<h1>Forbidden REQUEST 404 Error</h1>";
    }
}

?>