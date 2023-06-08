<?php
header("Content-Type: text/html; charset=utf8");
include('connect.php');
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
        if ($username!=null && $password!=null){//如果用户名和密码都不为空
            $sql = "select * from user_tab where username = '$username' and password='$password' ";
            $result = mysqli_query($conn,$sql);
            $rows=mysqli_num_rows($result);
            if($rows){//0 false 1 true
                $fetch = mysqli_fetch_array($result);
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['userid'] = $fetch['id'];
                $_SESSION['query']="select * from luntan";
                header("Location: luntan.php");//如果成功跳转至luntan页面
                exit;
                $result->free();
            }
            else{
                //echo "用户名或密码错误";
                echo "<script>alert('用户名或密码错误！')</script>";
                echo "
                        <script>
                                setTimeout(function(){window.location.href='index.html';},1000);
                        </script>
                    ";//1秒后跳转到登录页面重试;
                    $result->free();
            }
        }
        else{
            echo "<script>alert('请输入账号密码')</script>";
            echo "
                        <script>
                                setTimeout(function(){window.location.href='index.html';},1000);
                        </script>
                    ";//1秒后跳转到登录页面重试;
        }
        mysqli_close($conn);
        //释放结果集
?>
