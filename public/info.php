<?php


echo "document_root: ".$_SERVER['DOCUMENT_ROOT']."<br/>";

echo "http-host: ".$_SERVER['HTTP_HOST']."<br/>";

echo "request-uri: ".$_SERVER["REQUEST_URI"]."<br/>";

echo "server path info: ".$_SERVER["PATH_INFO"]."<br/>";

$pathArray=explode('/',trim($_SERVER['REQUEST_URI'],'/'));
print_r($pathArray);
?>