<?php
     include("db_conn.php");
	
header("Content-type: text/html; charset=utf-8"); 
echo '<style type="text/css">
body {
	background-image: url(images/bg/shattered.png);
}
</style>
';
//使用会话内存储的变量值之前必须先开启会话

//使用一个会话变量检查登录状态
if(isset($_SESSION['user_mail'])){
	$SQLStr="select * from user where MAIL='".$_SESSION['user_mail']."'";
	$res =mysql_query($SQLStr);
	$row=mysql_fetch_array($res);
	$Sqlpet="select * from pet where USER_ID ='".$row['USER_ID']."'";    //!!!
	$res_pet=mysql_query($Sqlpet);
	$num=mysql_num_rows($res_pet);
	echo '<h2><a href="petadd_htm.php">添加更多宠物</a></h2></br></br></br>';
	if($num){
	for ($i=1;$i<=$num;$i++) {
   	$row_pet=mysql_fetch_array($res_pet);
	echo '<div class="ta"><tr>';
	echo '<form action="pet_change_htm.php" method="post">
				<div class="submit-btn">							
					<input style="float:right" type="submit" value="修改宠物信息">
												
				</div>
			<input type="hidden" name="changepet_id" value="'. $row_pet["PET_ID"].'">
		</form><br/>';
		
		echo '<br/>';echo '<br/>';echo '<br/>';
		
		echo '<form action="pet_delete.php" method="post">
				<div class="submit-btn">							
					<input style="float:right" type="submit" value="删除宠物信息">							
				</div>
			<input type="hidden" name="pet_delete_id" value="'. $row_pet["PET_ID"].'">
		</form>';
	        echo '<td><p class="tp">宠物名字：'. $row_pet['PET_NAME'] . '</td><br/>';
	        echo '<img src="'.$row_pet["PET_PIC"].'"><br/>';                        //图片的调用用双引号！
			echo '<td><p class="tp">性别：' . $row_pet['PET_SEX'] . '</td><br/>';
			echo '<td><p class="tp">品种：' . $row_pet['PET_BREED'] . '</td><br/>';	
			echo '<td><p class="tp">宠物生日：' . $row_pet['PET_BIRTH'] . '</td><br/>';
			echo '<td><p class="tp">描述：' . $row_pet['PET_DESCRIPTION'] . '</td><br/>';
						
	echo "</tr></div>";
	}
	
   }
	
  
}
else{
	echo '你还没有登录，请先登录';
}

?>

