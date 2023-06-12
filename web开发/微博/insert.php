<?php
header("content-type:text/html,charset='utf8'");
$u1 = $_POST['u1'];
$c1 = $_POST['c1'];
$m1 = $_POST['m1'];
$e1 = $_POST['e1'];
$link = mysqli_connect("localhost","root","");
if(!$link){
    echo "服务器忙，请稍后重试";
   exit;
};
mysqli_set_charset($link,"utf8");
mysqli_select_db($link,"weiBo");
$sql ="insert into passage (date,passageTitle,passageWord,pressNum,likeNum) values('{CURRENT_TIMESTAMP}','{$u1}','{$c1}','{$m1}','{$e1}')";
$res = mysqli_query($link,$sql);
if($res){
    echo "success";
}else{
    echo "error";
};

mysqli_close($link);
?>
