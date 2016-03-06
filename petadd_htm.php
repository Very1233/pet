<!DOCTYPE HTML>
<html>
<head>
<title>添加宠物</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

<script src="js/bootstrap.js"></script>

<link href="css/style_yuan.css" rel='stylesheet' type='text/css' />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.js"></script>
<style type="text/css">
body {
	background-image: url(images/bg/shattered.png);
}
</style>

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
?>
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
				 <li><a href="adopt.php">领养</a></li>
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
			<h2>添加你的宠物</h2>
			<div class="contact-bottom">
				 <div class="contact-text">
					<div class="col-md-9 contact-left">
						<form action="petadd.php" method="post">
                        <input type="text" value="宠物昵称" name="pet_name"onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '宠物昵称';}" style="border:solid #b28b51;"/>
						<input type="text" value="宠物品种" name="pet_breed"onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '宠物品种';}" style="border:solid #b28b51;"/>
                        	
				<!--		<input type="text" value="宠物生日"name="pet_birth" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '宠物生日';}" style="border:solid #b28b51;"/>  -->
                        <input type="text" value="宠物性别" name="pet_sex"onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '宠物性别';}" style="border:solid #b28b51;"/><br><br>
                        <input type="date" value="宠物生日"name="pet_birth" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '宠物生日';}" style="border:solid #b28b51;"/> 
						<textarea name="pet_description"value="宠物描述（特征、喜好等）:" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '宠物描述（特征、喜好等）:';}"style="border:solid #b28b51;">宠物描述（特征、喜好等）:</textarea>
	    
						<div id="preview" style="border:solid #b28b51;"></div>
						<input type="file" onchange="preview(this)" name="pet_pic"  />
 						<script type="text/javascript">  
 							function preview(file)
 							{
 								var prevDiv = document.getElementById('preview');
 								if (file.files && file.files[0])
  								{
  									var reader = new FileReader();
   									reader.onload = function(evt){
   									prevDiv.innerHTML = '<img src="' + evt.target.result + '" alt=""/>';
  									}  
   								reader.readAsDataURL(file.files[0]);
  								}
   								else  
								{
 								prevDiv.innerHTML = '<div class="img" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src=\'' + file.value + '\'"></div>';
 								}
 							}
 						</script>
                        <!--传递宠物ID--> 
                      
							<div class="submit-btn">								
									<input type="submit" value="SUBMIT">							
							</div>
						</form>
					</div>						
					<div class="clearfix"></div>
	 </div>
</div>	
<!----> 
</body>
</html>