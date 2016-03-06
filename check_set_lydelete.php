<?php
include("db_conn.php");
include("db_func.php");
header("Content-type: text/html; charset=utf-8"); 


   $lysq_delete_id = $_POST['lysq_id'];  
  
   $SQLd ="delete from `lysq_info` WHERE LYSQ_ID=$lysq_delete_id LIMIT 1";
		
    mysql_query($SQLd);
    header("Location:http://localhost/html/personal_htm.php"); 


?>