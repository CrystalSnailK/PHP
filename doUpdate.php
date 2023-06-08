<?php
header("Content-Type: text/html; charset=utf8");
include('connect.php');
$title = $_REQUEST['title'];  
$neirong = $_REQUEST['neirong'];  
$id = $_GET['id'];
    $sql1="update luntan set title= '"."$title' where id = $id";
    $sql2="update luntan set neirong= '"."$neirong' where id = $id";
    $result1= mysqli_query($conn,$sql1);
    $result2= mysqli_query($conn,$sql2);
    if($result1 && $result2){
        exit("<script>
            alert('修改成功');
            location.href='luntan.php'
        </script>");
    }
    else{
        exit("<script>
            alert('修改失败');
            location.href='luntan.php';
        </script>");
    }
    mysqli_close($conn);
?>