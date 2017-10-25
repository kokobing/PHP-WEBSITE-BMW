<?php
require "../inc/config.php";
require "../inc/function.class.php";
require "../inc/cn_header_core.php";//页头 页脚调用 重复调用 如果买个页都涉及 可以写到这里


$ndir=$getvars[1];//获取伪静态传递参数
$nid=$getvars[2];//获取伪静态传递参数

//根据目录ID取新闻目录名称
$strSQL = "select name from newsdir  where id_newsdir=$ndir" ;
$objDB->Execute($strSQL);
$onenewsdir=$objDB->fields();

//新闻内容
$strSQL = "select title,content,url from newsinfo where id_newsinfo='".$nid."'  " ;
$objDB->Execute($strSQL);
$onenews=$objDB->fields();

?>