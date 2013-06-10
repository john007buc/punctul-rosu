{extends file="home_layout.tpl"}
{block name="link"}
 <link rel="stylesheet" type="text/css" href="{$BASE_PATH}css/news.css" />
{/block}
{block name="script"}
<script src="{$BASE_PATH}javascript/search.js" type="text/javascript"></script>
{/block}

{block name="contents"}
  <div id="news-shell">
          <div id="search-div">
              <img src="{$BASE_PATH}images/search.png"/>
              <form  action="" onsubmit="return false;">
                 <input type="text" onkeydown="searchNews(this,event);" placeholder="{#search_in_blog#}...">
              </form>
          </div>

           {section name=inc loop=$news}
                    <div class="news">
                        <div class="news-title">
                          <h3><a href="{$BASE_PATH}{$LANGUAGE}/news/details/{$news[inc].title|replace:' ':'-'|cat:'-'|cat:$news[inc].news_id}">{$news[inc].title}</a></h3>
                        </div>
                        <div class="news-body">
                          <img src="{$BASE_PATH}images/article.png"/> <span class="label ">Posted on {$news[inc].date_posted}</span><p>{$news[inc].news|strip_tags:true}</p>
                        </div>
                    </div>
            {/section}
          {*<div class="right-side">
             {include file="right_side.tpl"}
          </div>*}<!--End of span3  right-side-->
  </div>
{/block}