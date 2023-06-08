<?php
header("Content-Type: text/html; charset=utf8");
session_start();
$userid = $_SESSION['userid'];
$pinglunid=$_GET['pinglunid'];
$id=$_GET['id'];
$zaihuifuid=$_GET['zaihuifuid'];
$huifuneirong=$_REQUEST['huifuneirong'];
include('connect.php');
$sql_insert = "insert into huifu(huifuneirong,userid,pinglunid,zaihuifuid) values('$huifuneirong',$userid,$pinglunid,$zaihuifuid)"; 
if(mysqli_query($conn,$sql_insert))   {  
    echo "<script>setTimeout(function(){window.location.href='./showluntan.php?id=$id';},600)</script>";
}  
else{  
    echo "<script>alert('系统繁忙，请稍候！'); history.go(-1);</script>";  
}  
mysqli_close($conn);
?>
