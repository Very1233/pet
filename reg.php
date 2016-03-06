<?php
   include("db_conn.php");
  
   header("Content-Type:text/html;charset=utf-8");


  
$sql = "SELECT USER_ID FROM user";
$result = mysql_query($sql);
$user_id = mysql_num_rows($result) + 1;

    // SQL 语句
    $user_mail = $_POST['user_mail'];                    //add
    $user_password = $_POST['user_password'];  
	$user_name = $_POST['user_name']; 
	$user_realname = $_POST['user_realname']; 
	$user_gender = $_POST['user_gender']; 
    $user_phone = $_POST['user_phone']; 
    $user_qq = $_POST['user_qq']; 
    $user_address = $_POST['address']; 
		 
	
	  $sqla="INSERT INTO `user`(`USER_ID`, `PASSWORD`, `USER_NAME`, `USER_REALNAME`, `USER_GENDER`, `USER_ADDRESS`, `PHONE`, `QQ`, `MAIL`) VALUES ('$user_id','$user_password','$user_name','$user_realname','$user_gender','$user_address','$user_phone','$user_qq', '$user_mail')";
 
   mysql_query($sqla);
  header("Location:http://localhost/html/index.php"); 

?>
