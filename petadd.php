<?php
   include("db_conn.php");
   session_start();
   header("Content-Type:text/html;charset=utf-8");
    // SQL 语句
    $pet_name = $_POST["pet_name"];                    //add
    $pet_breed = $_POST["pet_breed"];  
	$pet_sex = $_POST["pet_sex"]; 
	$pet_birth = $_POST["pet_birth"]; 
	$pet_description = $_POST["pet_description"]; 
    $pet_pic = "images/showimages/" . $_POST["pet_pic"];   

$sqln= "SELECT PET_ID FROM PET";
$resultn = mysql_query($sqln);
$pet_id = mysql_num_rows($resultn) + 1;

	
if(isset($_SESSION['user_mail'])){
	$SQLStr="select * from user where MAIL='".$_SESSION['user_mail']."'";
	$res =mysql_query($SQLStr);
	$row=mysql_fetch_array($res);
	$user_id=$row["USER_ID"];
	 
   $sql="insert into pet(PET_ID,PET_NAME,USER_ID,PET_BIRTH,PET_SEX,PET_BREED,PET_DESCRIPTION,PET_PIC) values('$pet_id','$pet_name','".$row['USER_ID']."','$pet_birth','$pet_sex','$pet_breed','$pet_description','$pet_pic')";
   mysql_query($sql);
   echo '<script>alert("宠物添加成功")
	 onclick=location.href="personal_htm.php"
	</script>';
    
	}
	else {
	 echo '<script>alert("宠物添加失败")
	 onclick=location.href="personal_htm.php"
	</script>';
	}
?>
