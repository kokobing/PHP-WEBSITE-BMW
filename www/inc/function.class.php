<?php
//版本日期：2012-06-30

//数据库初始连接
$objDB=new mysql($db_hostname,$db_username,$db_password,$db_database);
mysql_query("SET NAMES utf8"); 
mysql_query("set sql_mode=''"); 

//全局站点信息 是否防COPY 头部其他信息 标题  关健词 描述 ICP号 地图代码 第三方统计代码
$strSQL = "select iscopy,otherheader,title,keywords,description,icp,mapcode,statistics,weburl,newsnum,productnum,bannertime from siteset where id_siteset=1" ;
$objDB->Execute($strSQL);
$setinfo=$objDB->fields();

/*IS 
if($_SERVER["REMOTE_ADDR"]!='101.85.57.251'){

require_once('mobile_device_detect.php');
$mobile = mobile_device_detect();

if($mobile==false){
 header('Location:http://'.$setinfo[weburl].'/');exit; 
}

}//
MOBI*/

//伪静态变量获取
/*实例 $pageid=$getvars[1];*/
$getvars=explode(".",$_SERVER['SCRIPT_NAME']);//求脚本
$getvars=explode("/",substr($_SERVER['REQUEST_URI'],strlen($getvars[0])));//从脚本中获取参数并序列化



function cutstr($string,$length,$tag) {//php utf-8 字符串截取 0不带后缀 1带...后缀
        preg_match_all("/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/", $string, $info);  
        for($i=0; $i<count($info[0]); $i++) {
                $wordscut .= $info[0][$i];
                $j = ord($info[0][$i]) > 127 ? $j + 2 : $j + 1;
                if ($j > $length - 3) {
                        if($tag==0){
						    return $wordscut;
						}elseif($tag==1)
						{
						    return $wordscut."......";
						}
                }
        }
        return join('', $info[0]);
}

function Replacestr($str){
	for($i=1;$i<=80;$i++){
		$str=str_replace("&nbsp;","",$str);
	}
	return $str;
}

//获取当前文件名函数
function getcurrentfilename(){
$getfilename=explode('.php',$_SERVER["PHP_SELF"]);	
return end(explode('/',$getfilename[0]));	
}
///////////////////////////////////////////////////////产品方面函数/////////////////////////////////////////////////////////////////////////////////

function getproductnum($lang,$menuid){ //取出指定语言的产品数量 1为中文产品数量 0为英文产品数量  $menuid=0 搜索所有产品数量 不为0则搜索对应目录的数量
global	 $objDB;//函数调用 声明全局变量	
if($menuid==0){
	$strwhere='';//搜索所有产品数量
}else{
	$strwhere=' and a.id_proddir='.$menuid;//为0则搜索对应目录的数量
}
$strSQLNum = "SELECT COUNT(*) as num from productinfo as a left join productdir as b on a.id_proddir=b.id_proddir WHERE a.dele='1' and b.lang=$lang $strwhere ";  
$objDB->Execute($strSQLNum);
$arrNum = $objDB->fields();	
return $arrNum[num];
}

function getpdir1num($menuid){ //取fatherid的产品数量
global	 $objDB;//函数调用 声明全局变量	
$strSQLNum = "SELECT COUNT(*) as num from productinfo as a left join productdir as b on a.id_proddir=b.id_proddir WHERE a.dele='1' and b.fatherid=$menuid ";  
$objDB->Execute($strSQLNum);
$arrNum = $objDB->fields();	
return $arrNum[num];
}



//取出产品目录 指定语言 所有一级目录 数组 引用时需要赋值 再输 出  1中文 0英文
function getproductdir1($lang){
global	 $objDB;//函数调用 声明全局变量
$strSQL="SELECT id_proddir as id,name,intro FROM productdir WHERE level='1' and dele='1' and lang=$lang  order by ordernum desc";
$objDB->Execute($strSQL);
$getproductdir1=$objDB->GetRows();
return $getproductdir1;
}


//取出产品目录所有二级目录    返回变量数组 引用时需要赋值 再输出
function getproductdir2($fatherid){
global	 $objDB;//函数调用 声明全局变量
$strSQL="SELECT id_proddir as id,name,intro FROM productdir WHERE level='2' and dele='1' and fatherid='".$fatherid."' order by ordernum asc";
$objDB->Execute($strSQL);
$getproductdir2=$objDB->GetRows();
return $getproductdir2;
}

//取出产品目录指定ID的单条信息    返回变量数组 引用时需要赋值 再输出
function getproductdirinfo($pdirid){
global	 $objDB;//函数调用 声明全局变量
$strSQL="SELECT id_proddir,name,intro FROM productdir WHERE  id_proddir='".$pdirid."' ";
$objDB->Execute($strSQL);
$getproductdirinfo=$objDB->fields();
return $getproductdirinfo;
}


//取出产品ID对应的第一张图片   直接返回文件名
function getproductpic($pid){
global	 $objDB;//函数调用 声明全局变量
$strSQL = "select opicname as pic from productpic  where id_prodinfo ='".$pid."' order by id_prodpic asc limit 1" ;
$objDB->Execute($strSQL);
$arronepic=$objDB->fields();
return $arronepic[pic];
}

//取出产品ID对应的所有图片
function getproductallpic($pid){
global	 $objDB;//函数调用 声明全局变量
$strSQL = "select opicname as pic from productpic  where id_prodinfo ='".$pid."' order by id_prodpic asc" ;
$objDB->Execute($strSQL);
$arrallpic=$objDB->GetRows();
return $arrallpic;
}


//取出指定条数指定语言的最新产品信息    返回变量数组 引用时需要赋值 再输出
function getnewproduct($pnum,$lang,$ordertype){
global	 $objDB;//函数调用 声明全局变量
$strSQL = "select a.*,b.lang,b.fatherid from productinfo as a left join productdir as b on a.id_proddir=b.id_proddir   where a.dele=1 and b.lang=$lang order by a.$ordertype desc limit $pnum" ;
$objDB->Execute($strSQL);
$arrnewproduct=$objDB->GetRows();
return $arrnewproduct;
}

//取出指定目录ID的产品多条列表  指定tableField字段    返回变量数组 引用时需要赋值 再输出
function getproductlist($pdirid,$tableField){
global	 $objDB;//函数调用 声明全局变量
$strSQL = "select $tableField from productinfo  where dele=1 and id_proddir=$pdirid  order by ordernum desc " ;
$objDB->Execute($strSQL);
$getproductlist=$objDB->GetRows();
return $getproductlist;
}

//取出指定ID的产品信息  指定tableField字段    返回变量数组 引用时需要赋值 再输出
function getproductinfo($pid,$tableField){
global	 $objDB;//函数调用 声明全局变量
$strSQL = "select $tableField from productinfo  where dele=1 and id_prodinfo=$pid  " ;
$objDB->Execute($strSQL);
$getproductinfo=$objDB->fields();
return $getproductinfo;
}



//根据目录ID找到对应产品目录的指定信息
function getpdir($dirid,$tableField){
global	 $objDB;//函数调用 声明全局变量
$strSQL = "select $tableField from productdir where dele=1 and id_proddir=$dirid " ;
$objDB->Execute($strSQL);
$getnewsdir=$objDB->fields();
return $getnewsdir;
}

//根据目录ID找到对应产品目录的名称
function getpdirname($dirid){
global	 $objDB;//函数调用 声明全局变量
$strSQL = "select name from productdir where dele=1 and id_proddir=$dirid " ;
$objDB->Execute($strSQL);
$getpdirname=$objDB->fields();
return $getpdirname[name];
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function getnewsnum($lang,$menuid){ //取出指定语言的新闻数量 1为中文新闻数量 0为英文新闻数量  $menuid=0 搜索所有新闻数量 不为0则搜索对应目录的数量
global	 $objDB;//函数调用 声明全局变量	
if($menuid==0){
	$strwhere='';//搜索所有新闻数量
}else{
	$strwhere='and a.id_newsdir='.$menuid;//为0则搜索对应目录的数量
}
$strSQLNum = "SELECT COUNT(*) as num from newsinfo as a left join newsdir as b on a.id_newsdir=b.id_newsdir WHERE a.dele='1' and b.lang=$lang $strwhere ";  
$objDB->Execute($strSQLNum);
$arrNum = $objDB->fields();	
return $arrNum[num];
}

//取出目录所有二级目录    返回变量数组 引用时需要赋值 再输出
function getnewsdir2($fatherid){
global	 $objDB;//函数调用 声明全局变量
$strSQL="SELECT id_newsdir as id,name,intro FROM newsdir WHERE level='2' and dele='1' and fatherid='".$fatherid."' order by ordernum asc";
$objDB->Execute($strSQL);
$getnewsdir2=$objDB->GetRows();
return $getnewsdir2;
}

//取出新闻ID对应的第一张图片  直接返回文件名
function getnewspic($nid){
global	 $objDB;//函数调用 声明全局变量
$strSQL = "select opicname as pic from newspic  where id_newsinfo ='".$nid."' order by id_newspic asc limit 1" ;
$objDB->Execute($strSQL);
$arronepic=$objDB->fields();
return $arronepic[pic];
}

//取出指定目录ID的新闻多条列表  指定tableField字段    返回变量数组 引用时需要赋值 再输出
function getnewslist($dirid,$tableField){
global	 $objDB;//函数调用 声明全局变量
$strSQL = "select $tableField from newsinfo where dele=1 and id_newsdir=$dirid  order by ordernum desc " ;
$objDB->Execute($strSQL);
$getnewslist=$objDB->GetRows();
return $getnewslist;
}

//取出新闻图片指定id的前几NUM条的 指定数据库字段tableField 的值  多条  返回变量数组 引用时需要赋值 再输出
function getnewspicnuminfo($nid,$num,$tableField){
global	 $objDB;//函数调用 声明全局变量
$strSQL = "select $tableField from newspic where id_newsinfo ='".$nid."' order by  id_newspic asc limit 0,$num" ;
$objDB->Execute($strSQL);
$arrallpicinfo=$objDB->GetRows();
return $arrallpicinfo;
}


//根据目录ID找到对应新闻目录的指定信息
function getnewsdir($dirid,$tableField){
global	 $objDB;//函数调用 声明全局变量
$strSQL = "select $tableField from newsdir where dele=1 and id_newsdir=$dirid " ;
$objDB->Execute($strSQL);
$getnewsdir=$objDB->fields();
return $getnewsdir;
}

//根据目录ID找到对应新闻目录的名称
function getnewsdirname($dirid){
global	 $objDB;//函数调用 声明全局变量
$strSQL = "select name from newsdir where dele=1 and id_newsdir=$dirid " ;
$objDB->Execute($strSQL);
$getnewsdirname=$objDB->fields();
return $getnewsdirname[name];
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//取出LAYOUT区块指定ID的单条信息  指定字段     单条 返回变量数组 引用时需要赋值 再输出
function getlayoutinfo($lid,$tableField){
global	 $objDB;//函数调用 声明全局变量
$strSQL = "select $tableField from layout where id_layout='".$lid."'" ;
$objDB->Execute($strSQL);
$getlayoutinfo=$objDB->fields();
return $getlayoutinfo;
}

//取出区块layoutpic指定id的第POSTION位置的一张图片    单条  直接返回文件名
function getlayoutpic($lid,$postion){
global	 $objDB;//函数调用 声明全局变量
$strSQL = "select opicname as pic from layoutpic  where id_layout ='".$lid."' order by  id_layoutpic asc limit $postion,1" ;
$objDB->Execute($strSQL);
$arronepic=$objDB->fields();
return $arronepic[pic];
}

//取出区块layoutpic指定id的第POSTION位置的 指定数据库字段tableField 的值  单条  返回变量数组 引用时需要赋值 再输出
function getlayoutpicinfo($lid,$postion,$tableField){
global	 $objDB;//函数调用 声明全局变量
$strSQL = "select $tableField from layoutpic  where id_layout ='".$lid."' order by  id_layoutpic asc limit $postion,1" ;
$objDB->Execute($strSQL);
$arronepicinfo=$objDB->fields();
return $arronepicinfo;
}

//取出区块layoutpic指定id的前几NUM条的 指定数据库字段tableField 的值  多条  返回变量数组 引用时需要赋值 再输出
function getlayoutpicnuminfo($lid,$num,$tableField){
global	 $objDB;//函数调用 声明全局变量
$strSQL = "select $tableField from layoutpic  where id_layout ='".$lid."' order by ordernum asc limit 0,$num" ;
$objDB->Execute($strSQL);
$arrallpicinfo=$objDB->GetRows();
return $arrallpicinfo;
}

//取出版面管理layoutpic指定id的所有图片   返回变量数组 引用时需要赋值 再输出
function getlayoutallpic($lid){
global	 $objDB;//函数调用 声明全局变量
$strSQL = "select title,url,opicname as pic from layoutpic  where id_layout ='".$lid."' order by  ordernum asc" ;
$objDB->Execute($strSQL);
$arrlayoutallpic=$objDB->GetRows();
return $arrlayoutallpic;
}

//取出区块layoutpic指定id的 指定数据库字段tableField 的值  多条  返回变量数组 引用时需要赋值 再输出
function getlayoutallpicinfo($lid,$tableField){
global	 $objDB;//函数调用 声明全局变量
$strSQL = "select $tableField from layoutpic  where id_layout ='".$lid."' order by  id_layoutpic asc" ;
$objDB->Execute($strSQL);
$arrallpicinfo=$objDB->GetRows();
return $arrallpicinfo;
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//取出版面管理pagesetpic指定id的第POSTION位置的一张图片   单条  直接返回文件名
function getpagesetpic($lid,$postion){
global	 $objDB;//函数调用 声明全局变量
$strSQL = "select opicname as pic from pagesetpic  where id_pageset ='".$lid."' order by  id_pagesetpic asc limit $postion,1" ;
$objDB->Execute($strSQL);
$arronepic=$objDB->fields();
return $arronepic[pic];
}

//取出版面管理pagesetpic指定id的所有图片   返回变量数组 引用时需要赋值 再输出
function getpagesetallpic($lid){
global	 $objDB;//函数调用 声明全局变量
$strSQL = "select opicname as pic from pagesetpic  where id_pageset ='".$lid."' order by  id_pagesetpic asc" ;
$objDB->Execute($strSQL);
$arrallpic=$objDB->GetRows();
return $arrallpic;
}

//取出版面管理pagesetpic指定id的所有图片信息   返回变量数组 引用时需要赋值 再输出
function getpagesetallpicinfo($lid,$tableField){
global	 $objDB;//函数调用 声明全局变量
$strSQL = "select $tableField from pagesetpic  where id_pageset ='".$lid."' order by  id_pagesetpic asc" ;
$objDB->Execute($strSQL);
$arrallpicinfo=$objDB->GetRows();
return $arrallpicinfo;
}

//取出pageset版面指定ID的单条信息 的 指定数据库字段tableField 的值  单条   返回变量数组 引用时需要赋值 再输出
function getpagesetinfo($pageid,$tableField){
global	 $objDB;//函数调用 声明全局变量
$strSQL = "select $tableField from pageset  where id_pageset='".$pageid."'" ;
$objDB->Execute($strSQL);
$getpagesetinfo=$objDB->fields();
return $getpagesetinfo;
}


//取出区块pageset指定id的前几NUM条的 指定数据库字段tableField 的值  多条  返回变量数组 引用时需要赋值 再输出
function getpagesetpicnuminfo($lid,$num,$tableField){
global	 $objDB;//函数调用 声明全局变量
$strSQL = "select $tableField from pagesetpic  where id_pageset ='".$lid."' order by  id_pagesetpic asc limit 0,$num" ;
$objDB->Execute($strSQL);
$arrallpicinfo=$objDB->GetRows();
return $arrallpicinfo;
}


//取出pageset版面所有版面  指定语言  指位置条件  指定字段
function getallpagesetinfo($lang,$location,$tableField){
global	 $objDB;//函数调用 声明全局变量
$strSQL = "select $tableField from pageset where lang=$lang and location in ($location) order by ordernum desc" ;
$objDB->Execute($strSQL);
$getallpagesetinfo=$objDB->GetRows();
return $getallpagesetinfo;
}

//取出pageset版面所有版面  指定语言  指位置条件  指定字段
function currentpicnum($pageid){
global	 $objDB;//函数调用 声明全局变量
$strSQL = "SELECT COUNT(*) as num from pagesetpic  where id_pageset ='".$pageid."' " ;
$objDB->Execute($strSQL);
$currentpicnum=$objDB->fields();// 当前版面图片总数量
return $currentpicnum[num];
}




?>