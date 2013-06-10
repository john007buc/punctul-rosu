<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
{if $LANGUAGE_FILE!=null}{config_load file=$LANGUAGE_FILE}{/if}
<title>{block name="title"}{/block}</title>
<link rel="stylesheet" type="text/css" href="{$BASE_PATH}bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="{$BASE_PATH}css/main.css"/>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script src="{$BASE_PATH}javascript/jquery.backstretch.min.js" type="text/javascript"></script>
<script src="{$BASE_PATH}javascript/jquery.ez-bg-resize.js" type="text/javascript"></script>
<script src="{$BASE_PATH}javascript/main.js" type="text/javascript"></script>
<script src="{$BASE_PATH}bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{$BASE_PATH}bootstrap/js/bootstrap-collapse.js" type="text/javascript"></script>
{block name="script"}{/block}
{block name="link"}{/block}

    <script type="text/javascript">
        var BASE_PATH="{$BASE_PATH}";
        var ROOT="{$ROOT}";
    </script>

</head>
<body>



{block name="contents"}
{/block}
</body>
</html>



