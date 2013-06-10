<?php /* Smarty version Smarty-3.1.11, created on 2013-05-24 14:55:18
         compiled from "..\application\views\math\joc6.tpl" */ ?>
<?php /*%%SmartyHeaderCode:22878519f7f56163710-01740363%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab53ba2e019a3ae96bf488609fc07787722cc54a' => 
    array (
      0 => '..\\application\\views\\math\\joc6.tpl',
      1 => 1369407028,
      2 => 'file',
    ),
    'b1a68f74b6e0f535880ba212b299a3f056bec66c' => 
    array (
      0 => '..\\application\\layout\\home_layout.tpl',
      1 => 1369348102,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22878519f7f56163710-01740363',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LANGUAGE_FILE' => 0,
    'BASE_PATH' => 0,
    'LANGUAGE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_519f7f56471781_92164820',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_519f7f56471781_92164820')) {function content_519f7f56471781_92164820($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
   
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
    
    <?php if ($_smarty_tpl->tpl_vars['LANGUAGE_FILE']->value!=null){?><?php  $_config = new Smarty_Internal_Config($_smarty_tpl->tpl_vars['LANGUAGE_FILE']->value, $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars(null, 'local'); ?><?php }?>
    <title></title>
    
    
        <script type="text/javascript">
            var BASE_PATH="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
";
           // var ROOT="{$ROOT}";
            var LANGUAGE="<?php echo $_smarty_tpl->tpl_vars['LANGUAGE']->value;?>
";
        </script>
    

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
    
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
css/template.css" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
fancybox/jquery.fancybox.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine"/>
    
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
games/math/joc6/stiluri.css">

    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
    <!--Fixeaza imaginea de background-->
    <script src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
javascript/backstretch.js" type="text/javascript"></script>
    <!--Galeria foto fancybox-->
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
fancybox/jquery.fancybox.js"></script>
    <!--Scripturi penturi pentru login,search news, backstretch etc-->
    <script src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
javascript/template.js" type="text/javascript"></script>
    <!--Stabileste inaltime fivului #shell egala cu valoarea $(window).height-->
    <script src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
javascript/fill_window.js" type="text/javascript"></script>
    
<script type="text/JavaScript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
games/text/lang-<?php echo $_smarty_tpl->tpl_vars['LANGUAGE']->value;?>
.js"></script>
<script type="text/JavaScript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
games/math/joc6/config.js"></script>
<script type="text/JavaScript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
games/math/joc6/joc.js"></script>

</head>
<body>
<div id="top">
    <div id="top-center">
          <div id="top-center-row1">
              <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
images/logo.png">
              <?php if (!isset($_SESSION['user_id'])){?>
                  <div id="login-div">
                      <form method="POST" action="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
<?php echo $_smarty_tpl->tpl_vars['LANGUAGE']->value;?>
/login" >
                          <input type="text" name="email" id="email" placeholder="Email"/>
                          <input type="password" name="password" id="password" placeholder="Password"/>
                          <input type="submit" name="Submit" id="submit-btn" value="" />
                      </form>
                      <div id="register-link"><?php echo $_smarty_tpl->getConfigVariable('not_registered');?>
<a href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
<?php echo $_smarty_tpl->tpl_vars['LANGUAGE']->value;?>
/register"><?php echo $_smarty_tpl->getConfigVariable('click_here');?>
</a></div>
                  </div>
              <?php }else{ ?>
               <div style="float:right;color:white"><?php echo $_smarty_tpl->getConfigVariable('hello');?>
,&nbsp;<?php echo $_SESSION['email'];?>
&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
<?php echo $_smarty_tpl->tpl_vars['LANGUAGE']->value;?>
/logout"><?php echo $_smarty_tpl->getConfigVariable('logout');?>
</a></div>
              <?php }?>
          </div>
        <div id="top-center-row2">
             <ul id="main-links">
                 <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
<?php echo $_smarty_tpl->tpl_vars['LANGUAGE']->value;?>
/index"><img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
images/b1.png"></a></li>
                 <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
<?php echo $_smarty_tpl->tpl_vars['LANGUAGE']->value;?>
/news"><img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
images/b4.png"></a></li>
                 <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
<?php echo $_smarty_tpl->tpl_vars['LANGUAGE']->value;?>
/contact"><img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
images/b3.png"></a></li>
                 <li><a href=""><img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
images/b2.png"></a></li>
             </ul>
        </div>
    </div>
</div>
<div id="top-spiral">
        <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
images/spiral.png">
</div>
<div id="shell">

<br/><br/>
<div>
    <canvas id="canvasjoc" width="640" height="480" />
</div>
<span id="se_incarca">
        <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
games/imagini/asteapta.gif" alt="asteapta mesaj de la server" height="32" width="32" />
    </span>
    
    <script type="text/javascript">
        Init();
    </script>
    
<BR/>
<BR/>
<BR/>
<div id="debug">
</div>

</div>

</body>
</html><?php }} ?>