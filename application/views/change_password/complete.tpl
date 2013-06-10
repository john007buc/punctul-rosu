{extends file="home_layout.tpl"}
{block name="link"}
<link rel="stylesheet" type="text/css" href="{$BASE_PATH}css/register.css" />
{/block}
{block name="script"}
{/block}

{block name="contents"}

    <div class="wrap-form" style="border: 1px solid grey">

    {**************************************Form messages******************************}
        <div id=registration-messages>
            {if isset($message)}
                {$message}
                {elseif isset($errors)}
                <div id="error-msg">
                    <img src="{$BASE_PATH}images/warning.png" alt="amio login"/><br/>
                    {foreach from=$errors key=k item=v}
                            {$v}</br>
                    {/foreach}
                </div>
            {/if}
        </div>
    {***************************************************************************************}
        <form method="POST" action="{$BASE_PATH}{$LANGUAGE}/change_password/complete">
            <img style="float:left;margin-bottom:10px" src="{$BASE_PATH}images/key_login.png" width="40px" height="40px">
            {if isset($recovery_id)}
              <input type="hidden" name="recovery_id" value="{$recovery_id}"/>
            {/if}

            {if isset($hash)}
                <input type="hidden" name="hash" value="{$hash}"/>
            {/if}

            <div class="control-group">
                <label class="control-label" for="password1">{#new_password#}:<span class="required">*</span> </label>
                <div class="controls">
                    <input type="password" name="password1" id="password1" value="{if isset($smarty.post.subject)}{$smarty.post.subject}{/if}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="password2">{#confirm_password#}:<span class="required">*</span> </label>
                <div class="controls">
                    <input type="password" name="password2" id="password2" value="{if isset($smarty.post.subject)}{$smarty.post.subject}{/if}">
                </div>
            </div>

            <div class="control-group">

                <div class="controls">
                    <button type="submit"  class="btn">{#save#}</button>
                </div>
            </div>

        </form>
    </div>
{/block}