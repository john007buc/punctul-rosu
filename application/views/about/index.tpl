{extends file="home_layout.tpl"}
{block name="link"}
<link rel="stylesheet" type="text/css" href="{$BASE_PATH}css/about_us.css"/>
{/block}
{block name="script"}

{/block}
{block name="contents"}
    <div id="about-us">
          <h2>{#why_amio#}</h2>
          <hr/>
          <div class="why-amio">
              <img src="{$BASE_PATH}images/about1.png"/><h3>{#about1#}<h3/>
          </div>
        <div class="why-amio">
            <img src="{$BASE_PATH}images/about2.png"/><h3>{#about2#}<h3/>
        </div>
        <div class="why-amio">
            <img src="{$BASE_PATH}images/about3.png"/><h3>{#about3#}<h3/>
        </div>
        <div class="why-amio">
            <img src="{$BASE_PATH}images/about4.png"/><h3>{#about4#}<h3/>
        </div>
        <div class="why-amio">
            <img src="{$BASE_PATH}images/about5.png"/><h3>{#about5#}<h3/>
        </div>
        <div id="amio_txt">

            <h3> {#about_last#}</h3>
        </div>

    </div>
{/block}