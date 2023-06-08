<?php
header("Content-Type: text/html; charset=utf8");
include('connect.php');
$id = $_GET['id'];
$huifuid=$_GET['huifuid'];
$sql ="delete from huifu where id=$huifuid "; //SQL语句
mysqli_query($conn,$sql);
$response1 = mysqli_query($conn, $sql);
if($response1){
    exit("<script>
    setTimeout(function(){window.location.href='./showluntan.php?id=$id';},600)
    </script>");
}
else{
    exit("<script>
        alert('删除失败');
        location.href='luntan.php';
    </script>");
}
mysqli_close($conn);
?>