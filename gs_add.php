<?php
include("db_conn.php");
include("db_func.php");
header("Content-type: text/html; charset=utf-8"); 
session_start();

//
$sql = "SELECT GS_ID FROM GS_INFO ORDER BY GS_ID DESC";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);

//
$sql1 = "SELECT USER_ID FROM USER WHERE MAIL= '".$_SESSION['user_mail']."'";
$result1 = mysql_query($sql1);
$row1 = mysql_fetch_array($result1);


//
$GS_ID = $row["GS_ID"] + 1;
$USER_ID = $row1["USER_ID"];
$YLC_ID = $_POST["id"];

//
$stmt ="INSERT INTO GS_INFO (GS_ID, USER_ID, YLC_ID)
		VALUES('$GS_ID', '$USER_ID', '$YLC_ID')";

if (mysql_query($stmt) === FALSE) {
    header("Location:http://localhost/html/walk.php"); 
	exit();
}


//
$YLC_NUM = $_POST["num"] + 1;
$stmt1 = "UPDATE YLC_INFO SET YLC_NUM= $YLC_NUM WHERE YLC_ID= $YLC_ID";
mysql_query($stmt1);

header("Location:http://localhost/html/walk.php"); 
exit();
?>