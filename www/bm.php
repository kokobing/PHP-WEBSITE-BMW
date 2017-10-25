<?php
require "./inc/cn_bm_core.php";
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="<?php echo $setinfo[keywords];?>" />
<meta name="description" content="<?php echo $setinfo[description];?>" />
<title><?php echo $setinfo[title];?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="stylesheet" type="text/css" href="./inc/css/jquery.mobile-1.2.0-2.css"><!-- chang theme here -->
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
<div data-role="page" data-theme="c" style="background:url(/upload/layout/<?=$bmgbpic;?>) no-repeat center top; background-size:cover; background-color:#000">

<div id="bmtitle">
<h2>活动内容</h2>
<p><?=$str[intro];?></p>
<div style="clear:both"></div>
</div>


<div id="bmtitle2">
<h2><?=$str[description];?></h2>

<?=$str[content];?>

</div>

<div id="bmtitle2">

<div style="width:50%;float:left;"><input type="text" name="name" id="name" placeholder="姓名" value="" ></div>

<div style="width:40%;float:right;margin-top:5px;" id="selectsex">
<select  data-mini="true" data-inline="true" id="sex" >
    <option value="男">性别：男</option>
    <option value="女">性别：女</option>

</select>
</div>

<div style="width:100%;float:left;"><input type="text" name="text-basic" id="phonenumber" placeholder="手机" value="" ></div>
<!--<div style="width:100%;float:left;"><input type="text" name="text-basic" id="idcardnumber" placeholder="身份证号" value="" ></div>-->

<div style="width:100%;float:left;padding:15px 0px; text-align:center" id="bmbtn"> <a href="#" data-role="button" data-mini="true" data-inline="true" data-icon="arrow-r" data-theme="b" onclick="sendmsg();">我要报名</a></div>




<br><br><br><br><br><br><br><br><br><br><br><br>
</div>



<div style="display:none;" id="bmtitle_"><?=$str[title];?></div>


</div>
<!-- page end -->


<script language="JavaScript">
function sendmsg() {
	if($.trim($("#name").val())==''){alert('请输入您的姓名');return false;}	
	if($.trim($("#phonenumber").val())==''){alert('请输入您的手机号码');return false;}
	/*if($.trim($("#idcardnumber").val())==''){alert('请输入您的身份证号');return false;}*/
	$.post('/ajax_bm.php',{name:$("#name").val(),
	sex:$("#sex").val(),
	phonenumber:$("#phonenumber").val(),
	idcardnumber:$("#idcardnumber").val(),
	bmtitle:$("#bmtitle_").text()},       function(data) {
                               var myjson = '';eval('myjson=' + data + ';');
                               alert(myjson.info);
							   window.location.href='/';
    
	    });

}
</script> 



</body>
</html>