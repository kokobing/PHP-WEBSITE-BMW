<?php
require "../inc/cn_productpage_core.php";
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

<script src="/inc/js/jquery.carouf.js"></script>
<script	src="/inc/js/jquery.jcarousel.min.js"	type="text/javascript"></script>
<script	src="/inc/js/jquery.touchwipe.1.1.1.js"	type="text/javascript"></script>

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

<div id="abouttop"><div id="abouttit"><a href="/product/productlist.php/<?=$pdir?>/.html"><?=$pdirname[name]?></a></div></div>
<div id="productviewbox">
  <? require "showbanner.php"; ?>  
<div id="productviewbox1"><?=$oneproduct[title]?></div>
<div id="productviewbox3">
<p><?=$oneproduct[content]?></p>

<?php if($oneproduct[videourl]!=''){?>
<iframe height=300 width=100% src="<?=$oneproduct[videourl]?>" frameborder=0 allowfullscreen></iframe>
<?php }?>
<div id="backbox"><a href="/testdrive.php?id=9&pid=<?=$pid?>"> 预约试驾 </a></div>

<div id="backbox"><a href="javascript:void(0)"  onClick=' $("html,body").animate( {scrollTop:0},"slow",function() {return false;});'> 返回顶部 </a></div>
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