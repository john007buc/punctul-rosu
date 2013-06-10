{extends file="home_layout.tpl"}
{block name="link"}
<link rel="stylesheet" href="{$BASE_PATH}css/math.css" type="text/css"/>
{/block}
{block name="script"}
<script src="{$BASE_PATH}javascript/math.js" type="text/javascript"></script>
{/block}
{block name="contents"}
<div id="math-games">
    {section name=inc loop=$games}
        <div class="game">
           {* <a href="{$BASE_PATH}{$LANGUAGE}/math/{$games[inc].name}"><img src="{$BASE_PATH}images/game1.png"/></a>*}
               <a href="{$BASE_PATH}{$LANGUAGE}/math/game/{$smarty.section.inc.index+1}"><img src="{$BASE_PATH}images/game{$smarty.section.inc.index+1}.png" alt="{$games[inc].name}"/></a>
            <h2>{$smarty.section.inc.index+1}</h2>
        </div>
    {/section}
</div>

{/block}