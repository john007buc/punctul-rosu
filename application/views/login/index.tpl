{extends file="home_layout.tpl"}
{block name="link"}
<link rel="stylesheet" href="{$BASE_PATH}css/login.css" type="text/css"/>
{/block}
{block name="contents"}
    {literal}
        <script type="text/javascript">
            element = document.getElementById("login-div");
            element.parentNode.removeChild(element);
        </script>
    {/literal}

    <div id="login-form-div">
        {********************************Login messages**************************************}
        <div id="login-messages">
         {if isset($errors)}
           <img src="{$BASE_PATH}images/warning.png" alt="amio login"/>
          {$errors}
        {/if}
        </div>
        {************************************************************************************}

        <div id="login-form-header"><img src="{$BASE_PATH}images/key_login.png" alt="amio login"/>&nbsp;<label class="form-head">Login</label></div>

        <form method="POST" action="">
            <div class="control-group">
                <label class="control-label">Email:<span class="required">*</span></label>
                <div class="controls">
                    <input type="text" name="email" value="{if isset($smarty.post.email)}{$smarty.post.email}{/if}" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">{#password#}:<span class="required">*</span></label>
                <div class="controls">
                    <input type="password" name="password" value="{if isset($smarty.post.password)}{$smarty.post.password}{/if}" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"></label>
                <div class="controls">
                    <input type="submit" name="Submit" value="Login" />
                </div>
            </div>
        </form>

        <p>{#not_registered#}<a href="{$BASE_PATH}{$LANGUAGE}/register"> {#click_here#}</a>&nbsp;|&nbsp;<a href="" onclick="get_recovery(event);">{#password_recovery#}</a></p>
    </div>
{/block}