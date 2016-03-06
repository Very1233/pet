<!DOCTYPE HTML>
<html>
<head>
<title>约遛宠</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary JavaScript plugins) -->
<script src="js/bootstrap.js"></script>
<!-- Custom Theme files -->
<link rel="stylesheet" href="css/lightbox.css">
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
				 <li class="active"><a href="walk.php">遛宠</a></li>
				 <li><a href="search.php">寻宠</a></li>
				 <li><a href="adopt.php">转让/领养</a></li>
				 <li><a href="breeding.php">配种</a></li>
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
	<h2><a href="walk_add_html.php">约遛宠</a></h2>
';

$sql_timeout1 = "DELETE FROM GS_INFO WHERE YLC_ID IN (SELECT YLC_ID FROM YLC_INFO WHERE YLC_ENDDATE < strtotime(date('Y-m-d'))";
$result_timeout1 = mysql_query($sql_timeout1);

$sql_timeout2 = "DELETE FROM YLC_INFO WHERE  YLC_ENDDATE < strtotime(date('Y-m-d'))";
$result_timeout2 = mysql_query($sql_timeout2);


$sql = "SELECT USER_ID, PET_NUM, YLC_ID, YLC_DESCRIPTION, YLC_TIME, YLC_STARTDATE, YLC_STARTTIME, YLC_ENDDATE, YLC_ENDTIME, YLC_NUM, ADDRESS, YLC_NUM, USER_NAME FROM YLC_INFO 
		LEFT OUTER JOIN USER USING(USER_ID) 
		WHERE YLC_INFO.USER_ID = USER.USER_ID ORDER BY YLC_TIME DESC";
$result = mysql_query($sql);


if (mysql_num_rows($result) > 0) {
    // 输出每行数据
    $i = 1;
    while($row = mysql_fetch_array($result)) {
    	if($i){
    	echo '<div class="container">
		 <h2> </h2>
		 <div class="about-head">
			 <div class="about-info" style="outline:8px solid #b28b51;border:8px solid white;margin-left:150px" >
			 <table>
			 <tr>
				<td width="33%"> <form action="user_open.php" method="post">
					   <input type="hidden" name="show_user_id" value="'.$row["USER_ID"].'" >
					     <div class="submit-btn_user">
					    <input type="submit"   value="'. $row["USER_NAME"].'">
					  </div></form></td>
				<td width="40%"><p class="p_time">遛宠地点：'. $row["ADDRESS"].'</p></td>
				<td width="25%">
				<form action="gs_add.php" method="post">
					  <div class="submit-btn">							
									<input style="float:right" type="submit" value="参与 '. $row["YLC_NUM"].'">							
							</div>
							<input type="hidden" name="id" value="'.$row["YLC_ID"].'">
							<input type="hidden" name="num" value="'.$row["YLC_NUM"].'">
					</form>
				</td>
			</tr>
			<tr>
				 <td width="30%"><p class="p_time">遛宠数目：'. $row["PET_NUM"].'</p></td>
				 <td width="70%"><p class="p_time">遛宠时间：'. $row["YLC_STARTDATE"].' ' . $row["YLC_STARTTIME"]. 
				 										' ~ '. $row["YLC_ENDDATE"].' ' . $row["YLC_ENDTIME"]. '</p></td>
			</tr>
			</table>
			<p>'. $row["YLC_DESCRIPTION"].'</p>
			 </div>

			 <div class="clearfix"></div>
		 </div>			         
	 </div>';
	 $i = 0;
	}
	else
	{
		echo '<div class="container">
		 <h2> </h2>
		 <div class="about-head">
			 <div class="about-info" style="outline:8px solid #b28b51;border:8px solid white;margin-left:150px">
			 <table>
			 <tr>
				 <td width="35%"><form action="user_open.php" method="post">
					   <input type="hidden" name="show_user_id" value="'.$row["USER_ID"].'" >
					     <div class="submit-btn_user">
					    <input type="submit"   value="'. $row["USER_NAME"].'">
					  </div></form></td>
				 <td width="40%"><p class="p_time">遛宠地点：'. $row["ADDRESS"].'</p></td>
				 <td width="25%">
				<form action="gs_add.php" method="post">
					  <div class="submit-btn">							
									<input style="float:right" type="submit" value="参与 '. $row["YLC_NUM"].'">							
							</div>
							<input type="hidden" name="id" value="'.$row["YLC_ID"].'">
							<input type="hidden" name="num" value="'.$row["YLC_NUM"].'">
					</form>
				</td>
				</tr>
			<tr>
				 <td width="30%"><p class="p_time">遛宠数目：'. $row["PET_NUM"].'</p></td>
				 <td width="70%"><p class="p_time">遛宠时间：'. $row["YLC_STARTDATE"].' ' . $row["YLC_STARTTIME"]. 
				 										' ~ '. $row["YLC_ENDDATE"].' ' . $row["YLC_ENDTIME"]. '</p></td>
			</tr>
			</table>
			<p>'. $row["YLC_DESCRIPTION"].'</p>
			 </div>
			 <div class="clearfix"></div>
		 </div>			         
	 </div>';
	 $i = 1;
	}
	}
} 
?>
</div>	
<!----> 
</body>
</html>