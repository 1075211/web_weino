<?php
if(isset($_POST['submit'])){
	$flag=1;
    $preg_phone='/^1[345789]\d{9}$/ims';
    if($_POST['upFile']==''){
	    $cuimg="<p class='red'>请上传头像！</p>";
		$flag=0;
	}
	if($_POST['name']==''){
		$cuname="<p class='red'>用户名不能为空！</p>";
		$flag=0;
	}else if(strlen($_POST['name'])<4||strlen($_POST['name'])>12){
	    $cuname="<p class='red'>用户名长度为4-12个字符！</p>";
		$flag=0;
	}
	if($_POST['pass']==''){
		$cupass="<p class='red'>密码不能为空！</p>";
		$flag=0;
	}else if($_POST['pass']!=$_POST['conpass']){
		$cucpass="<p class='red'>两次输入密码不一致！</p>";
	    $flag=0;
		}
        if($_POST['phone']==''){
           $cuphone="<p class='red'>手机号不能为空！</p>";
            $flag=0;
       }else if(!preg_match($preg_phone,$_POST['phone']) ){
            $cuphone="<p class='red'>格式不正确!</p>";
            $flag=0;
        }
	if($flag){
		$name=$_POST['name'];
		$pass=$_POST['pass'];
        $phone=$_POST['phone'];
        $a=$_POST['type'];
        $fileInfo = $_FILES["upFile"];
// 获取上传文件的名称
$fileName = $fileInfo["name"];
// 获取上传文件保存的临时路径
$filePath = $fileInfo["tmp_name"];
// 移动文件
move_uploaded_file($filePath, $_SERVER['DOCUMENT_ROOT']."/upFile/".$fileName);
		$conn=new mysqli();
$conn->connect('localhost','root','');
$conn->select_db('weiBo');
$conn->set_charset("utf8");
$conn->query("insert into myuser (type,picture,username, password,phone) VALUES ('$a','/upFile/$fileName','$name','".md5($pass)."','$phone')");
if($conn->errno){
echo $conn->error;
}
echo "<p>注册成功,请登陆</p>";
header("location:login.html"); 
}
}
if(!isset($flag)||$flag==0){
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
		<title>微博注册</title>
    </head>
   <style>
    body{
        background-image: linear-gradient(to right, rgba(200, 200, 200, .7),rgba(222, 119, 119, 0.7));
    }
    
 .red {
          color: red;
          size: 2px;
      }
     
  input#submit {
            border: none;
           background-color:#0087fe23;
            color: #fff;
            border-radius: 5px;
           padding: 7px 120px;
			margin-top:10px;
            cursor: pointer;
        }
    #one{
        width:100%;
        height: 130px;
        margin: 0 auto;
        display: flex; 
    }
    #container{
            width: 1100px;
            margin: 0 auto;
        }
        #left{
            width: 300px;
            height: 400px;
            float: left;
        }
            .text{
               list-style-type:disc;
               list-style-position:outside;
            }
           .text1{
             list-style-position:inside;
             list-style-type:none;
            }
        #right{
            width: 300px;
            height: 400px;
            
            float: left;
       }
    #two{
        width: 50;
        height: 30px;
        margin: 0 auto;
        display: flex; 
    }
    </style>
<body>
    <div id="one">
     <img src="images/wb.jpg" width="16%" />
    </div>
</br>
    <div id="container">
        <div id="left">
            <form action="" method="post" id="form">
			<div >
            <font color=#FFA500>*</font>
            <label for="file">上传头像</label> <input type="file" id="file" name="upFile">
            <?php if(isset($cuimg)) echo $cuimg; else echo "<p>请上传头像</p>";?>
			</div>
            <font color=#FFA500>*</font>
                <label for="name">用户名</label>
                <input type="text" id="name" name='name' value='<?php if(isset($flag)) echo $_POST['name'];?>' />
                <?php if(isset($cuname)) echo $cuname; else echo "<p>必填，长度为4~16个字符</p>";?>
            </div>
            <div>
           <label for="type">用户类别</label> 
		   <label><input type="radio" name="type" id="type" value="管理员">管理员</label>
		   <label><input type="radio" name="type" id="type" value="普通用户" checked="checked">普通用户</label>
	       </div>
            <div>
            <font color=#FFA500>*</font>
                <label for="password">密码</label>
                <input type="password" id="password" name='pass' value='<?php if(isset($flag)) echo $_POST['pass'];?>' />
                <?php if(isset($cupass)) echo $cupass; else echo "<p>请输入密码</p>";?>
            </div>
            <div>
            <font color=#FFA500>*</font>
                <label for="password_confirm">密码确认</label>
                <input type="password" id="password_confirm" name='conpass' value='<?php if(isset($flag)) echo $_POST['conpass'];?>' />
                <?php if(isset($cucpass)) echo $cucpass; else echo "<p>再次输入相同的密码</p>";?>
            </div>
            <div>
            <font color=#FFA500>*</font>
                <label for="phone">手机</label>
                <input type="text" id="phone" name='phone' value='<?php if(isset($flag)) echo $_POST['phone'];?>' />
                <?php if(isset($cuphone)) echo $cuphone; else echo "<p>必填</p>";?>
            </div>
            <input type="submit" id="submit" value="提交" name="submit" />
            </div>
        </form>
        </div>
        <div id="right">
        <p >已有帐号，<a href="/login.html">直接登录»</a></p>
        <p>微博注册帮助</p>
        <div >
        <ul >
        <li><a target="_blank" href="https://kefu.weibo.com/faqdetail?id=15955&cs_source=1001">注册微博账号的常见问题</a></li>
        <li><a target="_blank" href="https://kefu.weibo.com/faqdetail?id=13091&cs_source=1001">手机号/邮箱在注册微博时提示已被注册</a></li>
        <li><a target="_blank" href="https://kefu.weibo.com/faqdetail?id=20136&cs_source=1001">进行短信验证时没有收到验证码，该怎么办？</a></li>
        <li><a target="_blank" href="https://kefu.weibo.com/faqdetail?id=12699&cs_source=1001">注册提示频繁怎么办？</a></li>
        </ul>
        </div>
        </div>
    </div>
    <div id="two">
        <select id="changeLang" action-data="login=0">
			<option selected="selected" value="zh-cn">中文(简体)</option>
		    <option  value="zh-tw">中文(台湾)</option>
			<option  value="zh-hk">中文(香港)</option>
			<option  value="en-us">English</option>
		</select>
    </div>
</body> 
</html>
<?php } ?>

