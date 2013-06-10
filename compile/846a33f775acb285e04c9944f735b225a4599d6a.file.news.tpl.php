<?php /* Smarty version Smarty-3.1.11, created on 2013-05-31 18:11:58
         compiled from "..\application\views\admin\news.tpl" */ ?>
<?php /*%%SmartyHeaderCode:930751a8e7ee22c776-68712536%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '846a33f775acb285e04c9944f735b225a4599d6a' => 
    array (
      0 => '..\\application\\views\\admin\\news.tpl',
      1 => 1364079860,
      2 => 'file',
    ),
    '8d886fb26f9bcc5da79bc9f5ad04315f59409534' => 
    array (
      0 => '..\\application\\layout\\admin_layout.tpl',
      1 => 1364055288,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '930751a8e7ee22c776-68712536',
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
  'unifunc' => 'content_51a8e7ee532333_72537221',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a8e7ee532333_72537221')) {function content_51a8e7ee532333_72537221($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'D:\\mysites\\amio\\application\\libraries\\smarty-libs\\plugins\\function.html_options.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
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
    
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
javascript/blog.js"></script>

<script>



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
 
<div id="buttons">Selecteaza tara: <?php echo smarty_function_html_options(array('name'=>'countries','id'=>'countries','options'=>$_smarty_tpl->tpl_vars['countries']->value,'selected'=>$_smarty_tpl->tpl_vars['selected_country']->value),$_smarty_tpl);?>
<input onclick="createEditor();" type="button" value="Create Editor">
    <input onclick="removeEditor();" type="button" value="Remove Editor"></div>
<div id="clear"></div>
<div id="messageDiv"></div>
<div id="editor">
</div>

<div class="news-content">

    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['inc'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['inc']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['inc']['name'] = 'inc';
$_smarty_tpl->tpl_vars['smarty']->value['section']['inc']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['news']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['inc']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['inc']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['inc']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['inc']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['inc']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['inc']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['inc']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['inc']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['inc']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['inc']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['inc']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['inc']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['inc']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['inc']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['inc']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['inc']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['inc']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['inc']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['inc']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['inc']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['inc']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['inc']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['inc']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['inc']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['inc']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['inc']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['inc']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['inc']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['inc']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['inc']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['inc']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['inc']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['inc']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['inc']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['inc']['total']);
?>
     <div class="news" id="<?php echo $_smarty_tpl->tpl_vars['news']->value[$_smarty_tpl->getVariable('smarty')->value['section']['inc']['index']]['news_id'];?>
">
         <div class="news-title"><h2><?php echo $_smarty_tpl->tpl_vars['news']->value[$_smarty_tpl->getVariable('smarty')->value['section']['inc']['index']]['title'];?>
</h2></div>
         <div class="news-description">Added on <?php echo $_smarty_tpl->tpl_vars['news']->value[$_smarty_tpl->getVariable('smarty')->value['section']['inc']['index']]['date_posted'];?>
&nbsp;<a href="#" onclick="delete_news(event,<?php echo $_smarty_tpl->tpl_vars['news']->value[$_smarty_tpl->getVariable('smarty')->value['section']['inc']['index']]['news_id'];?>
);">Delete this news</a></div>
         <div class="news-body"><?php echo strip_tags($_smarty_tpl->tpl_vars['news']->value[$_smarty_tpl->getVariable('smarty')->value['section']['inc']['index']]['news']);?>
</div>
     </div>


    <?php endfor; endif; ?>


</div>


<!-- This div will hold the editor. -->

</div>
</body>
</html><?php }} ?>