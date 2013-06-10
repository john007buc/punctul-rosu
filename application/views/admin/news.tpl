{extends file ="admin_layout.tpl"}
{block name="script"}
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="{$BASE_PATH}ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="{$BASE_PATH}javascript/blog.js"></script>

<script>



</script>


{/block}

{block name="contents"}
<div id="buttons">Selecteaza tara: {html_options name=countries id=countries options=$countries selected=$selected_country}<input onclick="createEditor();" type="button" value="Create Editor">
    <input onclick="removeEditor();" type="button" value="Remove Editor"></div>
<div id="clear"></div>
<div id="messageDiv"></div>
<div id="editor">
</div>

<div class="news-content">

    {section name=inc loop=$news}
     <div class="news" id="{$news[inc].news_id}">
         <div class="news-title"><h2>{$news[inc].title}</h2></div>
         <div class="news-description">Added on {$news[inc].date_posted}&nbsp;<a href="#" onclick="delete_news(event,{$news[inc].news_id});">Delete this news</a></div>
         <div class="news-body">{$news[inc].news|strip_tags:true}</div>
     </div>


    {/section}


</div>


<!-- This div will hold the editor. -->
{/block}