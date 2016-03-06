<?php
   include("db_conn.php");
   session_start();
   header("Content-Type:text/html;charset=utf-8");
    // SQL 语句
                
    $user_password = $_POST['password'];  
	$user_name = $_POST['user_name']; 
	$user_realname = $_POST['user_realname']; 
	$user_gender = $_POST['user_gender']; 
    $user_phone = $_POST['phone']; 
    $user_qq = $_POST['qq']; 
    $user_address = $_POST['address']; 
	

	 $sql="UPDATE user SET PASSWORD='$user_password',USER_NAME='$user_name',USER_REALNAME='$user_realname',USER_GENDER='$user_gender',USER_ADDRESS='$user_address',PHONE='$user_phone',QQ='$user_qq' where MAIL='".$_SESSION['user_mail']."'";
   mysql_query($sql);
  echo '<script>alert("个人信息修改成功")
	 onclick=location.href="personal_htm.php"
	</script>';
    
	
?>
 