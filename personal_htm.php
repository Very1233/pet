<!DOCTYPE HTML>
<html>
<head>
<title>个人中心</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary JavaScript plugins) -->
<script src="js/bootstrap.js"></script>
<!-- Custom Theme files -->

<link href="css/style_yuan.css" rel='stylesheet' type='text/css' />
<link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
   <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
   <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
   			<a href="exit.php">退出</a></p> 
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


<ul id="myTab" class="nav nav-tabs">
    <li><a data-toggle="tab" style="color:#b28b51;width:100px"></a></li>
   <li class="active">
      <a href="#home" data-toggle="tab" style="color:#b28b51;width:200px;">个人信息管理</a></li>
   <li><a href="#ios" data-toggle="tab" style="color:#b28b51;width:200px">宠物信息管理</a></li>
   <li><a href="#java"data-toggle="tab" style="color:#b28b51;width:200px">晒宠记录</a></li>
    <?php
     echo '<a href="personal_message.php" style="color:#b28b51;width:200px">消息提醒</a></li>';
       ?>
   <li>
</ul>
<div id="myTabContent" class="tab-content">
   <div class="tab-pane fade in active" id="home">
      <p> 
          <?php
       include ("personal_user.php");
       ?>

       </p>
   
   </div>
   <div class="tab-pane fade" id="ios">
      <p>
       <?php
       include ("personal_pet.php");
       ?></p>
   </div>
   <div class="tab-pane fade" id="java">
      <p>
       <?php
       include ("personal_show.php");
       ?></p>
   </div>
  
      
</div>

</body>
</html>