<?php
include("db_conn.php");
include("db_func.php");
header("Content-type: text/html; charset=utf-8"); 
session_start();

//
$sql = "SELECT PZ_ID FROM PZ_INFO ORDER BY PZ_ID DESC";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);


//
$sql1 = "SELECT USER_ID FROM USER WHERE MAIL= '".$_SESSION['user_mail']."'";
$result1 = mysql_query($sql1);
$row1 = mysql_fetch_array($result1);


//
$PZ_ID = $row["PZ_ID"] + 1;
$USER_ID = $row1["USER_ID"];
$PET_ID = $_POST["pet"];
$PZ_STARTTIME = date("Y/m/d H:i:s");
$PZ_ENDTIME = $_POST["endtime"];
$PZ_REQUEST = $_POST["message"];
$ADDRESS = $_POST["addr"];

$stmt ="INSERT INTO PZ_INFO (PZ_ID, USER_ID, PET_ID, PZ_STARTTIME, PZ_ENDTIME, PZ_REQUEST, ADDRESS)
		VALUES('$PZ_ID', '$USER_ID', '$PET_ID', '$PZ_STARTTIME', '$PZ_ENDTIME', '$PZ_REQUEST', '$ADDRESS')";
mysql_query($stmt);
header("Location:http://localhost/html/breeding.php"); 
exit();
?>