<?php
include("db_conn.php");
include("db_func.php");
header("Content-type: text/html; charset=utf-8"); 
session_start();

//
$sql = "SELECT ZR_ID FROM ZR_INFO ORDER BY ZR_ID DESC";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);


//
$sql1 = "SELECT USER_ID FROM USER WHERE MAIL= '".$_SESSION['user_mail']."'";
$result1 = mysql_query($sql1);
$row1 = mysql_fetch_array($result1);


//
$ZR_ID = $row["ZR_ID"] + 1;
$USER_ID = $row1["USER_ID"];
$PET_PIC = "images/adoptimages/". $_POST["zr_pic"];
$ZR_STARTTIME = date("Y/m/d H:i:s");
$ZR_ENDTIME = $_POST["endtime"];
$ZR_REQUEST = $_POST["message"];
$ADDRESS = $_POST["addr"];


$stmt ="INSERT INTO ZR_INFO (ZR_ID, USER_ID, PET_PIC, ZR_STARTTIME, ZR_ENDTIME, ZR_REQUEST, ADDRESS)
		VALUES('$ZR_ID', '$USER_ID', '$PET_PIC', '$ZR_STARTTIME', '$ZR_ENDTIME', '$ZR_REQUEST', '$ADDRESS')";
mysql_query($stmt);
header("Location:http://localhost/html/adopt.php");
exit(); 
?>