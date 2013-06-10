{extends file="home_layout.tpl"}
{block name="link"}<link type="text/css" rel="stylesheet" href="{$BASE_PATH}css/add.css"/>{/block}
{block name="script"}<script src="{$BASE_PATH}javascript/add.js" type="text/javascript"></script>{/block}

{block name="contents"}

<div class="row-fluid add-wrap pagination-centered">


        <div class="span7 offset1 add-div">
         {if isset($smarty.session.email)}

            <h3>Adauga cursa noua</h3>
            {*****************************Flash messenger area***********************************}
                {if isset($flash_messages) && is_array($flash_messages)}
                    <div class="alert alert-error " id="login-errors">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <ul>
                            {section name=err_inc loop=$flash_messages}
                                <li>{$flash_messages[err_inc]}</li>
                            {/section}
                        </ul>
                    </div>
                    {elseif isset($flash_messages)}
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {$flash_messages}
                    </div>
                {/if}
            {************************************************************************************}

            <form class="form-horizontal" action="{$BASE_PATH}{$LANGUAGE}/add"  method="POST">
                      <div class="control-group" id="select-type">
                          <label class="control-label">{#choose_route_type#}:</label>
                          <div class="controls">
                                {*<label class="radio inline">
                                    <input type="radio" class="route_type" name="route_type"  value="1" {if isset($smarty.post.route_type) && $smarty.post.route_type==1}checked="checked"{elseif !isset($smarty.post.route_type)}checked="checked"{/if}>
                                    {#in_country#}
                                </label>
                                 <label class="radio inline">
                                    <input type="radio" class="route_type" name="route_type" value="2" {if isset($smarty.post.route_type) && $smarty.post.route_type==2}checked="checked"{/if}>
                                     {#in_city#}
                                </label>
                                <label class="radio inline">
                                    <input type="radio" class="route_type" name="route_type" value="3" {if isset($smarty.post.route_type) && $smarty.post.route_type==3}checked="checked"{/if}>
                                    {#at_mountains#}
                                </label>
                                <label class="radio inline">
                                    <input type="radio" class="route_type" name="route_type" value="4" {if isset($smarty.post.route_type) && $smarty.post.route_type==4}checked="checked"{/if}>
                                    {#at_seaside#}
                                </label>*}
                                    <select  name="route_type" class="route_type">
                                        <option value="0" {if isset($smarty.post.route_type) && $smarty.post.route_type==0}selected="selected"{/if}>Selecteaza tipul</option>
                                        <option value="1" {if isset($smarty.post.route_type) && $smarty.post.route_type==1}selected="selected"{/if}>In tara</option>
                                        <option value="2" {if isset($smarty.post.route_type) && $smarty.post.route_type==2}selected="selected"{/if}>In oras</option>
                                        <option value="3" {if isset($smarty.post.route_type) && $smarty.post.route_type==3}selected="selected"{/if}>La munte</option>
                                        <option value="4" {if isset($smarty.post.route_type) && $smarty.post.route_type==4}selected="selected"{/if}>La mare</option>
                                    </select>

                          </div>
                      </div>
                     {********************Setting the default value of citiy select element in the case of post errors********************}
                    {if isset($smarty.post.route_type) && $smarty.post.route_type==2}
                        {literal}<script language="javascript">addCities({/literal}{if isset($smarty.post.city)}{$smarty.post.city}{/if}{literal});</script>{/literal}
                    {/if}

                   <div class="control-group">
                       <label class="control-label">{#i_am#}</label>
                       <div class="controls">
                           <label class="radio inline">
                               <input type="radio" class="user_type" name="user_type" value="driver" {if isset($smarty.post.route_type) && $smarty.post.user_type=="driver"}checked="checked"{elseif !isset($smarty.post.user_type)}checked="checked"{/if}>
                               {#driver#}
                           </label>
                           <label class="radio inline">
                               <input type="radio" class="user_type" name="user_type" value="passager" {if isset($smarty.post.user_type) && $smarty.post.user_type=="passager"}checked="checked"{/if}>
                               {#passager#}
                           </label>
                       </div>

                   </div>


                <input type="hidden" name="language" value="{$LANGUAGE}">
                <div class="control-group">
                    <label class="control-label" for="location1">{#from#}<span class="my_require">*</span></label>
                    <div class="controls">
                        <input type="text" id="location1" name="location1" placeholder="{#from#}" value="{if isset($smarty.post.location1)}{$smarty.post.location1}{/if}" >
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="location2">{#to#}<span class="my_require">*</span></label>
                    <div class="controls">
                        <input type="text"  id="location2" name="location2" placeholder="{#to#}" value="{if isset($smarty.post.location2)}{$smarty.post.location2}{/if}" >
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="distance"> {#distance#} (Km)</label>
                    <div class="controls">
                        <input type="text"   id="distance" name="distance" placeholder="{#distance#}" value="{if isset($smarty.post.distance)}{$smarty.post.distance}{/if}" >
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="places">{#places#}<span class="my_require">*</span></label>
                    <div class="controls">
                        <input type="text"  id="places" name="places" placeholder="{#places#}" value="{if isset($smarty.post.places)}{$smarty.post.places}{/if}">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="price">{#price#}</label>
                    <div class="controls">
                        <input type="text"  id="price" name="price" placeholder="{#price#}" value="{if isset($smarty.post.price)}{$smarty.post.price}{/if}">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="datepicker1">{#date#}<span class="my_require">*</span></label>
                    <div class="controls">
                        <input type="text" id="datepicker1" name="date" placeholder="{#date#}" value="{if isset($smarty.post.date)}{$smarty.post.date}{/if}">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="time">{#time#}</label>
                    <div class="controls">
                        <input type="text"  id="time" name="time" placeholder="00:00" value="{if isset($smarty.post.time)}{$smarty.post.time}{/if}">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="observation">{#observations#}</label>
                    <div class="controls">
                        <textarea rows="4" cols="50" id="observation" name="observation" placeholder="Adauga observatii legate de traseu">-{if isset($smarty.post.observation)}{$smarty.post.observation}{/if}</textarea>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-primary ">{#add_route#}</button>
                    </div>
                </div>

            </form>
          {else}
             <div class="alert alert-error " id="login-errors">
                 <button type="button" class="close" data-dismiss="alert">&times;</button>
                 <img src="{$BASE_PATH}images/warning.png">{#login_access#}
             </div>
          {/if}
        </div><!--end of div span 7 offset1-->
        <div class="span3 pull-right right-side">
        {include file="right_side.tpl"}
        </div>
</div>
{/block}