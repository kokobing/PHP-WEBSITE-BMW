<?php
require "./inc/cn_default_core.php";

$getpicnuminfo=getlayoutpicnuminfo(11,9,'opicname as pic,url,intro');//抽取LAYOUT的图片
for($i=0;$i<sizeof($getpicnuminfo);$i++){
  $strbanner.="{image:'/upload/layout/".$getpicnuminfo[$i][pic]."',title:'',thumb:'',url:'".$getpicnuminfo[$i][url]."'}";
  if($i!=(sizeof($getpicnuminfo)-1)){$strbanner.=",";}
}




?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="<?php echo $setinfo[keywords];?>" />
<meta name="description" content="<?php echo $setinfo[description];?>" />
<title><?php echo $setinfo[title];?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="stylesheet" href="./inc/css/supersized.css" type="text/css" media="screen" />
<script type="text/javascript" src="./inc/js/jquery-1.6.min.js"></script>
<script type="text/javascript">
jQuery(function($){$.supersized({slideshow:1,autoplay:1,start_slide:0,stop_loop:0,random:0,slide_interval:10000,transition:6,transition_speed:1000,new_window:0,pause_hover:0,keyboard_nav:0,performance:1,image_protect:1,min_width:0,min_height:0,vertical_center:1,horizontal_center:1,fit_always:0,fit_portrait:1,fit_landscape:0,slide_links:'blank',thumb_links:1,thumbnail_navigation:0,slides:[<?=$strbanner;?>],progress_bar:1,mouse_scrub:0})});

</script>
<?php if($setinfo[otherheader]!=''){echo $setinfo[otherheader];}?>
<?php if(trim($setinfo[statistics])!=''){echo $setinfo[statistics];}//统计代码?>
</head>
<body <?php if($setinfo[iscopy]=='1'){echo ' oncontextmenu="return false" onselectstart="return false" ondragstart="return false" onbeforecopy="return false"';}?>>
	

    <div id="enterhome2"><a href="#" onclick="openurl();">立即报名 <img src="/inc/pics/arror-01.png" /></a></div>
    <div id="enterhome"><a href="/index2.php">进入官网 <img src="/inc/pics/arror-01.png" /></a></div>
	

	<div id="prevthumb"></div>
	<div id="nextthumb"></div>
	
	<a id="prevslide" class="load-item"></a>
	<a id="nextslide" class="load-item"></a>
	
	<div id="thumb-tray" class="load-item">
		<div id="thumb-back"></div>
		<div id="thumb-forward"></div>
	</div>
	
	<div id="progress-back" class="load-item">
		<div id="progress-bar"></div>
	</div>
	
	<div id="controls-wrapper" class="load-item">
		<div id="controls">
			
			<a id="play-button"><img id="pauseplay" src="/inc/pics/loadpage/pause.png"/></a>
		
			<div id="slidecounter">
				<span class="slidenumber"></span> / <span class="totalslides"></span>
			</div>
			
			<div id="slidecaption"></div>
			
			<a id="tray-button"><img id="tray-arrow" src="/inc/pics/loadpage/button-tray-up.png"/></a>
			
			<ul id="slide-list"></ul>
			
		</div>
	</div>
    
    
    <script>
    
	function openurl(){

		window.location.href=$(".activeslide a").attr("href");
		
		
	}
    
    </script>
    

</body>
</html>
