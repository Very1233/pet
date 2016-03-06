<!DOCTYPE HTML>
<html>
<head>
<title>晒宠</title>
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
				 <li class="active"><a href="show.php">晒宠</a></li>
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

<!----> 
<div class="project-sec">
	 <div class="container">
		 <h2><a href="show_add_html.php">发布晒宠</a></h2>
		  <div class="works">	
';

$sql = "SELECT USER_ID, SC_ID, SC_PIC, SC_TEXT, SC_NUM, SC_TIME, USER_NAME FROM SC_INFO LEFT OUTER JOIN USER USING(USER_ID) 
		WHERE SC_INFO.USER_ID = USER.USER_ID ORDER BY SC_TIME DESC";
$result = mysql_query($sql);


if (mysql_num_rows($result) > 0) {
    // 输出每行数据
    $i = 0;
    while($row = mysql_fetch_array($result)) {
    	if($i == 0){
    		$i += 1;
    		echo '<div class="prjt-grid">
				 <div class="box maxheight">
				 <div class="project-info">
				 	<table>
					   <tr>
					   <td width="55%"> 
					  <form action="user_open.php" method="post">
					   <input type="hidden" name="show_user_id" value="'.$row["USER_ID"].'" >
					     <div class="submit-btn_user">
					    <input type="submit"   value="'. $row["USER_NAME"].'">
					  </div></form></td>
					   <td width="45%" align="right">.<h4>'.$row["SC_TIME"].'</h4></td>
					  </tr>
					</table>
				 <a class="example-image-link" href="'. $row["SC_PIC"].'" data-lightbox="example-7" data-title="Optional caption.">
				 <img class="example-image" src="'. $row["SC_PIC"].'"></a>					 					
					  <form action="dz_add.php" method="post">
					  <div class="submit-btn">							
									<input style="float:right" type="submit" value="点赞 '. $row["SC_NUM"].'">							
							</div>
							<input type="hidden" name="id" value="'.$row["SC_ID"].'">
							<input type="hidden" name="num" value="'.$row["SC_NUM"].'">
					</form>
					<p>'. $row["SC_TEXT"].'</p>
					  </div>
				 </div>
			  </div>';
    	}
    	else if($i == 1){
    		$i += 1; 
    		echo '<div class="prjt-grid">
				 <div class="box maxheight">
					  <div class="project-info">
				 	<table>
					   <tr>
					   <td width="55%"> 
					   <form action="user_open.php" method="post">
					   <input type="hidden" name="show_user_id" value="'.$row["USER_ID"].'" >
					     <div class="submit-btn_user">
					    <input type="submit"   value="'. $row["USER_NAME"].'">
					  </div></form></td>
					   <td width="45%" align="right">.<h4>'.$row["SC_TIME"].'</h4></td>
					  </tr>
					</table>
				 <a class="example-image-link" href="'. $row["SC_PIC"].'" data-lightbox="example-7" data-title="Optional caption.">
				 <img class="example-image" src="'. $row["SC_PIC"].'"></a>					 					
					  <form action="dz_add.php" method="post">
					  <div class="submit-btn">							
									<input style="float:right" type="submit" value="点赞 '. $row["SC_NUM"].'">							
							</div>
							<input type="hidden" name="id" value="'.$row["SC_ID"].'">
							<input type="hidden" name="num" value="'.$row["SC_NUM"].'">
					</form>
					<p>'. $row["SC_TEXT"].'</p>
					  </div>
				 </div>
			  </div>';
    	}
    	else if($i == 2){
    		$i = 0;
    		echo '<div class="prjt-grid span66">
				 <div class="box maxheight">
					  <div class="project-info">
				 	<table>
					   <tr>
					   <td width="55%"> <form action="user_open.php" method="post">
					   <input type="hidden" name="show_user_id" value="'.$row["USER_ID"].'" >
					     <div class="submit-btn_user">
					    <input type="submit"   value="'. $row["USER_NAME"].'">
					  </div></form></td>
					   <td width="45%" align="right">.<h4>'.$row["SC_TIME"].'</h4></td>
					  </tr>
					</table>
				 <a class="example-image-link" href="'. $row["SC_PIC"].'" data-lightbox="example-7" data-title="Optional caption.">
				 <img class="example-image" src="'. $row["SC_PIC"].'"></a>					 					
					  <form action="dz_add.php" method="post">
					  <div class="submit-btn">							
									<input style="float:right" type="submit" value="点赞 '. $row["SC_NUM"].'">							
							</div>
							<input type="hidden" name="id" value="'.$row["SC_ID"].'">
							<input type="hidden" name="num" value="'.$row["SC_NUM"].'">
					</form>
					   <p>'. $row["SC_TEXT"].'</p>
					  </div>
				 </div>
			  </div>
			  <div class="clearfix"></div>';
    	}

    	
	}
} 

?>
		  
			  
          </div>
	 </div>
</div>
<script src="js/lightbox-plus-jquery.min.js"></script>
<!----> 
</body>
</html>