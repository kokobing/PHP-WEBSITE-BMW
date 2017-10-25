<?php
require "../inc/config.php";
require "../inc/function.class.php";
require "../inc/cn_header_core.php";//页头 页脚调用 重复调用 如果买个页都涉及 可以写到这里


$pdir=$getvars[1];//商品目录id
//根据商品目录id取出商品标题
$strSQL = "select  name from productdir where id_proddir=$pdir" ;
$objDB->Execute($strSQL);
$pdirname=$objDB->fields();


$strSQL = "select  title,intro,id_prodinfo as pid from productinfo where id_proddir=$pdir and dele='1' order by ordernum desc  limit 0,$setinfo[productnum]" ;
$objDB->Execute($strSQL);
$arrproduct=$objDB->GetRows();


?>