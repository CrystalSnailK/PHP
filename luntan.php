<?php
header("Content-Type: text/html; charset=utf8");
include('connect.php');
session_start();
            if(!$_SESSION['userid']){
                echo "<script>alert('请先登录！')</script>";
                    header("Location: luntan.php");
            }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
    <link rel="stylesheet" href="css/luntan.css" type="text/css">
    <title>论坛首页</title>
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

<?php
header("Content-Type: text/html; charset=utf8");
include('connect.php');
if (isset($_POST["searchSubmit"])) {
    $search = $_POST["search"];
    $_SESSION['query']= "select * from luntan where title like '%$search%' ";
}
$query = $_SESSION['query']; 
$itemsOnOnePage = 10;   // 单页面内展示数量。
$results = mysqli_query($conn, $query);
$pages = ceil($results->num_rows / $itemsOnOnePage); // 页面总数。
if(isset($_POST["fenyeSubmit"])){
$page =$_POST["ye"];}
elseif(isset($_POST["shangyiyeSubmit"])){
    if($_POST["ye"]-1>0){
        $page =$_POST["ye"]-1;}
    else{
        $page =$_POST["ye"];}
}
elseif(isset($_POST["xiayiyeSubmit"])){
    if($_POST["ye"]+1<=$pages){
        $page =$_POST["ye"]+1;}
    else{
        $page =$_POST["ye"];}
}
else{
    $page =1;
}
$start = ($page - 1) * $itemsOnOnePage;
$results = mysqli_query($conn, $query . " limit $start , $itemsOnOnePage");
?>
<body>

    <div class="container">

        <form action="./luntan.php" method="post" class="parent">
            <input type="text" class="search" name="search" placeholder="搜索">
            <input type="submit" name="searchSubmit" value="查询" class="btn">
        </form>

        <div class="fenye">
            <form method="post" action="./luntan.php" name="fen">
                <div>一共<?php echo $pages;?>页</div>
                <div style="float:left ;">要跳转到第</div>
                <div><input class="fenye_box" type="text" name="ye" value='<?php echo $page; ?>'></div>
                <div style="float:left ;">页</div>
                <div> <input class="fenye_submit" type="submit" value="确定" name="fenyeSubmit"></div>
                <div><input class="shangyiye" type="submit" value="" name="shangyiyeSubmit"></div>
                <div> <input class="xiayiye" type="submit" value="" name="xiayiyeSubmit"></div>
            </form>
        </div>

        <div style="float:left ;margin-top: 100px;margin-left: 30px; ">
            <?php
            header("Content-Type: text/html; charset=utf8");
            echo "欢迎你！用户名为：" . $_SESSION['username'] . "的用户";
            $userid = $_SESSION['userid'];
            ?>
        </div>
        <div class="zhanshi">
            <table class=tbclass>
                <tr>
                    <th width='160px'>论坛主题</th>
                    <th width='160px'>论坛内容</th>
                    <th width='110px'>发表人</th>
                    <th> </th>
                    <th> </th>
                    <th> </th>
                </tr>
                <?php
                //將結果集轉換成php的數組 = mysqli_fetch_array($results)
                
                while($result=mysqli_fetch_array($results)) {
                    echo "<tr>";
                    $row_num = mysqli_num_rows($results);
                    // echo $row_num;
                    echo "<td align='center'  height='45px'>" . mb_substr($result['title'],  0,  24) . "</td>";
                    echo "<td align='center' height='45px'>" . mb_substr($result['neirong'],  0,  24) . "</td>";
                    $sqlname = "SELECT * from user_tab where id= '$result[userid]'"; //SQL语句
                    $resname = mysqli_query($conn, $sqlname);
                    $fetchname = mysqli_fetch_array($resname);
                    $name = $fetchname['username'];
                    echo "<td align='center' height='45px'>" . mb_substr($name,  0,  24) . "</td>";
                    echo "<td align='center' height='45px' > <a href=showluntan.php?id=$result[id]><div><input type='button' value='查看' class='xiugai_submit' /></div></a></td>";
                    if(!($result['userid']!=$_SESSION['userid'])){
                    echo "<td align='center' height='45px'><a href=update.php?id=$result[id]><div><input type='button' value='修改' class='xiugai_submit'  /></div></a></td>";
                    echo "<td align='center' height='45px'><a href=shanchu.php?id=$result[id]><div><input type='button' value='删除' class='shanchu_submit' /></div></a></td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
                mysqli_close($conn);
                ?>
        </div>
        <div> <a href="index.html?" ><input class='fasong_submit' type='submit' value='返回登录'  style="width: 100px;margin-top: 5%;margin-left:8%;"></a></div>
        <div><input type="button" value="发帖" class="luntan_submit" style="width: 100px;margin-top: 5%;margin-right:8%;"onclick='location.href=("xinjian.html")' /></div>
    </div>

</body>
</html>