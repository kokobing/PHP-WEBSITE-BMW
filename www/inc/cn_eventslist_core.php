<?php
require "../inc/config.php";
require "../inc/function.class.php";
require "../inc/cn_header_core.php";//页头 页脚调用 重复调用 如果买个页都涉及 可以写到这里

$ndir=$getvars[1];//获取伪静态传递参数

//根据目录ID取新闻目录名称
$strSQL = "select name from newsdir  where id_newsdir=$ndir" ;
$objDB->Execute($strSQL);
$onenewsdir=$objDB->fields();

//取目录下的新闻
$strSQL = "select title,intro,id_newsinfo from newsinfo  where dele=1 and id_newsdir=$ndir order by ordernum desc limit 0,$setinfo[newsnum]" ;
$objDB->Execute($strSQL);
$arrnews=$objDB->GetRows();


?>