<?php
require "../inc/cn_productview_core.php";
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

<?php if($setinfo[otherheader]!=''){echo $setinfo[otherheader];}?>
<?php if(trim($setinfo[statistics])!=''){echo $setinfo[statistics];}//统计代码?>
</head>

<body <?php if($setinfo[iscopy]=='1'){echo ' oncontextmenu="return false" onselectstart="return false" ondragstart="return false" onbeforecopy="return false"';}?>>
<!-- page start -->
<div data-role="page" data-theme="c"  id="homeconent">

<!-- header start -->
<div data-role="header" data-theme="b" >
<div id="headertop"><a href="/"><img src="/inc/pics/logo.png"></a></div>
<div data-role="navbar" class="nav-glyphish-example" >
		<ul>
			<li><a href="/about/about.php" id="chat" data-icon="custom">关于我们</a></li>
			<li><a href="/product/productindex.php" id="email" data-icon="custom">产品展示</a></li>
			<li><a href="/news/newsindex.php" id="skull" data-icon="custom">新闻资讯</a></li>
		</ul>
		</div>
<div id="topmidd"></div>


 <div data-role="navbar"  >
			<ul>
				<li><a href="#">联系我们</a></li>
				<li><a href="#">诚聘英才</a></li>
				<li><a href="#">留言反馈</a></li>
			</ul>
		</div><!-- /navbar -->
       

</div>
<!-- header end-->

<!-- content start -->
<div data-role="content" class="homecontent" data-theme="d">

<div id="abouttop"><div id="abouttit">C系列轿车  Sedans</div></div>
<div id="productviewbox">
	<div id="productlistbox"><img src="/inc/pics/productview.jpg"></div>
<div id="productviewbox1"> Sedans</div>
<div id="productviewbox2">建议零售价:35350人民币<br>
发动机产品：1.8L turbo-4<br>
马力：201<br>
速度：22 / 31mpg</div>
<div id="productviewbox3">
<div id="detailebox"><a href="/product/productpage.php">详 细 展 示</a></div>
<div id="backbox"><a href="#" data-rel="back">返 回 上 一 层</a></div>
</div>
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