<?php /* Smarty version Smarty-3.1.11, created on 2013-06-06 15:07:23
         compiled from "..\application\views\contact\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1675651952d5e9b4728-60366980%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2d4501ecf23777e8968352d5ed8aaac9082ddfa5' => 
    array (
      0 => '..\\application\\views\\contact\\index.tpl',
      1 => 1370103894,
      2 => 'file',
    ),
    'b1a68f74b6e0f535880ba212b299a3f056bec66c' => 
    array (
      0 => '..\\application\\layout\\home_layout.tpl',
      1 => 1370531037,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1675651952d5e9b4728-60366980',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_51952d5f0c5e44_61439973',
  'variables' => 
  array (
    'LANGUAGE' => 0,
    'LANGUAGE_FILE' => 0,
    'BASE_PATH' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51952d5f0c5e44_61439973')) {function content_51952d5f0c5e44_61439973($_smarty_tpl) {?><!DOCTYPE html>
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
css/contact.css" />

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
javascript/contact.js" type="text/javascript"></script>

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
    
  <div >
      <div class="wrap-form">

           <div id="load-gif-div" ></div>
          
              <?php if (isset($_smarty_tpl->tpl_vars['messages']->value)&&is_array($_smarty_tpl->tpl_vars['messages']->value)){?>
                  <div class="alert-error">
                      <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
images/warning.png" alt="amio login"/><br/>
                      <ol>
                          <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['err_inc'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['err_inc']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['err_inc']['name'] = 'err_inc';
$_smarty_tpl->tpl_vars['smarty']->value['section']['err_inc']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['messages']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['err_inc']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['err_inc']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['err_inc']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['err_inc']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['err_inc']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['err_inc']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['err_inc']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['err_inc']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['err_inc']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['err_inc']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['err_inc']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['err_inc']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['err_inc']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['err_inc']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['err_inc']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['err_inc']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['err_inc']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['err_inc']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['err_inc']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['err_inc']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['err_inc']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['err_inc']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['err_inc']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['err_inc']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['err_inc']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['err_inc']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['err_inc']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['err_inc']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['err_inc']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['err_inc']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['err_inc']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['err_inc']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['err_inc']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['err_inc']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['err_inc']['total']);
?>
                              <li><?php echo $_smarty_tpl->tpl_vars['messages']->value[$_smarty_tpl->getVariable('smarty')->value['section']['err_inc']['index']];?>
</li>
                          <?php endfor; endif; ?>
                      </ol>
                  </div>
                  <?php }elseif(isset($_smarty_tpl->tpl_vars['messages']->value)){?>
                  <div class="alert-success">
                      <?php echo $_smarty_tpl->tpl_vars['messages']->value;?>

                  </div>
              <?php }?>
          

             <form method="POST" action="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
<?php echo $_smarty_tpl->tpl_vars['LANGUAGE']->value;?>
/contact">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
images/contact.png" width="40px" height="40px">
                     <div class="control-group">
                         <label class="control-label" for="name"><?php echo $_smarty_tpl->getConfigVariable('name');?>
:<span class="required">*</span> </label>
                         <div class="controls">
                             <input type="text" name="name" id="name" value="<?php if (isset($_POST['name'])){?><?php echo $_POST['name'];?>
<?php }?>">
                         </div>
                     </div>

                     <div class="control-group">
                         <label class="control-label" for="email">Email:<span class="required">*</span> </label>
                         <div class="controls">
                             <input type="text" name="email" id="email" value="<?php if (isset($_POST['email'])){?><?php echo $_POST['email'];?>
<?php }?>">
                         </div>
                     </div>
                     <div class="control-group">
                         <label class="control-label" for="subject"><?php echo $_smarty_tpl->getConfigVariable('subject');?>
:<span class="required">*</span> </label>
                         <div class="controls">
                             <input type="text" name="subject" id="subject" value="<?php if (isset($_POST['subject'])){?><?php echo $_POST['subject'];?>
<?php }?>">
                         </div>
                     </div>
                     <div class="control-group">
                         <label class="control-label" for="message"><?php echo $_smarty_tpl->getConfigVariable('message');?>
:<span class="required">*</span> </label>
                         <div class="controls">
                             <textarea name="message" id="message" cols="17" rows="5"><?php if (isset($_POST['message'])){?><?php echo $_POST['message'];?>
<?php }?></textarea>
                         </div>
                     </div>

                     <div class="control-group">
                         <label class="control-label">Captcha:<span class="required">*</span></label>
                             <div class="controls">
                                 <img id="captcha" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
<?php echo $_smarty_tpl->tpl_vars['LANGUAGE']->value;?>
/captcha">
                                 <a href="#" id="refreshCaptcha"><img  src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
images/refresh.png"/></a>
                             </div>

                     </div>
                     <div class="control-group">
                         <label class="control-label"><?php echo $_smarty_tpl->getConfigVariable('enter_code');?>
:<span class="required">*</span></label>
                         <div class="controls">
                             <input type="text" style="text-align:center;color: blue" name="secure">
                         </div>
                     </div>



                     <div class="control-group">
                         <label class="control-label"></label>
                         <div class="controls">
                           
                             <input type="submit" name="Submit" value="<?php echo $_smarty_tpl->getConfigVariable('send_message');?>
" />
                         </div>
                     </div>
                     


             </form>


      </div>
     


  </div>



</div>

</body>
</html><?php }} ?>