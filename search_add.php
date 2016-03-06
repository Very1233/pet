<?php
include("db_conn.php");
include("db_func.php");
header("Content-type: text/html; charset=utf-8"); 
session_start();

//
$sql = "SELECT XC_ID FROM XC_INFO ORDER BY XC_ID DESC";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);

//
$sql1 = "SELECT USER_ID FROM USER WHERE MAIL= '".$_SESSION['user_mail']."'";
$result1 = db_query($sql1);
$row1 = db_fetch_array($result1);

//
$XC_ID = $row["XC_ID"] + 1;
$USER_ID = $row1["USER_ID"];
$XC_PIC = "images/searchimages/" . $_POST["search_pic"];
$XC_TEXT = $_POST["message"];
$XC_TIME = date("Y/m/d H:i:s");
$ADDRESS = $_POST["addr"];
$XC_LOSTTIME = $_POST["time"];


$stmt ="INSERT INTO XC_INFO (XC_ID, USER_ID, XC_PIC, XC_TEXT, XC_TIME, ADDRESS, XC_LOSTTIME)
		VALUES('$XC_ID', '$USER_ID', '$XC_PIC','$XC_TEXT', '$XC_TIME', '$ADDRESS', '$XC_LOSTTIME')";
db_query($stmt);
header("Location:http://localhost/html/search.php"); 
exit();
?>