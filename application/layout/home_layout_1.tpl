<!DOCTYPE html>
<html>
<head>
   {*<meta name="viewport" content="width=device-width, initial-scale=1.0"/>*}
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
    {*Incarca fisierul de configurare de unde citeste parametrii in functie de limba aleasa*}
    {if $LANGUAGE_FILE!=null}{config_load file=$LANGUAGE_FILE}{/if}
    <title>{block name="title"}{/block}</title>
    {* Acestea sunt variabile globala valabile in tot codul js*}
    {literal}
        <script type="text/javascript">
            var BASE_PATH="{/literal}{$BASE_PATH}{literal}";
           // var ROOT="{$ROOT}";
            var LANGUAGE="{/literal}{$LANGUAGE}{literal}";
        </script>
    {/literal}

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
    {*jquery-ui este necesara pentru calendarul datepicker*}
    <link rel="stylesheet" href="{$BASE_PATH}css/template.css" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{$BASE_PATH}fancybox/jquery.fancybox.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine"/>
    {block name="link"}{/block}
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
    <!--Fixeaza imaginea de background-->
    <script src="{$BASE_PATH}javascript/backstretch.js" type="text/javascript"></script>
    <!--Galeria foto fancybox-->
    <script type="text/javascript" src="{$BASE_PATH}fancybox/jquery.fancybox.js"></script>
    <!--Scripturi penturi pentru login,search news, backstretch etc-->
    <script src="{$BASE_PATH}javascript/template.js" type="text/javascript"></script>
    <!--Stabileste inaltime fivului #shell egala cu valoarea $(window).height-->
    <script src="{$BASE_PATH}javascript/fill_window.js" type="text/javascript"></script>
    {block name="script"}{/block}
</head>
<body>
<div id="top">
    <div id="top-center">
          <div id="top-center-row1">
              <img src="{$BASE_PATH}images/logo.png" alt="amio logo">
              {if !isset($smarty.session.user_id)}
                  <div id="login-div">
                      <form method="POST" action="{$BASE_PATH}{$LANGUAGE}/login" >
                          <input type="text" name="email" id="email" placeholder="Email"/>
                          <input type="password" name="password" id="password" placeholder="Password"/>
                          <input type="submit" name="Submit" id="submit-btn" value="" />
                      </form>
                      <div id="register-link">{#not_registered#}<a href="{$BASE_PATH}{$LANGUAGE}/register">{#click_here#}</a></div>
                  </div>
              {else}
               <div style="float:right;color:white">{#hello#},&nbsp;{$smarty.session.email}&nbsp;<a href="{$BASE_PATH}{$LANGUAGE}/logout">{#logout#}</a></div>
              {/if}
          </div>
        <div id="top-center-row2">
             <ul id="main-links">
                 <li><a href="{$BASE_PATH}{$LANGUAGE}/index"><img src="{$BASE_PATH}images/b1.png" alt="index"></a></li>
                 <li><a href="{$BASE_PATH}{$LANGUAGE}/news"><img src="{$BASE_PATH}images/b4.png" alt="news"></a></li>
                 <li><a href="{$BASE_PATH}{$LANGUAGE}/contact"><img src="{$BASE_PATH}images/b3.png" alt="contact"></a></li>
                 <li><a href=""><img src="{$BASE_PATH}images/b2.png" alt="amio about"></a></li>
             </ul>
        </div>
    </div>
</div>
<div id="top-spiral">
        <img src="{$BASE_PATH}images/spiral.png" alt="top spiral">
</div>
<div id="shell">
{block name="contents"}

{/block}
</div>

</body>
</html>