<div class="section car_wrapper"  >
			<div  class="list_carousel">
					
			<ul id="banner" >
            <?php 
			$bannerpic=getlayoutpicnuminfo(8,5,'url,opicname as pic');//菜单图标
			for($i=0;$i<sizeof($bannerpic);$i++){?>
            	<li><a href="/"><img src="/upload/layout/<?=$bannerpic[$i][pic]?>" width="100%" alt="" /></a></li>			
            <?php }?>    
			</ul>
					<div class="clearfix"></div>
					<div id="pager2" class="pager"></div>			
				
			</div>
		</div>
        
        
<style>
.pager {float: left;width: 100%;text-align: center;	background-color: white;color: white;}
.pager span {background-image:url(/inc/pics/img_unselected_black.png);padding-left: 2px;display: inline-block;height: 12px;width: 10px;margin-left: 1px;margin-right: 1px;}
.pager span.selected {background-image:url(/inc/pics/img_selected_black.png);}

.car_wrapper {	background-color: white;	width: 100%;}
.list_carousel {	width: 100%;	position: relative;}
.list_carousel ul {	margin: 0;	padding: 0;	list-style: none;	display: block;}
.list_carousel li {	width: auto;	height: auto;	padding: 0;	display: block;	float: left;}
.list_carousel.responsive {	width: auto;	margin-left: 0;}
.clearfix {	float: none;	clear: both;}

</style>	

<script>
				$(document).ready(function() {
					$('#banner').carouFredSel({
						responsive : true,
						width : '100%',
						scroll : {
							items:1,
							duration:300
						},
						items : {
							visible : {
								min : 1,
								max : 1
							}
						},
						pagination : {
							container : "#pager2",
							anchorBuilder : function(nr, item) {
								return '<span></span>';
							}
						},
						auto:{
							play:true,
							pauseDuration : 5000
						}
					});
					var homeRefresh = setInterval(function(){
						$("#banner").trigger("configuration",{width : '100%'});
						clearInterval(homeRefresh);
					},500);
				});
				$("#banner").touchwipe({
				     wipeLeft: nextBanner,
				     wipeRight: previousBanner,
				     min_move_x: 10,
				     min_move_y: 10,
				     preventDefaultEvents: false
				});
				$(document).bind("mobileinit", function(){
					
				});
				$(document).ready(function() {
					$(window).bind("orientationchange",function() {
						var banner = $('#banner');
						$("#banner").trigger("configuration",{width : '100%'});
// 						$("#banner").trigger("configuration",{height : '100%'});
					});
				});
				function previousBanner() {
					$("#banner").trigger("prev");
				}
				function nextBanner() {
					$("#banner").trigger("next");
				}
</script>       