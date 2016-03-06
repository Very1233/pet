<?php
include("db_conn.php");
include("db_func.php");
header("Content-type: text/html; charset=utf-8"); 
session_start();

//
$sql = "SELECT DZ_ID FROM DZ_INFO ORDER BY DZ_ID DESC";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);

//
$sql1 = "SELECT USER_ID FROM USER WHERE MAIL= '".$_SESSION['user_mail']."'";
$result1 = mysql_query($sql1);
$row1 = mysql_fetch_array($result1);


//
$DZ_ID = $row["DZ_ID"] + 1;
$USER_ID = $row1["USER_ID"];
$SC_ID = $_POST["id"];

//
$stmt ="INSERT INTO DZ_INFO (DZ_ID, USER_ID, SC_ID)
		VALUES('$DZ_ID', '$USER_ID', '$SC_ID')";

if (mysql_query($stmt) === FALSE) {
    header("Location:http://localhost/html/show.php"); 
	exit();
}


//
$SC_NUM = $_POST["num"] + 1;
$stmt1 = "UPDATE SC_INFO SET SC_NUM= $SC_NUM WHERE SC_ID= $SC_ID";
mysql_query($stmt1);

header("Location:http://localhost/html/show.php"); 
exit();
?>