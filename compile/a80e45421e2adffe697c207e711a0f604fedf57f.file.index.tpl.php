<?php /* Smarty version Smarty-3.1.11, created on 2013-05-31 18:11:56
         compiled from "..\application\views\admin\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2491751a8e7ec2080c8-84823122%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a80e45421e2adffe697c207e711a0f604fedf57f' => 
    array (
      0 => '..\\application\\views\\admin\\index.tpl',
      1 => 1363215278,
      2 => 'file',
    ),
    '8d886fb26f9bcc5da79bc9f5ad04315f59409534' => 
    array (
      0 => '..\\application\\layout\\admin_layout.tpl',
      1 => 1364055288,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2491751a8e7ec2080c8-84823122',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_PATH' => 0,
    'ROOT' => 0,
    'LANGUAGE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_51a8e7ec3beea9_20545207',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a8e7ec3beea9_20545207')) {function content_51a8e7ec3beea9_20545207($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
css/admin.css">
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
javascript/myhelpers.js"></script>

    <script type="text/javascript">
        var BASE_PATH="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
";
        var ROOT="<?php echo $_smarty_tpl->tpl_vars['ROOT']->value;?>
";
    </script>
    

</head>
<body>
<div id="top-shell">
    <div id="top-header">

    <h2>Panoul de administrare APTIO</h2>

    </div>
    <div id="menu">
       <ul>
           <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
<?php echo $_smarty_tpl->tpl_vars['LANGUAGE']->value;?>
/admin">Acasa</a></li>
           <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
<?php echo $_smarty_tpl->tpl_vars['LANGUAGE']->value;?>
/admin/categorii">Categorii</a></li>
           <li><a href="#">Teste</a></li>
           <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
<?php echo $_smarty_tpl->tpl_vars['LANGUAGE']->value;?>
/admin/news">Blog</a></li>
           <li><a href="#">Indexeaza</a></li>
       </ul>

    </div>
</div>
<div id="shell">
    <div id="forms"></div>
 

Admin Panel Soon


</div>
</body>
</html><?php }} ?>