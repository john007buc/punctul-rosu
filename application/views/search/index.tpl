{extends file="home_layout.tpl"}
{block name="link"}
<link type="text/css" rel="stylesheet" href="{$BASE_PATH}css/search.css"/>
{/block}
{block name="script"}
<script src="{$BASE_PATH}javascript/search.js" type="text/javascript"></script>

{/block}

{block name="contents"}
    <div class="row-fluid">
        <div class="span3 pagination-centered search-panel">
            <form id="my-search-form" class="form-horizontal" action="{$BASE_PATH}{$LANGUAGE}/home/get_routes"  method="POST">
                <fieldset>
                    <legend>{#search_route#}</legend>
                    <div  id="select-div">
                        <select  name="select_type" class="select-type input-medium">
                            <option value="0">{#choose_type#}</option>
                            <option value="1">{#in_country#}</option>
                            <option value="2">{#in_city#}</option>
                            <option value="3">{#at_mountains#}</option>
                            <option value="4">{#at_seaside#}</option>
                        </select>
                        <br/>
                    </div>
                    <br/>
                   <label>{#from#}: </label>
                   <input class="input-medium" type="text" id="departureCity" name="location1" placeholder="" >
                   <label>{#to#}:</label>
                   <input class="input-medium"  type="text" id="arrivalCity" name="location2" placeholder="">
                    <br/>
                    <label>{#from_date#}:</label>
                    <input class="input-medium"  type="text" id="departureDate" name="date1" placeholder="" >
                    <br/>
                    <label>{#to_date#}:</label>
                    <input class="input-medium"  type="text" id="arrivalDate" name="date2" placeholder="" >
                    <br/>
                    <br/>
                     <div >
                        <a href="#" class="submit-form-link btn   btn-inverse" rel="passager-{$LANGUAGE}">{#search_passager#}</a><br/>
                        <a href="#" class="submit-form-link btn  btn-warning" rel="driver-{$LANGUAGE}">{#search_driver#}</a>
                     </div>
                </fieldset>
            </form>
        </div><!--End of span3-->
        <div class="span9" id="jquery_search_results">
            <table class="table  table-hover table-striped1" id="my-table-results">
                <caption id="my-table-caption">{#latest_routes#}</caption>
                <thead>
                <tr>
                    <th>{#user#}</th>
                    <th>{#from#}</th>
                    <th>{#to#}</th>
                    <th>{#date#}</th>
                    <th>{#more#}</th>
                </tr>
                </thead>
                <tbody>
                    {section name=inc loop=$latest_routes}
                    <tr >
                        <td>{if $latest_routes[inc].user_type=="driver"}<img src="{$BASE_PATH}images/cars.png"/>{else}<img src="{$BASE_PATH}images/user.png"/>{/if}</td>
                        <td>{$latest_routes[inc].from_}</td>
                        <td>{$latest_routes[inc].to_}</td>
                        <td>{$latest_routes[inc].date}</td>
                        <td><a class="btn btn-mini details_btn" href="#" rel="{$LANGUAGE}-{$latest_routes[inc].from_}-{$latest_routes[inc].to_}-{$latest_routes[inc].route_id}">Detalii</a></td>
                    </tr>
                    {/section}
                </tbody>
            </table>
        </div><!--End of span9-->
     </div><!--End of .row-fluid-->
{/block}