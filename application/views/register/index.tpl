{extends file="home_layout.tpl"}
{block name="link"}
<link rel="stylesheet" href="{$BASE_PATH}css/register.css" type="text/css"/>
{/block}
{block name="script"}
<script src="{$BASE_PATH}javascript/register.js" type="text/javascript"></script>
{/block}
{block name="contents"}
 <div class="wrap-form">
     {**************************************Form messages******************************}
     <div id=registration-messages>
         {if isset($registration_message)}
           {$registration_message}
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

   <div id="register-form-header"><img src="{$BASE_PATH}images/user_friend.png"/><h3>Formular inregistrare</h3></div>
   <form method="POST" action="{$BASE_PATH}{$LANGUAGE}/register">
        <div class="control-group">
            <label class="control-label">{#first_name#}:<span class="required">*</span></label>
            <div class="controls">
                <input type="text" name="first_name" value="{if isset($smarty.post.first_name)}{$smarty.post.first_name}{/if}" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">{#last_name#}:<span class="required">*</span></label>
            <div class="controls">
                <input type="text" name="last_name" value="{if isset($smarty.post.last_name)}{$smarty.post.last_name}{/if}" />
            </div>
        </div>
       <div class="control-group">
           <label class="control-label">Email:<span class="required">*</span></label>
           <div class="controls">
               <input type="text" name="email" value="{if isset($smarty.post.email)}{$smarty.post.email}{/if}" />
           </div>
       </div>
       <div class="control-group">
           <label class="control-label">{#password#}:<span class="required">*</span></label>
           <div class="controls">
               <input type="password" name="password1" value="{if isset($smarty.post.password1)}{$smarty.post.password1}{/if}" />
           </div>
       </div>
       <div class="control-group">
           <label class="control-label">{#confirm_password#}:<span class="required">*</span></label>
           <div class="controls">
               <input type="password" name="password2" value="{if isset($smarty.post.password2)}{$smarty.post.password2}{/if}"/>
           </div>
       </div>
       <div class="control-group">
           <label class="control-label"></label>
           <div class="controls">
               <input type="submit" name="Submit" value="{#register#}" />
           </div>
       </div>
   </form>
 </div>

{/block}