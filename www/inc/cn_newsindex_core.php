<?php
require "../inc/config.php";
require "../inc/function.class.php";
require "../inc/cn_header_core.php";//页头 页脚调用 重复调用 如果买个页都涉及 可以写到这里

$pageid=$getvars[1];
$str=getpagesetinfo($pageid,'content,title,pagetitle,keywords,description,content');//获得版面管理的内容 标题 页面标题 等

$getnewsdir2=getnewsdir2(22);//取出新闻二级目录


?>