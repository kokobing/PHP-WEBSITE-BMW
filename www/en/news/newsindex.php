<?php
require "../../inc/en_newsindex_core.php";
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php if($str[pagetitle]!=''){echo $str[pagetitle];}else{echo $setinfo[title];}?></title>
<meta name="keywords" content="<?php if($str[keywords]!=''){echo $str[keywords];}else{echo $setinfo[keywords];}?>" />
<meta name="description" content="<?php if($str[description]!=''){echo $str[description];}else{echo $setinfo[description];}?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="stylesheet" type="text/css" href="/inc/css/jquery.mobile-1.2.0.css"><!-- chang theme here -->
<link rel="stylesheet" type="text/css" href="/inc/css/jquery.mobile.structure-1.2.0.min.css">

<link rel="stylesheet" type="text/css" href="/inc/css/resetui.css">
<script src="/inc/js/jquery.js"></script>
<script src="/inc/js/custom.js"></script>
<script src="/inc/js/jquery.mobile-1.2.0.min.js"></script>
<style media="screen" type="text/css">
<?php for($i=0;$i<sizeof($menuicon);$i++){?>
#cicon<?=$i?> .ui-icon { background:  url(/upload/layout/<?=$menuicon[$i][pic];?>) 50% 50% no-repeat;  background-size: 24px 22px; }
<?php }?>
</style>

<?php if($setinfo[otherheader]!=''){echo $setinfo[otherheader];}?>
<?php if(trim($setinfo[statistics])!=''){echo $setinfo[statistics];}//统计代码?>
</head>

<body <?php if($setinfo[iscopy]=='1'){echo ' oncontextmenu="return false" onselectstart="return false" ondragstart="return false" onbeforecopy="return false"';}?>>
<!-- page start -->
<div data-role="page" data-theme="c"  id="homeconent">

<!-- header start -->
<?php require "../header.php";?>
<!-- header end-->

<!-- content start -->
<div data-role="content" class="homecontent" data-theme="c">

<div id="abouttop"><div id="abouttit">NEWS</div></div>
<div class="newsbox">
<div data-role="collapsible-set" data-theme="c" data-content-theme="d" data-inset="false">

<?php for($i=0;$i<sizeof($getnewsdir2);$i++){
	$ndir=$getnewsdir2[$i][id];
	//根据目录查找新闻
$strSQL = "select title,intro,id_newsinfo as id,id_newsdir from newsinfo  where dele=1 and id_newsdir=$ndir order by ordernum desc limit 0,$setinfo[newsnum]" ;
$objDB->Execute($strSQL);
$arrnews=$objDB->GetRows();
?>
    <div data-role="collapsible" <?php if($i==0){echo 'data-collapsed="false"';}?> >
        <h2><?=$getnewsdir2[$i][name]?></h2>
        <ul data-role="listview" data-theme="c" class="newsview">
        <?php for($j=0;$j<sizeof($arrnews);$j++){?>
		<li><a href="/en/news/newsview.php/<?=$ndir?>/<?=$arrnews[$j][id]?>/.html"><?=$arrnews[$j][title]?></a></li>
        <?php }?>
        <li><a href="/en/news/newslist.php/<?=$ndir?>/.html">More News...</a></li>
        </ul>
    </div>
<?php }?>

</div>
</div>
</div>
<!-- content end-->


<!-- footer start-->
<?php require "../footer.php";?>
<!-- footer end-->
</div>
<!-- page end -->
</body>
</html>