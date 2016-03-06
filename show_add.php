<?php
include("db_conn.php");
include("db_func.php");
header("Content-type: text/html; charset=utf-8"); 
session_start();

//
$sql = "SELECT SC_ID FROM SC_INFO ORDER BY SC_ID DESC";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);


//
$sql1 = "SELECT USER_ID FROM USER WHERE MAIL= '".$_SESSION['user_mail']."'";
$result1 = mysql_query($sql1);
$row1 = mysql_fetch_array($result1);

//
$SC_ID = $row["SC_ID"] + 1;
$USER_ID = $row1["USER_ID"];
$SC_PIC = "images/showimages/" . $_POST["show_pic"];
$SC_TEXT = $_POST["message"];
$SC_TIME = date("Y/m/d H:i:s");


$stmt ="INSERT INTO SC_INFO (SC_ID, USER_ID, SC_PIC, SC_TEXT, SC_TIME, SC_NUM)
		VALUES('$SC_ID', '$USER_ID', '$SC_PIC','$SC_TEXT', '$SC_TIME','0')";
mysql_query($stmt);
header("Location:http://localhost/html/show.php"); 
exit();
?>