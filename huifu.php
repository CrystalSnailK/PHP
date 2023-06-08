<?php
header("Content-Type: text/html; charset=utf8");
include('connect.php');
$pinglunid=$_GET['pinglunid'];
session_start();
$userid = $_SESSION['userid'];
$id=$_GET['id'];
$zaihuifuid=$_GET['zaihuifuid'];?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no"> -->
    <link rel="stylesheet" href="css/luntan.css" type="text/css">
    <title>回复</title>
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
<?php
echo "<div  class='huifu' style='padding-left: 20px;'> ";
if (isset($_POST["huifuSubmit"])){
    echo "<div>";
    echo"<form method='post' action='dohuifu.php?id=$id&pinglunid=$pinglunid&zaihuifuid=$zaihuifuid'> ";
    echo"<input class=pinglunneirong_box type=text name=huifuneirong placeholder='回复' required='required' style='width: 400px;margin-left:50px;'>
    <div><input class='fasong_submit' type='submit' value='回复'></div>
    </form>
    </div>";
}
echo "</div>";
?>
</body>
</html>