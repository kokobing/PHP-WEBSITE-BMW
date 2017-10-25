<?php
require "../inc/cn_productindex_core.php";
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

<div id="abouttop"><div id="abouttit">产品展示</div></div>
<div id="productbox">
<div id="productmenu">
<?php for($i=0;$i<sizeof($getproductdir2);$i++){?>
<div class="productbox1"><a href="/product/productlist.php/<?=$getproductdir2[$i][id]?>/.html"><?=$getproductdir2[$i][name]?></a></div>
<ul data-role="listview"  data-inset="true" >
            <?php 
$pdir=$getproductdir2[$i][id];
$strSQL = "select id_proddir,title,intro,id_prodinfo as pid from productinfo where id_proddir=$pdir and dele='1' order by ordernum desc  limit 3" ;
$objDB->Execute($strSQL);
$arrproduct=$objDB->GetRows();
			for($j=0;$j<sizeof($arrproduct);$j++){?>
			<li><a href="/product/productpage.php/<?=$arrproduct[$j][id_proddir]?>/<?=$arrproduct[$j][pid]?>/.html">
				<img src="/upload/product/<?=getproductpic($arrproduct[$j][pid])?>" />
				<h3><?=$arrproduct[$j][title]?></h3>
				<p><?=$arrproduct[$j][intro]?></p>
			</a></li>
            <hr class="hr1" />
            <?php }?>
</ul>		
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