<?php
include("db_conn.php");
include("db_func.php");
header("Content-type: text/html; charset=utf-8"); 


   $pzsq_delete_id = $_POST['pzsq_id'];  
  
   $SQLd ="delete from `pzsq_info` WHERE PZSQ_ID=$pzsq_delete_id LIMIT 1";
		
    mysql_query($SQLd);
    header("Location:http://localhost/html/personal_htm.php"); 


?>