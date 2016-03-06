<html>
<head>
<style>

h2{
	color:#b28b51;
	margin-left:380px;
	margin-top:20px;
	margin-bottom:1px;
	margin-right:300px;
	font-size:50px;
}
h2 a{
	float: right;
	margin-right:50px;
	font-size:30px;
}

td{
	width:100px;
}
</style>
</head>
<body>
<?php
     include("db_conn.php");
	 include("db_func.php");
header("Content-type: text/html; charset=utf-8"); 

//使用会话内存储的变量值之前必须先开启会话
session_start();


//使用一个会话变量检查登录状态
if(isset($_SESSION['user_mail'])){
	$SQLStr="select * from user where MAIL='".$_SESSION['user_mail']."'";
	$res =db_query($SQLStr);
	$row=db_fetch_array($res);
    echo '<h2>'. $row['USER_NAME'] . '<a href="user_change_htm.php">修改个人信息</a></h2>';
	echo '<div class="ta"><tr>';
	        echo '<td><p class="tp">用户登录邮箱：'. $row['MAIL'] . '</p></td>';
			echo '<td><p class="tp">用户昵称：' . $row['USER_NAME'] . '</p></td>';
			echo '<td><p class="tp">真实姓名：' . $row['USER_REALNAME'] . '</p></td>';
			echo '<td><p class="tp">性别：' . $row['USER_GENDER'] . '</p></td>';
			echo '<td><p class="tp">地址：' . $row['USER_ADDRESS'] . '</p></td>';
			echo '<td><p class="tp">联系电话：' . $row['PHONE'] . '</p></td>';
			echo '<td><p class="tp">qq：' . $row['QQ'] . '</p></td>';
	echo '</tr></div>';	
}
else {
echo '你还没登录，请先登录';	
}

?>

</body>
</html>
