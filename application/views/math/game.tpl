{extends file="home_layout.tpl"}
{block name="link"}
<link rel="stylesheet" type="text/css" href="{$BASE_PATH}games/math/joc{$game_nr}/stiluri.css">
{/block}
{block name="script"}
<script type="text/JavaScript" src="{$BASE_PATH}games/text/lang-{$LANGUAGE}.js"></script>
<script type="text/JavaScript" src="{$BASE_PATH}games/math/joc{$game_nr}/config.js"></script>
<script type="text/JavaScript" src="{$BASE_PATH}games/math/joc{$game_nr}/joc.js"></script>
{/block}
{block name="contents"}
<br/><br/>
<div>
    <canvas id="canvasjoc" width="640" height="480" />
</div>
<span id="se_incarca">
        <img src="{$BASE_PATH}games/imagini/asteapta.gif" alt="asteapta mesaj de la server" height="32" width="32" />
    </span>
    {literal}
    <script type="text/javascript">
        Init();
    </script>
    {/literal}
<BR/>
<BR/>
<BR/>
<div id="debug">
</div>
{/block}