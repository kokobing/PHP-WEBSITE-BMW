<?php

$objDB=new mysql($db_hostname,$db_username,$db_password,$db_database);
mysql_query("SET NAMES utf8"); 
mysql_query("set sql_mode=''"); 
//系统图片路径


$companytitle="::上海信息科技 信息管理系统::";
$logo_text="Mobile Website 2013 智能移动网站管理平台";

$indexlogin_top='智能网站';
$indexlogin_top1='Mobile Website '.date("Y");
$indexlogin_top2='智能移动网站管理平台';
$indexlogin_bottom='上海信息科技有限公司 信息管理系统商业授权版';

$footerleft="Powered by Website Mobi Management 2013 © 2008-2013, SHANGHAI TECHNOLOG CO,.LTD";
$footerright='<a href="#" target="_blank" class="link_edit">上海信息科技</a> 商业授权';

$logo_pic="";
?>
