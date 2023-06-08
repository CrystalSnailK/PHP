<?php
header("Content-Type: text/html; charset=utf8");
include('connect.php');
$id = $_GET['id'];
$sql ="select * from luntan where id= $id"; //SQL语句
$response = mysqli_query($conn, $sql);
$fetch = mysqli_fetch_array($response);
$title=$fetch['title'];
$neirong=$fetch['neirong'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no"> -->
    <link rel="stylesheet" href="css/luntan.css" type="text/css">
    <title>修改帖子</title>
    <style>
    * {
        margin: 0;
        padding: 0;
    }
    html {
        height: 100%;
    }
    body {
        height: 100%;
        background-image: linear-gradient(to right, #fbc2eb, #a6c1ee);
    }
    .container {
        height: 100%;
        /* background-image: linear-gradient(to right, #fbc2eb, #a6c1ee); */
    }
    </style>

</head>
<body>
<div class="xinjian_box">
<form method="post" action="doUpdate.php?id=<?php echo $id ?>">
<h3 class="login_font1">修改帖子</h3>
        <div><label class="login_font_user">标题</label></div>
        <input class="xinjian_title_box" type="text" name="title" value="<?php echo $title ?>">
        <div><label class="login_font_pwd">内容</label></div>
        <input class="xinjian_neirong_box" type="text" name="neirong" value="<?php echo $neirong ?>">
        <div><input class="xinjian_submit" type="submit" value="确定"></div>   
</form>
</div>
</body>
</html>
