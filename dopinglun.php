<?php
include('connect.php');
header("Content-Type: text/html; charset=utf8");
$id = $_GET['id'];  
session_start();
$userid = $_SESSION['userid'];
$neirong = $_REQUEST["pinglunneirong"]; 
$sql_insert = "insert into pinglun (titleid,pinglunneirong,userid) values($id,'$neirong','$userid')"; 
if(mysqli_query($conn,$sql_insert)){  
    echo "<script>setTimeout(function(){window.location.href='./showluntan.php?id=$id';},600)</script>";
}  
else{  
    echo "<script>alert('系统繁忙，请稍候！'); history.go(-1);</script>";  
}  
mysqli_close($conn);
?>