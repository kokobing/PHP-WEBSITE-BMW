<?php
require "./inc/cn_index_core.php";


$getlayoutinfo=getlayoutinfo(11,'intro');
if($getlayoutinfo[intro]=='打开'){header('Location:default.php');ob_end_flush(); exit();}



?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="<?php echo $setinfo[keywords];?>" />
<meta name="description" content="<?php echo $setinfo[description];?>" />
<title><?php echo $setinfo[title];?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="stylesheet" type="text/css" href="./inc/css/jquery.mobile-1.2.0.css"><!-- chang theme here -->
<link rel="stylesheet" type="text/css" href="./inc/css/jquery.mobile.structure-1.2.0.min.css">
<link rel="stylesheet" type="text/css" href="./inc/css/resetui.css">
<style media="screen" type="text/css">
<?php for($i=0;$i<sizeof($menuicon);$i++){?>
#cicon<?=$i?> .ui-icon { background:  url(/upload/layout/<?=$menuicon[$i][pic];?>) 50% 50% no-repeat;  background-size: 24px 22px; }
<?php }?>
#cicon0{border-left:none;}
</style>
<script src="/inc/js/jquery.js"></script>
<script src="/inc/js/custom.js"></script>
<script src="/inc/js/jquery.mobile-1.2.0.min.js"></script>

<script src="./inc/js/jquery.carouf.js"></script>
<script	src="/inc/js/jquery.jcarousel.min.js"	type="text/javascript"></script>
<script	src="/inc/js/jquery.touchwipe.1.1.1.js"	type="text/javascript"></script>

<?php if($setinfo[otherheader]!=''){echo $setinfo[otherheader];}?>
<?php if(trim($setinfo[statistics])!=''){echo $setinfo[statistics];}//统计代码?>
</head>

<body <?php if($setinfo[iscopy]=='1'){echo ' oncontextmenu="return false" onselectstart="return false" ondragstart="return false" onbeforecopy="return false"';}?>>
<!-- page start -->
<div data-role="page" data-theme="d"  id="homeconent">

<!-- header start -->
<?php require "header.php";?>
<!-- header end-->

<!-- content start -->
<div data-role="content" class="homecontent" data-theme="d">
<div id="contentbox">
  <? require "homebanner.php"; ?>  
</div>
</div>
<!-- content end-->

<!-- footer start-->
<?php require "footer.php";?>
<!-- footer end-->
</div>
<!-- page end -->
</body>
</html>