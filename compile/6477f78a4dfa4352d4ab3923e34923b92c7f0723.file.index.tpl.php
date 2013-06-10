<?php /* Smarty version Smarty-3.1.11, created on 2013-05-16 20:32:53
         compiled from "..\application\views\games\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2393151952bc58fa154-14521090%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6477f78a4dfa4352d4ab3923e34923b92c7f0723' => 
    array (
      0 => '..\\application\\views\\games\\index.tpl',
      1 => 1368730874,
      2 => 'file',
    ),
    'b1a68f74b6e0f535880ba212b299a3f056bec66c' => 
    array (
      0 => '..\\application\\layout\\home_layout.tpl',
      1 => 1368736338,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2393151952bc58fa154-14521090',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_51952bc5b3e388_24909926',
  'variables' => 
  array (
    'LANGUAGE_FILE' => 0,
    'BASE_PATH' => 0,
    'ROOT' => 0,
    'LANGUAGE' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51952bc5b3e388_24909926')) {function content_51952bc5b3e388_24909926($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
   
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
    
    <?php if ($_smarty_tpl->tpl_vars['LANGUAGE_FILE']->value!=null){?><?php  $_config = new Smarty_Internal_Config($_smarty_tpl->tpl_vars['LANGUAGE_FILE']->value, $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars(null, 'local'); ?><?php }?>
    <title></title>
    
    <script type="text/javascript">
        var BASE_PATH="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
";
        var ROOT="<?php echo $_smarty_tpl->tpl_vars['ROOT']->value;?>
";
        var LANGUAGE="<?php echo $_smarty_tpl->tpl_vars['LANGUAGE']->value;?>
";
    </script>

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
    
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
css/template.css" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
fancybox/jquery.fancybox.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine"/>
    
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
css/register.css" type="text/css"/>

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
    
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
javascript/register.js" type="text/javascript"></script>

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
                      <div id="register-link">Nu esti inregistrat? <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
<?php echo $_smarty_tpl->tpl_vars['LANGUAGE']->value;?>
/register"> Click aici</a></div>
                  </div>
              <?php }?>
          </div>
        <div id="top-center-row2">
             <ul id="main-links">
                 <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
<?php echo $_smarty_tpl->tpl_vars['LANGUAGE']->value;?>
/index"><img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
images/b1.png"></a></li>
                 <li><a href=""><img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
images/b2.png"></a></li>
                 <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
<?php echo $_smarty_tpl->tpl_vars['LANGUAGE']->value;?>
/contact"><img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
images/b3.png"></a></li>
                 <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
<?php echo $_smarty_tpl->tpl_vars['LANGUAGE']->value;?>
/news"><img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
images/b4.png"></a></li>
             </ul>
        </div>
    </div>
</div>
<div id="top-spiral">
        <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
images/spiral.png">
</div>
<div id="shell">

<a href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
<?php echo $_smarty_tpl->tpl_vars['LANGUAGE']->value;?>
/math/joc1"><h3>Joc1</h3></a>

</div>

</body>
</html><?php }} ?>