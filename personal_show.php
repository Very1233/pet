<?php
include("db_conn.php");
 
header("Content-type: text/html; charset=utf-8"); 


if(isset($_SESSION['user_mail'])){

$SQLStr="select * from user where MAIL='".$_SESSION['user_mail']."'";
	$res =mysql_query($SQLStr);
	$row_user=mysql_fetch_array($res);


$sql = "SELECT USER_ID, SC_ID, SC_PIC, SC_TEXT, SC_NUM, SC_TIME, USER_NAME FROM SC_INFO LEFT OUTER JOIN USER USING(USER_ID) 
		WHERE SC_INFO.USER_ID ='".$row_user['USER_ID']."' ORDER BY SC_TIME DESC";
$result = mysql_query($sql);

	echo'<div class="project-sec">
	 <div class="container">
		  <div class="works">	';

if (mysql_num_rows($result) > 0) {
    // 输出每行数据
    $i = 0;
    while($row = mysql_fetch_array($result)) {
    	if($i == 0){
    		$i += 1;
    		echo '<div class="prjt-grid">
				 <div class="box maxheight">
				 <div class="project-info">
				<h4>'.$row["SC_TIME"].'</h4></td>
					 
				 <a class="example-image-link" href="'. $row["SC_PIC"].'" data-lightbox="example-7" data-title="Optional caption.">
				 <img class="example-image" src="'. $row["SC_PIC"].'"></a>					 					
					  <div class="submit-btn">							
									<input style="float:right" type="submit" value="被赞 '. $row["SC_NUM"].'">	<br><br><br>							
							</div>
							 
					   <form action="show_delete.php" method="post">
					  <div class="submit-btn">							
									<input style="float:right" type="submit" value="删&nbsp;&nbsp;除">								
							</div>
						
							<input type="hidden" name="show_delete_id" value="'. $row["SC_ID"].'">
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
						<h4>'.$row["SC_TIME"].'</h4>

				 <a class="example-image-link" href="'. $row["SC_PIC"].'" data-lightbox="example-7" data-title="Optional caption.">
				 <img class="example-image" src="'. $row["SC_PIC"].'"></a>					 					
					  <div class="submit-btn">							
									<input style="float:right" type="submit" value="被赞 '. $row["SC_NUM"].'"><br><br><br>								
							</div>
							 
					   <form action="show_delete.php" method="post">
					  <div class="submit-btn">							
									<input style="float:right" type="submit" value="删&nbsp;&nbsp;除">								
							</div>
						
							<input type="hidden" name="show_delete_id" value="'. $row["SC_ID"].'">
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
					   <h4>'.$row["SC_TIME"].'</h4>

				 <a class="example-image-link" href="'. $row["SC_PIC"].'" data-lightbox="example-7" data-title="Optional caption.">
				 <img class="example-image" src="'. $row["SC_PIC"].'"></a>					 										
				<div class="submit-btn">							
									<input style="float:right" type="submit" value="被赞 '. $row["SC_NUM"].'">	<br><br><br>							
							</div>		
							 <form action="show_delete.php" method="post">
					  <div class="submit-btn">							
									<input style="float:right" type="submit" value="删&nbsp;&nbsp;除">								
							</div>
						
							<input type="hidden" name="show_delete_id" value="'. $row["SC_ID"].'">
					</form>				
					   <p>'. $row["SC_TEXT"].'</p>
					  </div>
					  
					  
				 </div>
			  </div>
			  <div class="clearfix"></div>';
    	}

    	
	}
} 
}
else{
	echo '你还没有登录，请先登录';
}
?>