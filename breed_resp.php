<?php
include("db_conn.php");
include("db_func.php");
header("Content-type: text/html; charset=utf-8"); 
session_start();

//
$sql = "SELECT PZSQ_ID FROM PZSQ_INFO ORDER BY PZSQ_ID DESC";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);


//
$sql1 = "SELECT USER_ID FROM USER WHERE MAIL= '".$_SESSION['user_mail']."'";
$result1 = mysql_query($sql1);
$row1 = mysql_fetch_array($result1);


//
$PZSQ_ID = $row["PZSQ_ID"] + 1;
$PZ_ID = $_POST["pz"];
$USER_ID = $row1["USER_ID"];
$PET_ID = $_POST["pet"];
$PZSQ_TIME = date("Y/m/d H:i:s");
$PZSQ_DESCRIPTION = $_POST["message"];
$ADDRESS = $_POST["addr"];

$stmt ="INSERT INTO PZSQ_INFO (PZSQ_ID, PZ_ID, USER_ID, PET_ID, PZSQ_TIME, PZSQ_DESCRIPTION, ADDRESS)
		VALUES('$PZSQ_ID', '$PZ_ID', '$USER_ID', '$PET_ID', '$PZSQ_TIME', '$PZSQ_DESCRIPTION', '$ADDRESS')";
mysql_query($stmt);
header("Location:http://localhost/html/breeding.php"); 
exit();
?>