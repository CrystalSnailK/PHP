<?php
header("Content-Type: text/html; charset=utf8");
    $server="localhost";
    $db_username="root";
    $db_password="root";
    $dbname="forum_db_103";
    $conn=mysqli_connect($server,$db_username,$db_password,$dbname) or die("连接失败: " . $conn->connect_error);
    mysqli_query($conn, "set names utf8");
?>