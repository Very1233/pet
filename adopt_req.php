<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>申请领养</title>
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
<script class="resources library" src="js/area.js" type="text/javascript"></script>
<script type="text/javascript">_init_area();</script>
<style type="text/css">
 #preview, .img, img
 {
 width:300px;
 height:300px;
 }
 #preview
 {
border:1px solid #000;
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
				 <li class="active"><a href="adopt.php">转让/领养</a></li>
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
<div class="contact">
		<div class="container">
			<h2>填写申请资料</h2>
			<div class="contact-bottom">
				 <div class="contact-text">
					<div class="col-md-9 contact-left">
						<form action="adopt_resp.php" method="post">';
echo '
		<input type="hidden" name="ly" value="'.$_POST["ly"].'">
	';
?>

							<h3>所在地</h3>
<div class="info">
	<div>
	<select id="s_province" name="s_province" style="border:solid #b28b51;"></select>&nbsp;&nbsp;
    <select id="s_city" name="s_city" style="border:solid #b28b51;"></select>&nbsp;&nbsp;
    <select id="s_county" name="s_county" style="border:solid #b28b51;"></select>
    <script class="resources library" src="area.js" type="text/javascript"></script>
    <script type="text/javascript">_init_area();</script>
    </div>
    <div id="show"></div>
</div>
<script type="text/javascript">
function Gid($){
	return document.getElementById($);
}
var showArea = function(){
	Gid('show').innerHTML = "<input type='hidden' name='addr' value='" + 
	Gid('s_province').value + " -" + 	
	Gid('s_city').value + " -" + 
	Gid('s_county').value + "'>"
}
Gid('s_county').setAttribute('onchange','showArea()');
</script></br>
							<h3>申请介绍</h3>
							<textarea name="message" value="Message:"  style="border:solid #b28b51;"></textarea>
							<div class="submit-btn">								
									<input type="submit" value="申请">							
							</div>
						</form>
					</div>						
					<div class="clearfix"></div>
	 </div>
</div>	
<!----> 
</body>
</html>