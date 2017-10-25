<?php
require "../inc/config.php";
require "../inc/function.class.php";
require "../inc/cn_header_core.php";//页头 页脚调用 重复调用 如果买个页都涉及 可以写到这里


$pdir=$getvars[1];//商品目录id
$pid=$getvars[2];//商品id
//根据商品目录id取出商品标题
$strSQL = "select  name from productdir where id_proddir=$pdir" ;
$objDB->Execute($strSQL);
$pdirname=$objDB->fields();

//新闻内容
$strSQL = "select title,content,videourl from productinfo where id_prodinfo='".$pid."'  " ;
$objDB->Execute($strSQL);
$oneproduct=$objDB->fields();


?>