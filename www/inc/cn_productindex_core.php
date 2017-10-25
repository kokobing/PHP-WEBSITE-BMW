<?php
require "../inc/config.php";
require "../inc/function.class.php";
require "../inc/cn_header_core.php";//页头 页脚调用 重复调用 如果买个页都涉及 可以写到这里

$pageid=$getvars[1];
$str=getpagesetinfo($pageid,'content,title,pagetitle,keywords,description');//获得版面管理的内容 标题 页面标题 等

$getproductdir2=getproductdir2(1);//取出指定FATHERID的所有二级目录


?>