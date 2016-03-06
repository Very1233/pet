<?php
   include("db_conn.php");
   include("db_func.php");
  $user_mail = $_POST['user_mail'];                    //add
  $user_password = $_POST['user_password']; 
	 
//开启一个会话
session_start();	

$sql = "select * from user where MAIL='$user_mail' and PASSWORD='$user_password'";
$result =db_query($sql);
 $home_url = 'index.php';

 
if (db_num_rows($result) > 0) {
	$row = db_fetch_array($result);
    $_SESSION['user_mail']=$row['MAIL'];
	header('Location: '.$home_url);
 }
 else {
   
	echo '<script>alert("密码或账号有误")
	 onclick=location.href="log_htm.php"
	</script>';
    
}

?>


