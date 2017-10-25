<div data-role="header" data-theme="b" >
<div id="headertop"><a href="/en/"><img src="/upload/layout/<?=$logopic?>"></a></div>
<div data-role="navbar" class="nav-glyphish-example" >
		<ul>
        	<?
    $getallpagesetinfo=getallpagesetinfo(0,'2','title,id_pageset as id');//取所有版面1中文 （2只显示首页 1所有页）  0关闭 3只在内页
	for($i=0;$i<sizeof($getallpagesetinfo);$i++){
		$iconid='cicon'.$i;
		$flienameurl='/en/about/about.php/'.$getallpagesetinfo[$i][id].'/.html';//默认关于我们
		if($getallpagesetinfo[$i][id]==11){$flienameurl='/en/news/newsindex.php/11/.html';}//新闻资讯
		if($getallpagesetinfo[$i][id]==15){$flienameurl='/en/product/productindex.php/15/.html';}//产品家族
	?>    	
        <li ><a href="<?=$flienameurl;?>" id="<?=$iconid?>" data-icon="custom"><?=$getallpagesetinfo[$i][title]?></a></li>
     <? }?>   
        </ul>
		</div>
<div id="topmidd"></div>


       

</div>