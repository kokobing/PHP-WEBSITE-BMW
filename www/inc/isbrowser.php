<?php

/* PHP 重定向
 if(stristr($_SERVER['HTTP_USER_AGENT'],'MSIE') || stristr($_SERVER['HTTP_USER_AGENT'],'Firefox')  || stristr($_SERVER['HTTP_USER_AGENT'],'Chrome')){
 header('Location: http://www.baidu.com');
 exit();
 }*/
 
require_once('mobile_device_detect.php');
$mobile = mobile_device_detect();

// redirect all mobiles to mobile site and all other browsers to desktop site
if($mobile==true){
  $mobile="手机型号";
}else{//不是手机
  //header('Location:http://demo-8.8800.org:7003/');exit; 
}

 

?>