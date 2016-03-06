<?php
include("db_conn.php");
include("db_func.php");
header("Content-type: text/html; charset=utf-8"); 


   $lysq_id = $_POST['lysq_id'];  
  
$SQL ="UPDATE lysq_info SET LYSQ_CHECK='1'  WHERE LYSQ_ID= '$lysq_id'";
		
mysql_query($SQL);
    header("Location:http://localhost/html/personal_message.php"); 


?>