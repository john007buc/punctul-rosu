<?php /* Smarty version Smarty-3.1.11, created on 2013-06-01 16:11:46
         compiled from "..\application\views\register\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10380519521b2ae6c44-36831009%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '947cc3847a80f904ca71907b60b47b89813ff695' => 
    array (
      0 => '..\\application\\views\\register\\index.tpl',
      1 => 1370010803,
      2 => 'file',
    ),
    'b1a68f74b6e0f535880ba212b299a3f056bec66c' => 
    array (
      0 => '..\\application\\layout\\home_layout.tpl',
      1 => 1370027439,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10380519521b2ae6c44-36831009',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_519521b2d7e3e2_14973763',
  'variables' => 
  array (
    'LANGUAGE' => 0,
    'LANGUAGE_FILE' => 0,
    'BASE_PATH' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_519521b2d7e3e2_14973763')) {function content_519521b2d7e3e2_14973763($_smarty_tpl) {?><!DOCTYPE html>
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

    
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
css/register.css" type="text/css"/>

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
javascript/register.js" type="text/javascript"></script>

</head>
<body>
<div id="top" style="background: url('<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
images/<?php if (isset($_COOKIE['theme'])){?><?php echo $_COOKIE['theme'];?>
<?php }else{ ?>blue<?php }?>_top_center_back.png') 0 0 repeat-x">
        <div id="top-center">
              <div id="top-center-row1">
                  <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
images/logo.png" alt="amio logo">
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
/contact"><?php echo $_smarty_tpl->getConfigVariable('about_us');?>
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
       
        <span  class='st_facebook_hcount' displayText='Facebook'></span>
        <span class='st_fblike_hcount' displayText='Facebook Like'></span>
        <span class='st_twitterfollow_hcount' displayText='Twitter Follow' st_username='Amio'></span>
        <span class='st_twitter_hcount' displayText='Tweet'></span>
        <span class='st_googleplus_hcount' displayText='Google +'></span>
        <span class='st_plusone_hcount' displayText='Google +1'></span>
        
    </div>
    
 <div class="wrap-form">
     
     <div id=registration-messages>
         <?php if (isset($_smarty_tpl->tpl_vars['registration_message']->value)){?>
           <?php echo $_smarty_tpl->tpl_vars['registration_message']->value;?>

         <?php }elseif(isset($_smarty_tpl->tpl_vars['errors']->value)){?>
             <div id="error-msg">
                 <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
images/warning.png" alt="amio login"/><br/>
                 <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['errors']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                     <?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</br>
                 <?php } ?>
             </div>
         <?php }?>
     </div>
     

   <div id="register-form-header"><img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
images/user_friend.png"/><h3>Formular inregistrare</h3></div>
   <form method="POST" action="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
<?php echo $_smarty_tpl->tpl_vars['LANGUAGE']->value;?>
/register">
        <div class="control-group">
            <label class="control-label"><?php echo $_smarty_tpl->getConfigVariable('first_name');?>
:<span class="required">*</span></label>
            <div class="controls">
                <input type="text" name="first_name" value="<?php if (isset($_POST['first_name'])){?><?php echo $_POST['first_name'];?>
<?php }?>" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label"><?php echo $_smarty_tpl->getConfigVariable('last_name');?>
:<span class="required">*</span></label>
            <div class="controls">
                <input type="text" name="last_name" value="<?php if (isset($_POST['last_name'])){?><?php echo $_POST['last_name'];?>
<?php }?>" />
            </div>
        </div>
       <div class="control-group">
           <label class="control-label">Email:<span class="required">*</span></label>
           <div class="controls">
               <input type="text" name="email" value="<?php if (isset($_POST['email'])){?><?php echo $_POST['email'];?>
<?php }?>" />
           </div>
       </div>
       <div class="control-group">
           <label class="control-label"><?php echo $_smarty_tpl->getConfigVariable('password');?>
:<span class="required">*</span></label>
           <div class="controls">
               <input type="password" name="password1" value="<?php if (isset($_POST['password1'])){?><?php echo $_POST['password1'];?>
<?php }?>" />
           </div>
       </div>
       <div class="control-group">
           <label class="control-label"><?php echo $_smarty_tpl->getConfigVariable('confirm_password');?>
:<span class="required">*</span></label>
           <div class="controls">
               <input type="password" name="password2" value="<?php if (isset($_POST['password2'])){?><?php echo $_POST['password2'];?>
<?php }?>"/>
           </div>
       </div>
       <div class="control-group">
           <label class="control-label"></label>
           <div class="controls">
               <input type="submit" name="Submit" value="<?php echo $_smarty_tpl->getConfigVariable('register');?>
" />
           </div>
       </div>
   </form>
 </div>



</div>

</body>
</html><?php }} ?>