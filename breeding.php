
<!DOCTYPE HTML>
<html>
<head>
<title>配种</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary JavaScript plugins) -->
<script src="js/bootstrap.js"></script>
<!-- Custom Theme files -->
<link href="css/style_yuan.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Wildlife Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.js"></script>
<style type="text/css">
body {
	background-image: url(images/bg/shattered.png);
}
</style>
</head>
<body>
<!-- banner -->
<div class="header-top">
	 <div class="container">
		 <div class="logo">			
				 <h1><a href="index.php">铲屎官联盟</a></h1>			
		 </div>
		 <div class="details">				 
				<div class="locate">
					 <div class="detail-grid">
						<div id="apDiv1">
<?php
include("db_conn.php");
include("db_func.php");
header("Content-type: text/html; charset=utf-8"); 
session_start();

if(isset($_SESSION['user_mail']))
{
	$sql0 = "SELECT USER_NAME FROM USER WHERE MAIL= '".$_SESSION['user_mail']."'";
	$result0 = mysql_query($sql0);
	$row0 = mysql_fetch_array($result0);
	echo '<p><a href="personal_htm.php">'.$row0["USER_NAME"].'</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="exit.php">退出</a></p> ';
}
else
	echo '<p><a href="log_htm.php">登录&nbsp;&nbsp;&nbsp;</a><a href="reg_htm.php">注册&nbsp;&nbsp;&nbsp;</a></p> ';
echo '
</div>
					 </div>
				</div>
		 </div>
		 <div class="clearfix"></div>
	 </div>
</div>
<div class="header">
	 <div class="container">
		 <div class="top-menu">
			 <span class="menu"><img src="images/menu.png" alt=""></span>
			 <ul class="nav1">
				 <li ><a href="index.php">首页</a></li>
				 <li><a href="show.php">晒宠</a></li>
				 <li><a href="walk.php">遛宠</a></li>
				 <li><a href="search.php">寻宠</a></li>
				 <li><a href="adopt.php">转让/领养</a></li>
				 <li class="active"><a href="breeding.php">配种</a></li>
			 </ul>
		 </div>
		 <!-- script-for-menu -->
							 <script>
							   $( "span.menu" ).click(function() {
								 $( "ul.nav1" ).slideToggle( 300, function() {
								 // Animation complete.
								  });
								 });
							</script>
		 <!-- /script-for-menu -->
		 <div class="search">					
				<form>
				 <input type="text" value="" placeholder="Search...">
				 <input type="submit" value="">
				</form>					
		 </div>
		 <div class="clearfix"></div>
	 </div>
</div>
<!----> 
<div class="about">
	<h2><a href="breed_html.php">发布配种</a></h2>
';

$sql_timeout1 = "DELETE FROM `PZSQ_INFO` WHERE PZ_ID IN (SELECT PZ_ID FROM `PZ_INFO` WHERE DATE_FORMAT(PZ_ENDTIME,'%Y-%m-%d') < DATE_FORMAT(NOW(),'%Y-%m-%d'))";
 mysql_query($sql_timeout1);

$sql_timeout2 = "DELETE FROM `PZ_INFO` WHERE DATE_FORMAT(PZ_ENDTIME,'%Y-%m-%d') < DATE_FORMAT(NOW(),'%Y-%m-%d')";
 mysql_query($sql_timeout2);

$sql = "SELECT USER_ID, PET_ID, PZ_ID, PZ_REQUEST, PZ_STARTTIME, PZ_ENDTIME, ADDRESS, USER_NAME FROM PZ_INFO 
		LEFT OUTER JOIN USER USING(USER_ID)
		WHERE PZ_INFO.USER_ID=USER.USER_ID  ORDER BY PZ_STARTTIME DESC";
$result = db_query($sql);

$sql2 = "SELECT PET_ID, PZ_STARTTIME, PET_PIC FROM PZ_INFO LEFT OUTER JOIN PET USING(PET_ID)
		WHERE PZ_INFO.PET_ID=PET.PET_ID ORDER BY PZ_STARTTIME DESC";
$result2 = db_query($sql2);


if (db_num_rows($result) > 0) {
    // 输出每行数据
    $i = 0;
    while($row = db_fetch_array($result)) {
    	$row2 = db_fetch_array($result2);
    	echo '<div class="container">
		 <h2> </h2>
		 <div class="about-head" style="outline:8px solid #b28b51;border:8px solid white;margin-left:50px;margin-right:50px">
		 <form action="user_open.php" method="post">
					   <input type="hidden" name="show_user_id" value="'.$row["USER_ID"].'" >
					     <div class="submit-btn_user">
					    <input type="submit"   value="'. $row["USER_NAME"].'">
					  </div></form>

			 <img src="'. $row2["PET_PIC"].'" class="img-responsive" alt=""/>
			 <div class="about-info" >
			 <table>
			 <tr>
				 <td width="45%"><p class="p_time">地点：'. $row["ADDRESS"].'</p></td>
				 <td width="30%"><p class="p_time">截止时间：'. $row["PZ_ENDTIME"].'</p></td>
			</tr>
			</table>
				 <p>'. $row["PZ_REQUEST"].'</p>

				 <form action="breed_req.php" method="post">
							<input type="hidden" name="pz" value="'.$row["PZ_ID"].'">
							<div class="submit-btn">							
									<input type="submit" value="申请配种">							
							</div>
				</form>
			 </div>

			 <div class="clearfix"></div>
		 </div>			         
	 </div>';

    	
	}
} 
?>
</div>	
<!----> 
</body>
</html>