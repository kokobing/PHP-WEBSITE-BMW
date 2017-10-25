<?php
require "../inc/config.php";
require "../inc/function.class.php";

//file_put_contents('aa.txt', $_REQUEST[pdir2]); 

$arr="";

$page=$_REQUEST[pagenum];//get page
$start=$page*$setinfo[productnum];// 1*10  2*10 起始位置

if($_REQUEST[pdir1]==0 && $_REQUEST[pdir2]==0){
//如果为0查所有中文目录产品	
$strSQL = "select a.title,a.intro,a.id_prodinfo as pid,b.lang,b.fatherid,a.id_proddir from 
           productinfo as a left join productdir as b on a.id_proddir=b.id_proddir
		   where a.dele=1 
		   order by a.ordernum asc limit $start,$setinfo[productnum]" ;
}

if($_REQUEST[pdir1]!=0 && $_REQUEST[pdir2]==0){
//一级目录存在 二级目录不存在 则查找一级目录下的所有产品
$strSQL = "select a.title,a.intro,a.id_prodinfo as pid,b.lang,b.fatherid,a.id_proddir from 
           productinfo as a left join productdir as b on a.id_proddir=b.id_proddir
		   where a.dele=1 and b.fatherid=$_REQUEST[pdir1]
		   order by a.ordernum asc limit $start,$setinfo[productnum]" ;	
}



if($_REQUEST[pdir2]!=0){
//指定二级目录的所有产品
$strSQL = "select title,intro,id_prodinfo as pid,id_proddir from productinfo  where dele=1 and id_proddir=$_REQUEST[pdir2] order by ordernum asc limit $start,$setinfo[productnum]" ;	
}

$objDB->Execute($strSQL);
$arrproducts=$objDB->GetRows();

$arr[info]='';
for($i=0;$i<sizeof($arrproducts);$i++){
  $getpic=getproductpic($arrproducts[$i][pid]);//产品图片	
  

$arr[info].='<li><a href="/show/showpage.php/'.$arrproducts[$i][id_proddir].'/'.$arrproducts[$i][pid].'/.html">
				<img src="/upload/product/'.$getpic.'" />
				<h3>'.$arrproducts[$i][title].'</h3>
				<p>'.$arrproducts[$i][intro].'</p>
			</a></li>';


  
}   

$arr[pagenum]=$page+1;

$myjson= json_encode($arr);
echo $myjson;

?>

