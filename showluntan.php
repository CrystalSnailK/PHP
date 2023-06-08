<?php
header("Content-Type: text/html; charset=utf8");
include('connect.php');
$id = $_REQUEST['id'];
$sql = "SELECT * from luntan where id= '$id'"; //SQL语句
$response = mysqli_query($conn, $sql);
$fetch = mysqli_fetch_array($response);
$title = $fetch['title'];
$neirong = $fetch['neirong'];
session_start();
$userid = $_SESSION['userid'];
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no"> -->
    <link rel="stylesheet" href="css/luntan.css" type="text/css">
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
    <title>帖子内容</title>
</head>
<body>
<!-- 以下是显示论坛内容 -->
<div> <a href="luntan.php?" ><input class='fasong_submit' type='submit' value='返回主页'  style="width: 100px;margin-top: 0;margin-left:300px;"></a></div>
    <div class="xianshi_box">
        <div><label class="font_biaoti">标题</label></div>
        <div class="xianshibiaoti"> <?php echo $title ?> </div>

        <div><label class="font_neirong">内容</label></div>
        <div class="xianshineirong"> <?php echo $neirong ?> </div>
    </div>
    <form method='post' action="dopinglun.php?id=<?php echo $id; ?>">
        <input class='pinglunneirong_box' type='text' name='pinglunneirong' placeholder='欢迎评论~' required="required">
        <div><input class='fasong_submit' type='submit' value='评论'></div>
    </form>
<!-- 以下是评论区 -->
<div class="pinglunqu">
        <?php
        $sql_pinglun = "SELECT * from pinglun where titleid='$id' ";
        $response = mysqli_query($conn, $sql_pinglun);
        // 以下是输出论坛的评论
        while ($res = mysqli_fetch_array($response)) { //评论区
            echo "<div  class='pinglun'> ";
            $sql_uesr_tab = "select * from user_tab where id=$res[userid]";
            $res_user = mysqli_query($conn, $sql_uesr_tab);
            $fetch_user = mysqli_fetch_array($res_user);
            $zaihuifuid= $res['userid'];
            echo $fetch_user['username'] . "：";
            echo $res['pinglunneirong'];


            echo "<form method='post' action='huifu.php?pinglunid=$res[id]&id=$id&zaihuifuid=$res[userid]'> ";
            echo "<div><input type='submit' value='回复' name='huifuSubmit' class='shanchupinglun_submit' /></div>";
            echo "</form>";

            //判断是否有删除权限
            if(!($res['userid']!=$_SESSION['userid'])){
                echo "<div><a href=shanchupinglun.php?id=$id&pinglunid=$res[id]><input type='button' value='删除' class='shanchupinglun_submit' /></a></div>";
            }
            echo "</div>";
            $sql_huifu = "SELECT * from huifu where pinglunid=$res[id]";//在huifu表里找这条评论对应id相同的回复，选择出来
            $response_huifu = mysqli_query($conn, $sql_huifu);
                // 以下是输出评论对应的回复
                while ($res_huifu = mysqli_fetch_array($response_huifu)) { //评论下的回复区
                echo "<div  class='huifu'> ";
                $sql_uesr_tab = "SELECT * from user_tab where id=$res_huifu[userid]";
                $res_user = mysqli_query($conn, $sql_uesr_tab);
                $fetch_user = mysqli_fetch_array($res_user);
                echo $fetch_user['username'] . "：";
                echo $res_huifu['huifuneirong'];//输出回复内容
                $sql_uesr_tab2 = "SELECT * from user_tab where id=$res_huifu[zaihuifuid]"; //回复评论  或  回复评论的回复
                $res_user2 = mysqli_query($conn, $sql_uesr_tab2);
                $fetch_user2 = mysqli_fetch_array($res_user2);
                echo "    @" .$fetch_user2['username'];//输出回复了谁
                // 以下是回复按

    //             echo "<div>";
    //             echo "<a href='javascript:;'><input type='submit' value='回复' name='huifuSubmit'  id='re' class='shanchupinglun_submit' style='margin-top:10px;'/></a>";
                
    // echo "<div  class='huifu' style='padding-left: 0;'style='display: none;' id='reply'> ";
    // echo "<div>";
    // echo"<form method='post' action='dohuifu.php?pinglunid=$res[id]&zaihuifuid=$res_huifu[userid]&id=$id'>";
    // echo"<input class=pinglunneirong_box type=text name=huifuneirong placeholder='回复' required='required' style='width: 400px;margin-left:50px;'>
    // <div><input class='fasong_submit' type='submit' value='发送'></div>
    // </form>
    // </div>";
    // echo "</div>";


    //             echo "</div>";


                echo "<form method='post' action='huifu.php?pinglunid=$res[id]&zaihuifuid=$res_huifu[userid]&id=$id'> ";
                echo "<div><input type='submit' value='回复' name='huifuSubmit' class='shanchupinglun_submit' style='margin-top:10px;'/></div>";
                echo "</form>";
                if(!($res_huifu['userid']!=$_SESSION['userid'])){
                    echo "<div><a href=shanchuhuifu.php?id=$id&huifuid=$res_huifu[id]><input type='button' value='删除' class='shanchupinglun_submit' style='margin-top:10px ;'/></a></div>";
                }
                echo "</div>";
                }
        }
        ?>
    </div>

    <?php mysqli_close($conn); ?>

</body>
<!-- <script type="text/javascript">
     $(function(){
            //页面加载完毕后开始执行的事件
            $("#re").click(function(){
                $(".reply_textarea").remove();
                $(this).parent().append("<div class='reply_textarea'><textarea name='' cols='40' rows='5'></textarea><br/><input type='submit' value='发表' /></div>");
            });
        });
</script> -->

</html>