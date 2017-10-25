<?php
require "../inc/config.php";
require "../inc/function.class.php";
require "../inc/cn_header_core.php";//页头 页脚调用 重复调用 如果买个页都涉及 可以写到这里


$str=getpagesetinfo(6,'content,title,pagetitle,keywords,description,intro');//pagetitle、keywords、description调用
$pagesetallpic=getpagesetallpic(6);//联系我们文字调用
?>