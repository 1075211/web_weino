<?php
header("content-type:text/html,charset='utf8'");
$id = $_POST['id'];
$u1 = $_POST['u1'];
$c1 = $_POST['c1'];
$m1 = $_POST['m1'];
$e1 = $_POST['e1'];

$link=mysqli_connect("localhost","root","");
if(!$link){
    echo "服务器忙，请重试";
    exit;
}
mysqli_set_charset($link,"utf8");
mysqli_select_db($link,"weiBo");
$sql = "UPDATE passage SET passageTitle={$u1} ,passageWord={$c1},pressNum={$m1},likeNum={$e1} where passageId={$id}";
$res=mysqli_query($link,$sql);
if($res){
    echo "success";
}else{
    echo "error";
};
mysqli_close($link);
 
?>
