<?php
include("db_conn.php");
include("db_func.php");
header("Content-type: text/html; charset=utf-8"); 
session_start();

//
$sql = "SELECT LYSQ_ID FROM LYSQ_INFO ORDER BY LYSQ_ID DESC";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);


//
$sql1 = "SELECT USER_ID FROM USER WHERE MAIL= '".$_SESSION['user_mail']."'";
$result1 = mysql_query($sql1);
$row1 = mysql_fetch_array($result1);


//
$LYSQ_ID = $row["LYSQ_ID"] + 1;
$ZR_ID = $_POST["ly"];
$USER_ID = $row1["USER_ID"];
$LYSQ_TIME = date("Y/m/d H:i:s");
$LYSQ_DESCRIPTION = $_POST["message"];
$ADDRESS = $_POST["addr"];

$stmt ="INSERT INTO LYSQ_INFO (LYSQ_ID, ZR_ID, USER_ID, LYSQ_TIME, LYSQ_DESCRIPTION, ADDRESS)
		VALUES('$LYSQ_ID', '$ZR_ID', '$USER_ID', '$LYSQ_TIME', '$LYSQ_DESCRIPTION', '$ADDRESS')";
mysql_query($stmt);
header("Location:http://localhost/html/adopt.php"); 
exit();
?>