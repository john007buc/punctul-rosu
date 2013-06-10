<!DOCTYPE html>
<html>
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
    <meta property="og:title" content="Antrenamentul Mintii Intensiv Online" />
    <meta property="og:image" content="http://www.amio.biz/images/logo.png" />
    <meta property="og:url" content="http://www.amio.biz/{$LANGUAGE}" />
    <meta property="og:description" content="Mai simplu spus AMIO , este o aplicatie care isi propune sa ofere un avantaj important tuturor vorbitorilor de limba romana, care doresc sa isi antreneze mintea!" />
    <meta property="og:site_name" content="AMIO.BIZ" />
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


    {*jquery-ui este necesara pentru calendarul datepicker*}
    <link rel="stylesheet" href="{$BASE_PATH}css/template.css" type="text/css"/>

    {block name="link"}{/block}
    <script src="{$BASE_PATH}javascript/myhelpers.js" type="text/javascript"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <!--Scripturi penturi pentru login,search news, backstretch etc-->
    <script src="{$BASE_PATH}javascript/template.js" type="text/javascript"></script>
    <!--Stabileste inaltime fivului #shell egala cu valoarea $(window).height-->
    <script src="{$BASE_PATH}javascript/fill_window.js" type="text/javascript"></script>

    <!--Share tis buttons-->
    {literal}
       <script type="text/javascript">
          var switchTo5x=true;
       </script>
    {/literal}
    <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
   {literal}
       <script type="text/javascript">
           stLight.options({ publisher:'a417e590-1fe0-415a-8591-8f78596fba1c',shorten:false});
       </script>
    {/literal}
    {block name="script"}{/block}
</head>
<body>
<div id="top" style="background: url('{$BASE_PATH}images/{if isset($smarty.cookies.theme)}{$smarty.cookies.theme}{else}blue{/if}_top_center_back.png') 0 0 repeat-x">
        <div id="top-center">
              <div id="top-center-row1">
                  <a href="{$BASE_PATH}{$LANGUAGE}"><img  src="{$BASE_PATH}images/logo.png" alt="amio logo"></a>
                  {if !isset($smarty.session.user_id)}
                      <div id="login-div">
                          <form method="POST" action="{$BASE_PATH}{$LANGUAGE}/login" >
                              <input type="text" name="email" id="email" placeholder="Email"/>
                              <input type="password" name="password" id="password" placeholder="Password"/>
                              <input type="submit" name="Submit" id="submit-btn" value="Login" style="background: url('{$BASE_PATH}images/{if isset($smarty.cookies.theme)}{$smarty.cookies.theme}{else}blue{/if}_bar.png') 0 0 repeat-x" />

                          </form>
                          <div id="register-link">{#not_registered#}<a href="{$BASE_PATH}{$LANGUAGE}/register">{#click_here#}</a></div>
                      </div>
                  {else}
                   <div style="float:right;color:white">{#hello#} &nbsp;{$smarty.session.last_name},&nbsp;&nbsp;<a href="{$BASE_PATH}{$LANGUAGE}/logout">{#logout#}</a>&nbsp;</div>
                  {/if}
              </div>
            <div id="top-center-row2">
                 <ul id="main-links">
                     {*<li><a href="{$BASE_PATH}{$LANGUAGE}/index"><img src="{$BASE_PATH}images/b1.png" alt="index"></a></li>
                     <li><a href="{$BASE_PATH}{$LANGUAGE}/news"><img src="{$BASE_PATH}images/b4.png" alt="news"></a></li>
                     <li><a href="{$BASE_PATH}{$LANGUAGE}/contact"><img src="{$BASE_PATH}images/b3.png" alt="contact"></a></li>
                     <li><a href=""><img src="{$BASE_PATH}images/b2.png" alt="amio about"></a></li>*}
                     <li><a href="{$BASE_PATH}{$LANGUAGE}/index">{#home#}</a></li>
                     <li><a href="{$BASE_PATH}{$LANGUAGE}/news">{#news#}</a></li>
                     <li><a href="{$BASE_PATH}{$LANGUAGE}/contact">{#contact#}</a></li>
                     <li><a href="{$BASE_PATH}{$LANGUAGE}/about">{#about_us#}</a></li>
                 </ul>
            </div>
        </div>
</div>
{*<div id="top-spiral">

</div>*}
<div class="shell" id="shell">
    <div id="change-theme">
        <img src="{$BASE_PATH}images/choose_blue.png" alt="blue"/>
        <img src="{$BASE_PATH}images/choose_green.png" alt="green"/>
        <img src="{$BASE_PATH}images/choose_pink.png" alt="pink"/>
        <img src="{$BASE_PATH}images/choose_red.png" alt="red"/>
        <img src="{$BASE_PATH}images/choose_violet.png" alt="violet"/>
        <img src="{$BASE_PATH}images/choose_yellow.png" alt="yellow"/>
    </div>
    <img src="{$BASE_PATH}images/{if isset($smarty.cookies.theme)}{$smarty.cookies.theme}{else}blue{/if}_spiral.png" alt="top spiral">
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
    {block name="contents"}


    {/block}

</div>

</body>
</html>