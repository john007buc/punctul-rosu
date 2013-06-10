<?php /* Smarty version Smarty-3.1.11, created on 2013-06-06 15:35:42
         compiled from "..\application\views\news\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2185751952d58392408-93725500%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '01fdca27fb0c3e1df5c5c12eafa04a1ee48cb068' => 
    array (
      0 => '..\\application\\views\\news\\index.tpl',
      1 => 1370026008,
      2 => 'file',
    ),
    'b1a68f74b6e0f535880ba212b299a3f056bec66c' => 
    array (
      0 => '..\\application\\layout\\home_layout.tpl',
      1 => 1370531037,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2185751952d58392408-93725500',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_51952d58684561_29995419',
  'variables' => 
  array (
    'LANGUAGE' => 0,
    'LANGUAGE_FILE' => 0,
    'BASE_PATH' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51952d58684561_29995419')) {function content_51952d58684561_29995419($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include 'D:\\mysites\\amio\\application\\libraries\\smarty-libs\\plugins\\modifier.replace.php';
?><!DOCTYPE html>
<html>
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
    <meta property="og:title" content="Antrenamentul Mintii Intensiv Online" />
    <meta property="og:image" content="http://www.amio.biz/images/logo.png" />
    <meta property="og:url" content="http://www.amio.biz/<?php echo $_smarty_tpl->tpl_vars['LANGUAGE']->value;?>
" />
    <meta property="og:description" content="Mai simplu spus AMIO , este o aplicatie care isi propune sa ofere un avantaj important tuturor vorbitorilor de limba romana, care doresc sa isi antreneze mintea!" />
    <meta property="og:site_name" content="AMIO.BIZ" />
    
    <?php if ($_smarty_tpl->tpl_vars['LANGUAGE_FILE']->value!=null){?><?php  $_config = new Smarty_Internal_Config($_smarty_tpl->tpl_vars['LANGUAGE_FILE']->value, $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars(null, 'local'); ?><?php }?>
    <title></title>
    
    
        <script type="text/javascript">
            var BASE_PATH="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
";
           // var ROOT="{$ROOT}";
            var LANGUAGE="<?php echo $_smarty_tpl->tpl_vars['LANGUAGE']->value;?>
";
        </script>
    


    
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
css/template.css" type="text/css"/>

    
 <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
css/news.css" />

    <script src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
javascript/myhelpers.js" type="text/javascript"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <!--Scripturi penturi pentru login,search news, backstretch etc-->
    <script src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
javascript/template.js" type="text/javascript"></script>
    <!--Stabileste inaltime fivului #shell egala cu valoarea $(window).height-->
    <script src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
javascript/fill_window.js" type="text/javascript"></script>

    <!--Share tis buttons-->
    
       <script type="text/javascript">
          var switchTo5x=true;
       </script>
    
    <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
   
       <script type="text/javascript">
           stLight.options({ publisher:'a417e590-1fe0-415a-8591-8f78596fba1c',shorten:false});
       </script>
    
    
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
javascript/search.js" type="text/javascript"></script>

</head>
<body>
<div id="top" style="background: url('<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
images/<?php if (isset($_COOKIE['theme'])){?><?php echo $_COOKIE['theme'];?>
<?php }else{ ?>blue<?php }?>_top_center_back.png') 0 0 repeat-x">
        <div id="top-center">
              <div id="top-center-row1">
                  <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
<?php echo $_smarty_tpl->tpl_vars['LANGUAGE']->value;?>
"><img  src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
images/logo.png" alt="amio logo"></a>
                  <?php if (!isset($_SESSION['user_id'])){?>
                      <div id="login-div">
                          <form method="POST" action="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
<?php echo $_smarty_tpl->tpl_vars['LANGUAGE']->value;?>
/login" >
                              <input type="text" name="email" id="email" placeholder="Email"/>
                              <input type="password" name="password" id="password" placeholder="Password"/>
                              <input type="submit" name="Submit" id="submit-btn" value="Login" style="background: url('<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
images/<?php if (isset($_COOKIE['theme'])){?><?php echo $_COOKIE['theme'];?>
<?php }else{ ?>blue<?php }?>_bar.png') 0 0 repeat-x" />

                          </form>
                          <div id="register-link"><?php echo $_smarty_tpl->getConfigVariable('not_registered');?>
<a href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
<?php echo $_smarty_tpl->tpl_vars['LANGUAGE']->value;?>
/register"><?php echo $_smarty_tpl->getConfigVariable('click_here');?>
</a></div>
                      </div>
                  <?php }else{ ?>
                   <div style="float:right;color:white"><?php echo $_smarty_tpl->getConfigVariable('hello');?>
 &nbsp;<?php echo $_SESSION['last_name'];?>
,&nbsp;&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
<?php echo $_smarty_tpl->tpl_vars['LANGUAGE']->value;?>
/logout"><?php echo $_smarty_tpl->getConfigVariable('logout');?>
</a>&nbsp;</div>
                  <?php }?>
              </div>
            <div id="top-center-row2">
                 <ul id="main-links">
                     
                     <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
<?php echo $_smarty_tpl->tpl_vars['LANGUAGE']->value;?>
/index"><?php echo $_smarty_tpl->getConfigVariable('home');?>
</a></li>
                     <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
<?php echo $_smarty_tpl->tpl_vars['LANGUAGE']->value;?>
/news"><?php echo $_smarty_tpl->getConfigVariable('news');?>
</a></li>
                     <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
<?php echo $_smarty_tpl->tpl_vars['LANGUAGE']->value;?>
/contact"><?php echo $_smarty_tpl->getConfigVariable('contact');?>
</a></li>
                     <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
<?php echo $_smarty_tpl->tpl_vars['LANGUAGE']->value;?>
/about"><?php echo $_smarty_tpl->getConfigVariable('about_us');?>
</a></li>
                 </ul>
            </div>
        </div>
</div>

<div class="shell" id="shell">
    <div id="change-theme">
        <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
images/choose_blue.png" alt="blue"/>
        <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
images/choose_green.png" alt="green"/>
        <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
images/choose_pink.png" alt="pink"/>
        <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
images/choose_red.png" alt="red"/>
        <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
images/choose_violet.png" alt="violet"/>
        <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
images/choose_yellow.png" alt="yellow"/>
    </div>
    <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
images/<?php if (isset($_COOKIE['theme'])){?><?php echo $_COOKIE['theme'];?>
<?php }else{ ?>blue<?php }?>_spiral.png" alt="top spiral">
    <div class="social-media">
       <span class='st_sharethis_hcount' displayText='ShareThis'></span>
        <span  class='st_facebook_hcount' displayText='Facebook'></span>
        <span class='st_fblike_hcount' displayText='Facebook Like'></span>
        <span class='st_twitterfollow_hcount' displayText='Twitter Follow' st_username='Amio'></span>
        <span class='st_twitter_hcount' displayText='Tweet'></span>
        <span class='st_googleplus_hcount' displayText='Google +'></span>
        <span class='st_plusone_hcount' displayText='Google +1'></span>
        <span class='st_linkedin_hcount' displayText='LinkedIn'></span>
    </div>
    
  <div id="news-shell">
          <div id="search-div">
              <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
images/search.png"/>
              <form  action="" onsubmit="return false;">
                 <input type="text" onkeydown="searchNews(this,event);" placeholder="<?php echo $_smarty_tpl->getConfigVariable('search_in_blog');?>
...">
              </form>
          </div>

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
                    <div class="news">
                        <div class="news-title">
                          <h3><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
<?php echo $_smarty_tpl->tpl_vars['LANGUAGE']->value;?>
/news/details/<?php echo ((smarty_modifier_replace($_smarty_tpl->tpl_vars['news']->value[$_smarty_tpl->getVariable('smarty')->value['section']['inc']['index']]['title'],' ','-')).('-')).($_smarty_tpl->tpl_vars['news']->value[$_smarty_tpl->getVariable('smarty')->value['section']['inc']['index']]['news_id']);?>
"><?php echo $_smarty_tpl->tpl_vars['news']->value[$_smarty_tpl->getVariable('smarty')->value['section']['inc']['index']]['title'];?>
</a></h3>
                        </div>
                        <div class="news-body">
                          <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
images/article.png"/> <span class="label ">Posted on <?php echo $_smarty_tpl->tpl_vars['news']->value[$_smarty_tpl->getVariable('smarty')->value['section']['inc']['index']]['date_posted'];?>
</span><p><?php echo strip_tags($_smarty_tpl->tpl_vars['news']->value[$_smarty_tpl->getVariable('smarty')->value['section']['inc']['index']]['news']);?>
</p>
                        </div>
                    </div>
            <?php endfor; endif; ?>
          <!--End of span3  right-side-->
  </div>


</div>

</body>
</html><?php }} ?>