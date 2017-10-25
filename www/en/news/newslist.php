<?php
require "../../inc/en_newslist_core.php";
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
<script>
$(window).scroll(function(){
        bottomhight=$(document).height() - $(window).height() - $(window).scrollTop();
	        if  (bottomhight<100){//滚动到底
           ennextnews();
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
<div data-role="content" class="homecontent" data-theme="c">

<div id="abouttop"><div id="abouttit">NEWS</div></div>
<div class="newslistbox">
			<ul data-role="listview" data-inset="true" class="type-newslist">
				<li data-role="list-divider"><?=$onenewsdir[name];?></li>
            <?php for($i=0;$i<sizeof($arrnews);$i++){?>
				<li><a href="/en/news/newsview.php/<?=$ndir?>/<?=$arrnews[$i][id_newsinfo]?>/.html"><?=$arrnews[$i][title]?></a></li>
            <?php }?>
            </ul>
                <div id="pagenum" style="display:none">1</div>
                <div id="ndir" style="display:none"><?=$ndir?></div>   

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