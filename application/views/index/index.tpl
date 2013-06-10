{extends file="home_layout.tpl"}
{block name="link"}
<link href='http://fonts.googleapis.com/css?family=Gabriela' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="{$BASE_PATH}css/index.css" type="text/css"/>
{/block}
{block name="script"}
<script src="{$BASE_PATH}javascript/index.js" type="text/javascript"></script>
{/block}
{block name="contents"}

<div id="intro1">
    <b>Antrenamentul Mintii Intensiv Online</b><br/>
    {#intro1#}
</div>

<div id="categories-div" style="background: url('{$BASE_PATH}images/{if isset($smarty.cookies.theme)}{$smarty.cookies.theme}{else}blue{/if}_bar.png') 0 0 repeat-x;">
    <div class="category">
        <a href="{$BASE_PATH}{$LANGUAGE}/math"><img src="{$BASE_PATH}images/math_{if isset($smarty.cookies.theme)}{$smarty.cookies.theme}{else}blue{/if}_cat.png" alt="{#math#} cat"/></a>
        <h2>{#math#}</h2>
    </div>
    <div class="category">
        <img src="{$BASE_PATH}images/arhitecture_{if isset($smarty.cookies.theme)}{$smarty.cookies.theme}{else}blue{/if}_cat.png" alt="{#arhitecture#} cat"/>
        <h2>{#arhitecture#}</h2>
    </div>
    <div class="category">
        <img src="{$BASE_PATH}images/chemistry_{if isset($smarty.cookies.theme)}{$smarty.cookies.theme}{else}blue{/if}_cat.png" alt="{#chemistry#} cat"/>
        <h2>{#chemistry#}</h2>
    </div>
    <div class="category">
        <img src="{$BASE_PATH}images/anatomy_{if isset($smarty.cookies.theme)}{$smarty.cookies.theme}{else}blue{/if}_cat.png" alt="{#anatomy#} cat"/>
        <h2>{#anatomy#}</h2>
    </div>
    <div class="category">
        <img src="{$BASE_PATH}images/geography_{if isset($smarty.cookies.theme)}{$smarty.cookies.theme}{else}blue{/if}_cat.png" alt="{#geography#} cat"/>
        <h2>{#geography#}</h2>
    </div>
    <div class="category">
        <img src="{$BASE_PATH}images/history_{if isset($smarty.cookies.theme)}{$smarty.cookies.theme}{else}blue{/if}_cat.png" alt="{#history#} cat"/>
        <h2>{#history#}</h2>
    </div>
    <div class="category">
        <img src="{$BASE_PATH}images/picture_{if isset($smarty.cookies.theme)}{$smarty.cookies.theme}{else}blue{/if}_cat.png" alt="{#picture#} cat"/>
        <h2>{#picture#}</h2>
    </div>

    <div class="category">
        <img src="{$BASE_PATH}images/soon_cat.png" alt="{#soon#} cat"/>
        <h2>{#soon#}</h2>
    </div>
</div>

<div id="intro2">
    <p>
     {#intro2#}
    </p>
</div>

{/block}