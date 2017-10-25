<?php
require "../inc/cn_newsindex_core.php";
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="<?php echo $setinfo[keywords];?>" />
<meta name="description" content="<?php echo $setinfo[description];?>" />
<title><?php echo $setinfo[title];?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="stylesheet" type="text/css" href="/inc/css/jquery.mobile-1.2.0.css"><!-- chang theme here -->
<link rel="stylesheet" type="text/css" href="/inc/css/jquery.mobile.structure-1.2.0.min.css">

<link rel="stylesheet" type="text/css" href="/inc/css/resetui.css">
<script src="/inc/js/jquery.js"></script>
<script src="/inc/js/custom.js"></script>
<script src="/inc/js/jquery.mobile-1.2.0.min.js"></script>
<style media="screen" type="text/css">
#abouticon .ui-icon { background:  url(/upload/layout/<?=$menuicon[0][pic];?>) 50% 50% no-repeat; background-size: 24px 22px; }
#newsicon .ui-icon { background:  url(/upload/layout/<?=$menuicon[1][pic];?>) 50% 50% no-repeat;  background-size: 24px 22px; }
#producticon .ui-icon { background:  url(/upload/layout/<?=$menuicon[2][pic];?>) 50% 50% no-repeat; background-size: 24px 22px;  }
#hricon .ui-icon { background:  url(/upload/layout/<?=$menuicon[3][pic];?>) 50% 50% no-repeat;  background-size: 24px 22px; }
#contacticon .ui-icon { background:  url(/upload/layout/<?=$menuicon[4][pic];?>) 50% 50% no-repeat;  background-size: 24px 22px; }
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

<div id="abouttop"><div id="abouttit">新闻资讯</div></div>
<div class="newsbox">
<?php for($i=0;$i<sizeof($getnewsdir2);$i++){
	$ndir=$getnewsdir2[$i][id];
	//根据目录查找新闻
$strSQL = "select title,intro,id_newsinfo as id,id_newsdir from newsinfo  where dele=1 and id_newsdir=$ndir order by ordernum desc limit 0,$setinfo[newsnum]" ;
$objDB->Execute($strSQL);
$arrnews=$objDB->GetRows();
?>
<div data-role="collapsible"  data-collapsed="false" data-theme="c" data-content-theme="d" data-collapsed-icon="arrow-r" data-expanded-icon="arrow-d" data-inset="false">
							<h2><?=$getnewsdir2[$i][name]?></h2>
							<ul data-role="listview" data-theme="c" class="newsview">
                                <?php for($j=0;$j<sizeof($arrnews);$j++){?>
				                <li><a href="/news/newspage.php/<?=$ndir?>/<?=$arrnews[$j][id]?>/.html"><?=$arrnews[$j][title]?></a></li>
                                <?php }?>
				                <li><a href="/news/newslist.php/<?=$ndir?>/.html">更多新闻</a></li>
							</ul>
</div><!-- /collapsible -->
<?php }?>

</div>
</div>
<!-- content end-->


<!-- footer start-->
<div data-role="footer" id="footer"  data-theme="b">
<div id="footertop"><div id="foottext1">欢迎光临腾岩科技!</div>
<div id="foottext3">中英文切换:</div>
<div id="lang"><a href="/en/">英</a></div>
<div id="lang2"><a href="/en/">中</a></div>

</div>
<div id="footerend"><div id="foottext2">@2013 SHANGHAI TENGYAN TECH CO,.LTD <br>   沪ICP备10009206号</div> </div>
</div>
<!-- footer end-->
</div>
<!-- page end -->
</body>
</html>