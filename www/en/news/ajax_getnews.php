<?php
require "../../inc/config.php";
require "../../inc/function.class.php";


$arr="";

$page=$_REQUEST[pagenum];//get page
$start=$page*$setinfo[newsnum];// 1*10  2*10

if($_REQUEST[ndir]==0){
//如果为0查所有中文目录新闻 fatherid=1	
$strSQL = "select a.title,a.id_newsinfo as id,b.lang,a.id_newsdir
           from newsinfo as a left join newsdir as b on a.id_newsdir=b.id_newsdir 
		   where a.dele=1 and b.lang=1 and b.fatherid='1'  order by a.ordernum desc limit $start,$setinfo[newsnum]" ;
	   
}else{
//指定目录的新闻
$strSQL = "select title,id_newsinfo as id,id_newsdir from newsinfo  where dele=1 and id_newsdir=$_REQUEST[ndir] order by ordernum desc limit $start,$setinfo[newsnum]" ;
}

$objDB->Execute($strSQL);
$arrnews=$objDB->GetRows();

$arr[info]='';
for($i=0;$i<sizeof($arrnews);$i++){

$arr[info].='<li data-corners="false" data-shadow="false" data-iconshadow="true" data-wrapperels="div" data-icon="arrow-r" data-iconpos="right" data-theme="c" class="ui-btn ui-btn-icon-right ui-li-has-arrow ui-li ui-btn-up-c"><div class="ui-btn-inner ui-li"><div class="ui-btn-text"><a href="/en/news/newsview.php/'.$ndir.'/'.$arrnews[$i][id].'/.html" class="ui-link-inherit">'.$arrnews[$i][title].'</a></div><span class="ui-icon ui-icon-arrow-r ui-icon-shadow">&nbsp;</span></div></li>';


}   

$arr[pagenum]=$page+1;

$myjson= json_encode($arr);
echo $myjson;

?>
