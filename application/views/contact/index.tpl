{extends file="home_layout.tpl"}
{block name="link"}
<link rel="stylesheet" type="text/css" href="{$BASE_PATH}css/contact.css" />
{/block}
{block name="script"}
<script src="{$BASE_PATH}javascript/contact.js" type="text/javascript"></script>
{/block}

{block name="contents"}
  <div >
      <div class="wrap-form">

           <div id="load-gif-div" ></div>
          {*****************************Flash messenger area***********************************}
              {if isset($messages) && is_array($messages)}
                  <div class="alert-error">
                      <img src="{$BASE_PATH}images/warning.png" alt="amio login"/><br/>
                      <ol>
                          {section name=err_inc loop=$messages}
                              <li>{$messages[err_inc]}</li>
                          {/section}
                      </ol>
                  </div>
                  {elseif isset($messages)}
                  <div class="alert-success">
                      {$messages}
                  </div>
              {/if}
          {************************************************************************************}

             <form method="POST" action="{$BASE_PATH}{$LANGUAGE}/contact">
                    <img src="{$BASE_PATH}images/contact.png" width="40px" height="40px">
                     <div class="control-group">
                         <label class="control-label" for="name">{#name#}:<span class="required">*</span> </label>
                         <div class="controls">
                             <input type="text" name="name" id="name" value="{if isset($smarty.post.name)}{$smarty.post.name}{/if}">
                         </div>
                     </div>

                     <div class="control-group">
                         <label class="control-label" for="email">Email:<span class="required">*</span> </label>
                         <div class="controls">
                             <input type="text" name="email" id="email" value="{if isset($smarty.post.email)}{$smarty.post.email}{/if}">
                         </div>
                     </div>
                     <div class="control-group">
                         <label class="control-label" for="subject">{#subject#}:<span class="required">*</span> </label>
                         <div class="controls">
                             <input type="text" name="subject" id="subject" value="{if isset($smarty.post.subject)}{$smarty.post.subject}{/if}">
                         </div>
                     </div>
                     <div class="control-group">
                         <label class="control-label" for="message">{#message#}:<span class="required">*</span> </label>
                         <div class="controls">
                             <textarea name="message" id="message" cols="17" rows="5">{if isset($smarty.post.message)}{$smarty.post.message}{/if}</textarea>
                         </div>
                     </div>

                     <div class="control-group">
                         <label class="control-label">Captcha:<span class="required">*</span></label>
                             <div class="controls">
                                 <img id="captcha" src="{$BASE_PATH}{$LANGUAGE}/captcha">
                                 <a href="#" id="refreshCaptcha"><img  src="{$BASE_PATH}images/refresh.png"/></a>
                             </div>

                     </div>
                     <div class="control-group">
                         <label class="control-label">{#enter_code#}:<span class="required">*</span></label>
                         <div class="controls">
                             <input type="text" style="text-align:center;color: blue" name="secure">
                         </div>
                     </div>



                     <div class="control-group">
                         <label class="control-label"></label>
                         <div class="controls">
                           {*<button type="submit" id="submit-btn" class="btn"></button>*}
                             <input type="submit" name="Submit" value="{#send_message#}" />
                         </div>
                     </div>
                     


             </form>


      </div>
     {* <div class="span3 pull-right right-side">
      {include file="right_side.tpl"}
      </div><!--End of span3  right-side-->*}


  </div>

{/block}