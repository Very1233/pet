<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_show = "localhost";
$database_show = "seo";
$username_show = "root";
$password_show = "L3Ss35trLG2uX6mw";
$show = mysql_pconnect($hostname_show, $username_show, $password_show) or trigger_error(mysql_error(),E_USER_ERROR); 
?>