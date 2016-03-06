<?php
	$DB_HOST	= "localhost";	  //数据库主机位置
	$DB_LOGIN	= "root";	  //数据库的使用账号
	$DB_PASSWORD	= "L3Ss35trLG2uX6mw";	  //数据库的使用密码
	$DB_NAME	= "web_pet";         //数据库名称
    header("Content-type: text/html; charset=utf-8"); 
	$conn = mysql_connect($DB_HOST, $DB_LOGIN, $DB_PASSWORD);
	mysql_select_db($DB_NAME);	
?>


