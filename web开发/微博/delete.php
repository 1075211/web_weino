<?php
header('content-type:text/html,charset="utf8"');
$id=$_POST['id'];
$link=mysqli_connect("localhost","root","");
if(!$link){
    echo "服务器忙，请重试";
    exit;
};
mysqli_set_charset($link,"utf8");
mysqli_select_db($link,"weiBo");
$sql="delete from passage where passageId={$id}";
$res =  mysqli_query($link,$sql);
if($res){
    echo "success";
}else{
    echo "error";
};
mysqli_close($link);
?>