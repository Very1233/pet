
<!DOCTYPE HTML>
<html>
<head>
<title>Wildlife a Animal Category Flat Bootstarp Responsive Website Template | Home :: w3layouts</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary JavaScript plugins) -->
<script src="js/bootstrap.js"></script>
<!-- Custom Theme files -->
<link rel="stylesheet" href="css/lightbox.css">
<link href="css/style_yuan.css" rel='stylesheet' type='text/css' />
<style type="text/css"></style>
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
	echo '<p><a href="personal_htm.php">'.$row0["USER_NAME"].'</a>&nbsp;&nbsp;&nbsp;<a href="personal_message.php">消息</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="exit.php">退出</a></p> ';
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
				
				 <li class="active"><a href="index.php">首页</a></li>
				 <li><a href="show.php">晒宠</a></li>
				 <li><a href="walk.php">遛宠</a></li>
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

<div class="banner-sec">
	 <div class="banner-grids">
';	 
$sql = "SELECT SC_TEXT, SC_NUM, SC_PIC FROM SC_INFO ORDER BY SC_NUM DESC";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
	echo '
			<div class="col-md-7 banner-left" style="background:url('. $row["SC_PIC"].');background-size:800px  560px">
				<div class="banner_lft_info">
					<p><a href="show.php">最热萌宠</a></p>
				</div>
			</div>
		<div class="col-md-5 banner-right">' ;

$sql1 = "SELECT YLC_DESCRIPTION, YLC_NUM FROM YLC_INFO ORDER BY YLC_NUM DESC";
$result1 = mysql_query($sql1);
$row1 = mysql_fetch_array($result1);
	echo '
			<div class="bnr-right grid1" style="background:url(images/walking.jpg) no-repeat;background-size:285px  285px">
				<div class="banner_rght_info">
					<p><a href="walk.php">一起遛宠，官们约吗</a></p>
				</div>
			</div>';

$sql2 = "SELECT XC_TEXT, XC_TIME, XC_PIC FROM XC_INFO ORDER BY XC_TIME DESC";
$result2 = mysql_query($sql2);
$row2 = mysql_fetch_array($result2);
	echo '
			<div class="bnr-right grid2" style="background:url('. $row2["XC_PIC"].') no-repeat;background-size:285px  285px">
					 <div class="banner_rght_info bnr_rht">
						 <p><a href="search.php">宝贝不见了！</a></p>				 				 
					 </div>
				</div>
			<div class="clearfix"></div>';

$sql3 = "SELECT ZR_REQUEST, ZR_STARTTIME, PET_PIC FROM ZR_INFO ORDER BY ZR_STARTTIME DESC";
$result3 = mysql_query($sql3);
$row3 = mysql_fetch_array($result3);
	echo '
			<div class="bnr-right grid3" style="background:url('. $row3["PET_PIC"].') no-repeat;background-size:285px  285px">
					<div class="banner_rght_info">
						 <p><a href="adopt.php">求带走</a></p>				 					 
					 </div>
				 </div>';

$sql4 = "SELECT PZ_REQUEST, PZ_STARTTIME, PET_PIC, PET_ID FROM PZ_INFO LEFT OUTER JOIN PET USING(PET_ID) ORDER BY PZ_STARTTIME DESC";
$result4 = mysql_query($sql4);
$row4 = mysql_fetch_array($result4);
	echo '
			<div class="bnr-right grid4" style="background:url('. $row4["PET_PIC"].') no-repeat;background-size:285px  285px">
					 <div class="banner_rght_info bnr_rht">
						 <p><a href="breeding.php">在一起</a></p>				 					 
					 </div>
				 </div>
				 <div class="clearfix"></div>
			 </div>
			 <div class="clearfix"></div>
	 </div>	 
	</div>
</div></br>';
?>

<div class="copywrite">
	 <div class="container">
		 <div class="ftr-right">
			 <p>Copyright © 2015 SEO</p>
		 </div>
		 <div class="clearfix"></div>
	 </div>
</div>
<!----> 


</body>
</html>