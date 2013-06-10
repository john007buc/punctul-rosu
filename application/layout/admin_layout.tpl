<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="{$BASE_PATH}css/admin.css">
    <script type="text/javascript" src="{$BASE_PATH}javascript/myhelpers.js"></script>

    <script type="text/javascript">
        var BASE_PATH="{$BASE_PATH}";
        var ROOT="{$ROOT}";
    </script>
    {block name="script"}{/block}

</head>
<body>
<div id="top-shell">
    <div id="top-header">

    <h2>Panoul de administrare APTIO</h2>

    </div>
    <div id="menu">
       <ul>
           <li><a href="{$BASE_PATH}{$LANGUAGE}/admin">Acasa</a></li>
           <li><a href="{$BASE_PATH}{$LANGUAGE}/admin/categorii">Categorii</a></li>
           <li><a href="#">Teste</a></li>
           <li><a href="{$BASE_PATH}{$LANGUAGE}/admin/news">Blog</a></li>
           <li><a href="#">Indexeaza</a></li>
       </ul>

    </div>
</div>
<div id="shell">
    <div id="forms"></div>
 {block name="contents"}{/block}
</div>
</body>
</html>