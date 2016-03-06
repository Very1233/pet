<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_user_log = "localhost";
$database_user_log = "seo";
$username_user_log = "root";
$password_user_log = "L3Ss35trLG2uX6mw";
$user_log = mysql_pconnect($hostname_user_log, $username_user_log, $password_user_log) or trigger_error(mysql_error(),E_USER_ERROR); 
?>