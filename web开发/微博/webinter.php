<?php
session_start();
function checkava(){
		$conn=new mysqli();
		$conn->connect('localhost','root','');
	    $conn->select_db('weiBo');
		$conn->set_charset("utf8");
	    $sql="select * from myuser where username='".$_POST["username"]."' and password='".md5($_POST["password"])."'";
	   $result=$conn->query($sql) or die($conn->error);
	if($result->num_rows>0)
    {
        if($_POST["zddl"]){
            if($_POST["type"]=="管理员"){
                $_SESSION['islogin'] = 0;
                //有效期设置为7天
                setcookie('islogin',0,time()+3600*24*7);
                echo "show.html";
            }
            if($_POST["type"]=="普通用户"){
                $_SESSION['islogin'] = 1;
              //有效期设置为7天
               setcookie('islogin',1,time()+3600*24*7);
                echo "afterLogin.php";
            }
        }else{
            if($_POST["type"]=="管理员"){
                echo "show.html";
            }
           if($_POST["type"]=="普通用户"){
                echo "afterLogin.php";
            } 
        } 
    }
    else{
        echo "用户名或密码错误";
    }
}
if (isset($_SESSION['islogin'])) {
    if($_SESSION['islogin']==1){
    echo "afterLogin.php";
    }else{
    echo "show.html";
    }
}else{
    checkava();
}
?>