<?php
header("Content-Type: text/html; charset=utf8");
include('connect.php');
$id = $_GET['id'];
$sql ="delete from luntan where id=$id "; //SQL语句
mysqli_query($conn,$sql);
$response1 = mysqli_query($conn, $sql);
if($response1){
    exit("<script>
        alert('删除成功');
        location.href='luntan.php'
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
