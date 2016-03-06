<?php
include("db_conn.php");
include("header.php");
//开启一个会话
session_start();	
	
  
header("Content-type: text/html; charset=utf-8"); 
echo '<style type="text/css">
body {
	background-image: url(images/bg/shattered.png);
}
</style>
';
$zruser_id= $_POST['zruser_id'];


    $SQLStr="select * from user where USER_ID='$zruser_id'";
	$res =mysql_query($SQLStr);
	$row_user=mysql_fetch_array($res);
	
	 $Sqlpet="select * from pet where USER_ID ='$zruser_id'";    //!!!
	$res_pet=mysql_query($Sqlpet);
	$num=mysql_num_rows($res_pet);
	
	echo '<div class="ta"><tr>';
	       echo '<td><p class="tp">用户昵称：' . $row_user['USER_NAME'] . '</p></td>';
		   echo '<td><p class="tp">性别：' . $row_user['USER_GENDER'] . '</p></td>';
		   echo '<td><p class="tp">qq：' . $row_user['QQ'] . '</p></td>';
		    echo '<td><p class="tp">电话：' . $row_user['PHONE'] . '</p></td>';	
			 echo '<td><p class="tp">地址：' . $row_user['USER_ADDRESS'] . '</p></td>';		
	       echo '<td><p class="tp">拥有宠物：</p></td>';
	if($num){
	for ($i=1;$i<=$num;$i++) {
   	$row_pet=mysql_fetch_array($res_pet);
	        echo '<td><p class="tp">宠物名字：'. $row_pet['PET_NAME'] . '</td><br/>';
	        echo '<img src="'.$row_pet["PET_PIC"].'"><br/>';                        //图片的调用用双引号！
			echo '<td><p class="tp">性别：' . $row_pet['PET_SEX'] . '</td><br/>';
			echo '<td><p class="tp">品种：' . $row_pet['PET_BREED'] . '</td><br/>';	
			echo '<td><p class="tp">宠物生日：' . $row_pet['PET_BIRTH'] . '</td><br/>';
			echo '<td><p class="tp">描述：' . $row_pet['PET_DESCRIPTION'] . '</td><br/>';
			echo  "*******************************************************************************";
	}	
	}
	echo '</tr></div>';	
	
    echo ' <form align="center">
					 
					     <div class="submit-btn_user">
					    <input type="submit"   value="晒宠记录">
					  </div><form>
							';
$sql_open = "SELECT USER_ID, SC_ID, SC_PIC, SC_TEXT, SC_NUM, SC_TIME, USER_NAME FROM SC_INFO LEFT OUTER JOIN USER USING(USER_ID) 
		WHERE SC_INFO.USER_ID ='".$row_user['USER_ID']."' ORDER BY SC_TIME DESC";
$result = mysql_query($sql_open);

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
									<input style="float:right" type="submit" value="赞 '. $row["SC_NUM"].'">							
							</div>
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
									<input style="float:right" type="submit" value="赞 '. $row["SC_NUM"].'">							
							</div>
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
									<input style="float:right" type="submit" value="赞 '. $row["SC_NUM"].'">							
							</div>						
					   <p>'. $row["SC_TEXT"].'</p>
					  </div>
				 </div>
			  </div>
			  <div class="clearfix"></div>';
    	}

    	
	}
} 
   
   
   

?>