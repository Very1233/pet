<?php
include("db_conn.php");
include("db_func.php");
header("Content-type: text/html; charset=utf-8"); 
session_start();

//
$sql = "SELECT YLC_ID FROM YLC_INFO ORDER BY YLC_ID DESC";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);


//
$sql1 = "SELECT USER_ID FROM USER WHERE MAIL= '".$_SESSION['user_mail']."'";
$result1 = mysql_query($sql1);
$row1 = mysql_fetch_array($result1);

//
$YLC_ID = $row["YLC_ID"] + 1;
$USER_ID = $row1["USER_ID"];
$PET_NUM = $_POST["num"];
$YLC_DESCRIPTION = $_POST["message"];
$YLC_TIME = date("Y/m/d H:i:s");
$YLC_STARTDATE = $_POST["sdate"];
$YLC_STARTTIME = $_POST["stime"];
$YLC_ENDDATE = $_POST["edate"];
$YLC_ENDTIME = $_POST["etime"];
$ADDRESS =  $_POST["addr"];


$stmt ="INSERT INTO YLC_INFO(YLC_ID, USER_ID, PET_NUM, YLC_DESCRIPTION, YLC_TIME, YLC_STARTDATE, YLC_STARTTIME, YLC_ENDDATE, YLC_ENDTIME, ADDRESS)
		VALUES('$YLC_ID', '$USER_ID', '$PET_NUM', '$YLC_DESCRIPTION', '$YLC_TIME', '$YLC_STARTDATE', '$YLC_STARTTIME', '$YLC_ENDDATE', '$YLC_ENDTIME', '$ADDRESS')";
mysql_query($stmt);
header("Location:http://localhost/html/walk.php"); 
exit();
?>