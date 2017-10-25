<div data-role="header" data-theme="d" style="border:none;"  data-position="fixed">
 <div data-role="navbar" class="nav-glyphish-example"  >
		<ul >
        	<?
    $getallpagesetinfo=getallpagesetinfo(1,'2','title,id_pageset as id');//取所有版面1中文 （2只显示首页 1所有页）  0关闭 3只在内页
	for($i=0;$i<sizeof($getallpagesetinfo);$i++){
		$iconid='cicon".$i."';
		$flienameurl='/about/about.php/'.$getallpagesetinfo[$i][id].'/.html';//默认关于我们
		if($getallpagesetinfo[$i][id]==1){$iconid='cicon0';}
		
		if($getallpagesetinfo[$i][id]==6){$flienameurl='/events/events.php/2/.html';$iconid='cicon4';}//

	if($getallpagesetinfo[$i][id]==21){$flienameurl='/news/newsindex.php/21/.html';$iconid='cicon3';}//
		

		if($getallpagesetinfo[$i][id]==2){$flienameurl='/show/showindex.php/2/.html';$iconid='cicon1';}//在线展厅
		if($getallpagesetinfo[$i][id]==19){$flienameurl='/product/productlist.php/2/.html';$iconid='cicon2';}//二手车
	?>    	
        <li ><a href="<?=$flienameurl;?>" id="<?=$iconid?>" data-icon="custom"><?=$getallpagesetinfo[$i][title]?></a></li>
     <? }?>   
        </ul>
		</div>
       

</div>