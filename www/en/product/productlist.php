<?php
require "../../inc/en_productlist_core.php";
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
<?php for($i=0;$i<sizeof($menuicon);$i++){?>
#cicon<?=$i?> .ui-icon { background:  url(/upload/layout/<?=$menuicon[$i][pic];?>) 50% 50% no-repeat;  background-size: 24px 22px; }
<?php }?>
</style>
<script>
$(window).scroll(function(){
        bottomhight=$(document).height() - $(window).height() - $(window).scrollTop();
	        if  (bottomhight<100){//滚动到底
           ennextproducts();
        }
});
</script>

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
<div data-role="content" class="homecontent" data-theme="d">

<div id="abouttop"><div id="abouttit"><?=$pdirname[name];?></div></div>
<div id="productbox">
	<div id="productlistbox"><img src="/upload/layout/<?=getpagesetpic(15,0)?>"></div>
<div id="productmenu">

<ul data-role="listview"  data-inset="true" id="product-list">
<?php for($i=0;$i<sizeof($arrproduct);$i++){?>
			<li><a href="/en/product/productpage.php/<?=$pdir?>/<?=$arrproduct[$i][pid]?>/.html">
				<img src="/upload/product/<?=getproductpic($arrproduct[$i][pid])?>" />
				<h3><?=$arrproduct[$i][title]?></h3>
				<p><?=$arrproduct[$i][intro]?></p>
			</a></li>
            <hr class="hr1" />
<?php }?>
</ul>
                           <div id="pagenum" style="display:none">1</div>
                           <div id="pdir1" style="display:none">22</div>
                           <div id="pdir2" style="display:none"><?=$pdir?></div>   
	
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