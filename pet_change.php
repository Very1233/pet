<?php
   include("db_conn.php");
   session_start();
   header("Content-Type:text/html;charset=utf-8");
    // SQL 语句
    $pet_name = $_POST['pet_name'];                    //add
    $pet_breed = $_POST['pet_breed'];  
	$pet_sex = $_POST['pet_sex']; 
	$pet_birth = $_POST['pet_birth']; 
	$pet_description = $_POST['pet_description']; 
    $pet_pic = "images/showimages/" . $_POST["pet_pic"];
	$pet_id=$_POST['changepet_htm_id']; //获取宠物ID

	
  $SQLStr="select * from user where MAIL='".$_SESSION['user_mail']."'";
	$res =mysql_query($SQLStr);
	$row=mysql_fetch_array($res);

	
   $sql="update pet set PET_NAME='$pet_name',PET_SEX='$pet_sex',PET_BREED='$pet_breed',PET_DESCRIPTION='$pet_description',PET_PIC='$pet_pic' where USER_ID='".$row['USER_ID']."' and PET_ID='$pet_id'";  
 
 
   mysql_query($sql);
   echo '<script>alert("宠物修改成功")
	 onclick=location.href="personal_htm.php"
	</script>';
    
	

?>
