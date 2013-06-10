<?php
/**
 * Interface IAutoLoader
 *
 * Contain directories and formats for spl_autoload_register registered function
 *
 * User: YWA
 * Date: 3/27/13
 * Time: 11:12 PM
 * To change this template use File | Settings | File Templates.
 */
interface iAutoLoader
{
    const FOLDERS="../yySmarty/,../application/controllers/,../application/libraries/smarty-libs/,../application/configuration/,../application/models/,../application/libraries/,../application/libraries/PHPMailer/";
    const FORMATS="%s.php,%s.class.php,%s.inc.php,class.%s.php";
}