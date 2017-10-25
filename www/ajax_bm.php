<?php  
require "inc/config.php";
require "inc/function.class.php";
date_default_timezone_set('Asia/Shanghai'); 

$name = $_REQUEST["name"];
$sex = $_REQUEST["sex"];
$phonenumber = $_REQUEST["phonenumber"];
$idcardnumber = $_REQUEST["idcardnumber"];
$bmtitle = $_REQUEST["bmtitle"];


$subject=$bmtitle." : ".$name." -  时间：".date("Y-m-d h:i:s");//主题
//内容
$body="

".$bmtitle."

<br><br>
	   
姓 名 ：".$name."<br>

性 别 ：".$sex."<br>

手 机 : ".$phonenumber."<br>

身份证 : ".$idcardnumber."<br><br>


".date("Y")."-".date("m")."-".date("d")."";



$strSQL="INSERT INTO newsinfo(title,content,id_newsdir,indate,newsdate) values('$subject','$body','4',now(),now())";
$objDB->Execute($strSQL);

$ordernumid=$objDB->getInsertID();//获取插入到数据库记录的ID号
$strSQL="UPDATE newsinfo SET ordernum='$ordernumid'   where id_newsinfo='$ordernumid'";
$objDB->Execute($strSQL);



  $arr['info']="报名成功!";
  $myjson= json_encode($arr);
  echo $myjson;




?>

