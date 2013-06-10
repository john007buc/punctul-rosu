{extends file="home_layout.tpl"}
{block name="link"}
<link rel="stylesheet" type="text/css" href="{$BASE_PATH}css/news.css" />
{/block}
{block name="contents"}
  <div >
    <div class="news-details">
        <h2>{$news.title}</h2>
        <span >Posted on {$news.date_posted}</span>
        <div class="news-details-body">{$news.news}</div>
    </div>

   {* <div class="span3 pull-right right-side">
     {include file="right_side.tpl"}
    </div><!--End of span3  right-side-->*}

  </div>
{/block}