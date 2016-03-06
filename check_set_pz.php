<?php
include("db_conn.php");
include("db_func.php");
header("Content-type: text/html; charset=utf-8"); 


   $pzsq_id = $_POST['pzsq_id'];  
  
$SQL ="UPDATE pzsq_info SET PZSQ_CHECK='1'  WHERE PZSQ_ID= '$pzsq_id'";
		
mysql_query($SQL);
    header("Location:http://localhost/html/personal_message.php"); 


?>