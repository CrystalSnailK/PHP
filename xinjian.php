 <?php
header("Content-Type: text/html; charset=utf8");
session_start();
include('connect.php');
    $title = $_REQUEST["title"];  
    $neirong = $_REQUEST["neirong"];  
    $userid = $_SESSION['userid'];
    if($title == "" || $neirong == "" )  {  
        echo "<script>alert('内容不能为空！'); history.go(-1);</script>";  
    }  
    else{ 
                $sql_insert4 = "insert into luntan (title,neirong,userid) values('$_POST[title]','$_POST[neirong]','$_SESSION[userid]')";  
                $res_insert4 = mysqli_query($conn,$sql_insert4);  
                if($res_insert4)  {  
                    echo "<script>setTimeout(function(){window.location.href='./luntan.php';},600)</script>";
                }  
                else{  
                    echo "<script>alert('系统繁忙，请稍候！'); history.go(-1);</script>";  
                }  
            } 
        mysqli_close($conn);
 ?> 