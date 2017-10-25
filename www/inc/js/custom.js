// init
$(document).bind("mobileinit", function(){
  $.mobile.ajaxEnabled = false;
  $.mobile.pushStateEnabled = false;
  $.mobile.loadingMessage = '页面载入中';
  $.mobile.pageLoadErrorMessage = '页面载入失败';
});	


$("div[data-role='page']").live('pageshow',function(event,ui){ 
													
    $.ajaxSetup({ cache: false });
	////////////////////////////////////
	
});//$("div[data-role='page']")


//获取当前页文件名
function getcurrentfilename(){
	
	pathnameurl=window.location.pathname;//当前URL
	pathnameurl = pathnameurl.split(".php");//折开URL
	pathnameurl = pathnameurl[0].split("/");//折开URL
	urllength=pathnameurl.length-1;//数组最后一位长度
	return pathnameurl[urllength];//取出文件名
	
	
}	

/////////////////////////////////////////////////////////////////////////////////////
var Currentfilename=getcurrentfilename();//取当前文件名

function nextnews() {
    $.mobile.loading( "show");
		$("#isloading").text('2');	//暂停 不在加载

	setTimeout(function () {
        var Currentpagelang=$('#lang').text();//取当前版面语言
	    if(Currentpagelang=='cn'){getlangdir='';}//中文
	    if(Currentpagelang=='en'){getlangdir='/en';}//英文追加目录	
        $.mobile.loading( "hide" );
        $.post(getlangdir+'/news/ajax_getnews.php',{pagenum:$('#pagenum').text(),ndir:$('#ndir').text()},function(data){
            var myjson = '';eval('myjson=' + data + ';');
				if(myjson.info!=''){
									$("#isloading").text('0');	//中止暂停 可以加载

					$("#type-newslist").append(myjson.info);
					$("#pagenum").text(myjson.pagenum);
					$('#type-newslist').listview('refresh'); 
					
				}else{
					$("#isloading").text('1');	//已经结束 不在加载
					return false;
				}
							
		});
	}, 2000);	
}


function nextproducts() {
    $.mobile.loading( "show");
		$("#isloading").text('2');	//暂停 不在加载

	setTimeout(function () {
        var Currentpagelang=$('#lang').text();//取当前版面语言
	    if(Currentpagelang=='cn'){getlangdir='';}//中文
	    if(Currentpagelang=='en'){getlangdir='/en';}//英文追加目录	
        $.mobile.loading( "hide" );
        $.post(getlangdir+'/product/ajax_getproducts.php',{pagenum:$('#pagenum').text(),pdir2:$('#pdir2').text(),pdir1:$('#pdir1').text(),keysearch:$('#keysearch').text()},function(data){
             var myjson = '';eval('myjson=' + data + ';');
			if(myjson.info!=''){
								$("#isloading").text('0');	//中止暂停 可以加载

				 $("#product-list").append(myjson.info);
				 $("#pagenum").text(myjson.pagenum);
				 $('#product-list').listview('refresh'); 
				}else{
				 $("#isloading").text('1');	//已经结束 不在加载
				 return false;
			}
							
		 });
	}, 2000);	
}


function nextshows() {
    $.mobile.loading( "show");
		$("#isloading").text('2');	//暂停 不在加载

	setTimeout(function () {
        var Currentpagelang=$('#lang').text();//取当前版面语言
	    if(Currentpagelang=='cn'){getlangdir='';}//中文
	    if(Currentpagelang=='en'){getlangdir='/en';}//英文追加目录	
        $.mobile.loading( "hide" );
        $.post(getlangdir+'/show/ajax_getshow.php',{pagenum:$('#pagenum').text(),pdir2:$('#pdir2').text(),pdir1:$('#pdir1').text(),keysearch:$('#keysearch').text()},function(data){
             var myjson = '';eval('myjson=' + data + ';');
			if(myjson.info!=''){
								$("#isloading").text('0');	//中止暂停 可以加载

				 $("#product-list").append(myjson.info);
				 $("#pagenum").text(myjson.pagenum);
				 $('#product-list').listview('refresh'); 
				}else{
				 $("#isloading").text('1');	//已经结束 不在加载
				 return false;
			}
							
		 });
	}, 2000);	
}



$(window).scroll(function(){
	    
	        
		    bottomhight=$(document).height() - $(window).height() - $(window).scrollTop();
	        if  (bottomhight<100){//滚动到底
			   var Currisloading=$('#isloading').text();//是否加载
			   if((Currentfilename=='news' || Currentfilename=='newslist')&& Currisloading=='0' ){//新闻页面
			     nextnews();
			   }
			  
			  if((Currentfilename=='product' || Currentfilename=='productlist'  || Currentfilename=='productsearch') && Currisloading=='0'){//产品页面
			    nextproducts();
			   }
			  
			  if(Currentfilename=='showlist' && Currisloading=='0'){//产品页面
			    nextshows();
			   }

		  }
		  
	  });
