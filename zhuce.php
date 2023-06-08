<?php
header("Content-Type: text/html; charset=utf8");
include('connect.php');
	$user = $_REQUEST["username"];  
    $psw = $_REQUEST["password"];  
    $psw_confirm = $_REQUEST["confirm"];  
    if($user == "" || $psw == "" || $psw_confirm == "") {  
		echo "<script>alert('请确认信息完整性！'); history.go(-1);</script>";  
        return;
    }
    if($psw != $psw_confirm){
    	echo "<script>alert('密码不一致！'); history.go(-1);</script>";
    	return;
    } 
    		$sql = "select username from user_tab where username = '$_POST[username]'"; //SQL语句  
            $result = mysqli_query($conn,$sql);    //执行SQL语句  
            $num = mysqli_num_rows($result); //统计执行结果影响的行数  
            if($num)    //如果已经存在该用户  
            {
                echo "<script>alert('用户名已存在'); history.go(-1);</script>";  
            }  
            else    //不存在当前注册用户名称  
            {
                $sql_insert = "insert into user_tab (username,password) values('$_POST[username]','$_POST[password]')";  
                $res_insert = mysqli_query($conn,$sql_insert);  
                if($res_insert){  
                    echo "<script>alert('注册成功！'); setTimeout(function(){window.location.href='index.html';},600);</script>";//1秒后跳转到登录页面重试;
                }  
                else{  
                    echo "<script>alert('系统繁忙，请稍候！'); history.go(-1);</script>";  
                }  
            }  
    mysqli_close($conn);
?>