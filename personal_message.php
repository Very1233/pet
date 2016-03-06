>

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

if(isset($_SESSION['user_mail'])){


$SQLStr="select * from user where MAIL='".$_SESSION['user_mail']."'";
	$res =mysql_query($SQLStr);
	$row_user=mysql_fetch_array($res);//可以获取当前用户的user_id
	
//约遛宠跟随
    $SQLStr_ylc="select * from ylc_info where USER_ID='".$row_user['USER_ID']."'";
	$res_ylc =mysql_query($SQLStr_ylc);
	$row_ylc=mysql_fetch_array($res_ylc);//可以获取当前用户的所有约遛宠发布信息ID
	
	
	
	$sql_gs ="select * from GS_INFO where YLC_ID ='".$row_ylc['YLC_ID']."'";
	$res_gs =mysql_query($sql_gs);
	$row_gs=mysql_fetch_array($res_gs);   //可以获取当前用户的所有约遛宠发布信息的对应跟随信息
	$num_gs=mysql_num_rows($res_gs);   //参与数
	
	
	$sql_gs_username="select USER_NAME from user where USER_ID ='".$row_gs['USER_ID']."'";
	$res_gs_username=mysql_query($sql_gs_username);//找出跟随者的user_name
	$row_gs_username=mysql_fetch_array($res_gs_username);

//配种申请消息sql	
	$SQLStr_pz="select * from pz_info where USER_ID='".$row_user['USER_ID']."'";
	$res_pz =mysql_query($SQLStr_pz);
	$row_pz=mysql_fetch_array($res_pz);//可以获取当前用户的所有配种发布信息ID
	
	
	
	$sql_pzsq ="select * from PZSQ_INFO where pz_ID ='".$row_pz['PZ_ID']."'";
	$res_pzsq =mysql_query($sql_pzsq);
	$row_pzsq=mysql_fetch_array($res_pzsq);   //可以获取当前用户的所有配种发布信息的对应申请信息
	$num_pzsq=mysql_num_rows($res_pzsq);   //申请的条数
	
		$sql_pzsq_username="select USER_NAME from user where USER_ID ='".$row_pzsq['USER_ID']."'";
	$res_pzsq_username=mysql_query($sql_pzsq_username);//找出提交配种申请的user_name
   $row_pzsq_username=mysql_fetch_array($res_pzsq_username);
	
	
	$sql_pzsq_pet ="select * from pet where PET_ID ='".$row_pzsq['PET_ID']."'";
	$res_pzsq_pet =mysql_query($sql_pzsq_pet);
	$row_pzsq_pet=mysql_fetch_array($res_pzsq_pet);   //可以获取提出配种申请对应宠物的信息

//领养申请sql
    $SQLStr_zr="select * from zr_info where USER_ID='".$row_user['USER_ID']."'";
	$res_zr =mysql_query($SQLStr_zr);
	$row_zr=mysql_fetch_array($res_zr);//可以获取当前用户的所有转让发布信息ID
	
	
	
	$sql_lysq ="select * from LYSQ_INFO where ZR_ID ='".$row_zr['ZR_ID']."'";
	$res_lysq =mysql_query($sql_lysq);
	$row_lysq=mysql_fetch_array($res_lysq);   //可以获取当前用户的所有转让发布信息的对应申请信息
	$num_lysq=mysql_num_rows($res_lysq);   //申请的条数
	
	
	$sql_lysq_username="select USER_NAME from user where USER_ID ='".$row_lysq['USER_ID']."'";
	$res_lysq_username=mysql_query($sql_lysq_username);//找出提交领养申请的user_name
     $row_lysq_username=mysql_fetch_array($res_lysq_username);

	$sql_selflysq ="select * from lysq_info where USER_ID='".$row_user["USER_ID"]."' and LYSQ_CHECK='1'";
	$res_selflysq =mysql_query($sql_selflysq);
	$row_selflysq=mysql_fetch_array($res_selflysq);   //可以获取当前用户的领养申请
	$num_selflysq=mysql_num_rows($res_selflysq);
	
	$sql_selflysq_user ="select * from ZR_INFO where ZR_ID='".$row_selflysq["ZR_ID"]."'";
	$res_selflysq_user =mysql_query($sql_selflysq_user);
	$row_selflysq_user=mysql_fetch_array($res_selflysq_user);   //可以获取当前用户的领养申请的宠物原主人id
	
     
  
    $sql_selfpzsq ="select * from PZSQ_INFO where USER_ID='".$row_user["USER_ID"]."' and PZSQ_CHECK='1'";
	$res_selfpzsq =mysql_query($sql_selfpzsq);
	$row_selfpzsq=mysql_fetch_array($res_selfpzsq);   //可以获取当前用户的配种申请
	$num_selfpzsq=mysql_num_rows($res_selfpzsq);  
	
	$sql_selfpzsq_user ="select * from PZ_INFO where PZ_ID='".$row_selfpzsq["PZ_ID"]."'";
	$res_selfpzsq_user =mysql_query($sql_selfpzsq_user);
	$row_selfpzsq_user=mysql_fetch_array($res_selfpzsq_user);   //可以获取当前用户的配种申请的宠物原主人id
	 


	
//领养申请信息	
echo '<div class="ta"><tr>';
	     
	if($num_lysq){
	for ($i=1;$i<=$num_lysq;$i++) {

	        echo '<td><p class="tp">你的宠物转让有了申请信息</td>';
	        echo '<td><p class="tp">申请者：
			 <form action="user_open.php" method="post">
					   <input type="hidden" name="show_user_id" value="'.$row_lysq['USER_ID'].'" >
					     <div class="submit-btn_userlittle">
					    <input type="submit"   value="'.$row_lysq_username['USER_NAME'].'">
					  </div></form>
			
			</td>';    
			echo '<td><p class="tp">申请时间：'.$row_lysq["LYSQ_TIME"].'</td><br/>';	
			echo '<td><p class="tp">地址：'.$row_lysq["ADDRESS"].'</td><br/>';	
			echo '<td><p class="tp">申请描述：'. $row_lysq["LYSQ_DESCRIPTION"].'</td><br/>';	
				if ($row_lysq["LYSQ_CHECK"] == '1'){
					 echo '<td> 
			  	
					  <div class="submit-btn">							
									<input style="float:right" type="submit" value="已审核">							
							</div>
						
				</td><br/>';}
				else	{	
			echo '<td> 
			   <form action="check_set_ly.php" method="post">
					  <div class="submit-btn">							
									<input style="float:right" type="submit" value="未审核"><br><br>					
							</div>
						
							<input type="hidden" name="lysq_id" value="'. $row_lysq["LYSQ_ID"].'">
					</form>
					</td><br/>';
				echo '<td> 
			   <form action="check_set_lydelete.php" method="post">
					  <div class="submit-btn">							
									<input style="float:right" type="submit" value="拒 &nbsp;&nbsp;绝"><br><br><br>									
							</div>
						
							<input type="hidden" name="lysq_id" value="'. $row_lysq["LYSQ_ID"].'">
					</form>
					</td><br/>';	
					
					}
	}	
	}
	else{
	echo '无宠物领养申请<br/>';
  }
	echo '</tr></div>';	


//配种申请消息	
echo '<div class="ta"><tr>';
	     
	if($num_pzsq){
	for ($i=1;$i<=$num_pzsq;$i++) {
            
	        echo '<td><p class="tp">你的宠物配种邀请有了申请信息</td><br/>';
	        echo '<td><p class="tp">申请者：
			
			 <form action="user_open.php" method="post">
					   <input type="hidden" name="show_user_id" value="'.$row_pzsq['USER_ID'].'" >
					     <div class="submit-btn_userlittle">
					    <input type="submit"   value="'.$row_pzsq_username['USER_NAME'].'">
					  </div></form>
			
			</td><br/>';
			echo '<td><p class="tp">申请时间：'.$row_pzsq["PZSQ_TIME"].'</td><br/>';	
			echo '<td><p class="tp">地址：'.$row_pzsq["ADDRESS"].'</td><br/>';	
			echo '<td><p class="tp"> 
			<a class="example-image-link" href="'. $row_pzsq_pet["PET_PIC"].'" data-lightbox="example-7" data-title="Optional caption.">申请者的宠物图片：
				 <img class="example-image" src="'. $row_pzsq_pet["PET_PIC"].'"></a></td><br/>';	
				 echo '<td><p class="tp">申请描述：'. $row_pzsq["PZSQ_DESCRIPTION"].'</td><br/>';
			if ($row_pzsq["PZSQ_CHECK"] == '1'){
				 echo '<td> 
			  	
					  <div class="submit-btn">							
									<input style="float:right" type="submit" value="已审核">	<br><br><br>						
							</div>
						
					</td><br/>';}
					else{
			echo '<td> 
			   <form action="check_set_pz.php" method="post">
					  <div class="submit-btn">							
									<input style="float:right" type="submit" value="未审核"><br><br>							
							</div>
						
							<input type="hidden" name="pzsq_id" value="'. $row_pzsq["PZSQ_ID"].'">
					</form>
					</td><br/>';
					echo '<td> 
			   <form action="check_set_pzdelete.php" method="post">
					  <div class="submit-btn">							
									<input style="float:right" type="submit" value="拒 &nbsp;&nbsp;绝"><br><br><br>									
							</div>
						
							<input type="hidden" name="pzsq_id" value="'. $row_pzsq["PZSQ_ID"].'">
					</form>
					</td><br/>';	
					}
	}	
	}
	else{
	echo '无宠物配种申请<br/>';
  }
	echo '</tr></div>';	

}
else{
	echo '你还没有登录';
}

echo '<div class="ta"><tr>';
	     
	if($num_gs){
	for ($i=1;$i<=$num_gs;$i++) {

	        echo '<td><p class="tp">你的遛宠邀请有了跟随者</td>';
	        echo '<td><p class="tp">约遛宠发布时间：'.$row_ylc["YLC_TIME"].'</td>';
			echo '<td><p class="tp">跟随者：
			 <form action="user_open.php" method="post">
					   <input type="hidden" name="show_user_id" value="'. $row_gs['USER_ID'].'" >
					     <div class="submit-btn_userlittle">
					    <input type="submit"   value="'. $row_gs_username['USER_NAME'].'">
					  </div></form>
					  
			
			</td>';	
			
	}	
	}
	else{
	echo '约遛宠没有跟随<br/>';
  }
	
	echo '</tr></div>';	

//用户发出的申请
echo '<div class="ta"><tr>';
	     
	if($num_selflysq){
	for($i=1;$i<=$num_lysq;$i++)  {
	        echo '<td><p class="tp">你的宠物领养得到了批准</td><br/>';
			echo '<td> 
			   <form action="user_aftercheck.php" method="post">
					  <div class="submit-btn">							
									<input style="float:right" type="submit" value="点击这里了解并联系宠物的原主人吧！">
									<input type="hidden" name="zruser_id" value="'. $row_selflysq_user['USER_ID'].'">							
							</div>
					</form>
					</td><br/>';
	}
	}
	else{
	echo '宠物领养申请并没有应答<br/>';
  }
	echo '</tr></div>';	


echo '<div class="ta"><tr>';
	     
	if($num_selfpzsq){
	for($i=1;$i<=$num_selfpzsq;$i++){
	        echo '<td><p class="tp">你的宠物配种申请得到了批准</td><br/>';
			echo '<td> 
			   <form action="user_aftercheck.php" method="post">
					  <div class="submit-btn">							
									<input style="float:right" type="submit" value="点击这里了解并联系宠物的主人吧！">
									<input type="hidden" name="zruser_id" value="'. $row_selfpzsq_user['USER_ID'].'">							
							</div>
					</form>
					</td><br/>';
	}}
	else{
	echo '宠物配种申请并没有应答<br/>';
  }
	echo '</tr></div>';	



?>