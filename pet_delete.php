<?php
include("db_conn.php");
include("db_func.php");
header("Content-type: text/html; charset=utf-8"); 


   $pet_delete_id = $_POST['pet_delete_id'];  
  
   $SQLd ="delete from `pet` WHERE PET_ID=$pet_delete_id LIMIT 1";
		
    mysql_query($SQLd);
    header("Location:http://localhost/html/personal_htm.php"); 


?>