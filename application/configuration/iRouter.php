<?php
/**
 * Interface IRouter
 *
 * Contains defaults setting for controller,action,error controller, base path and default module
 *
 * User: YWA
 * Date: 3/27/13
 * Time: 9:41 PM
 * To change this template use File | Settings | File Templates.
 */
interface iRouter{

    const DEFAULT_CONTROLLER="index";
    const DEFAULT_ACTION="index";
    const DEFAULT_ERROR_CONTROLLER="error";
    const BASE=BASE_PATH;
    const DEFAULT_MODULE="";
}

?>