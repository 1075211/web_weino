<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
	
		<title></title>
	</head>
	<style>
		.button{
			background-color:dodgerblue;
			color:white;
			width: 100%;
			height: 40px;
			border:0;
			font-size: 16px;
		}
		.w {
		        /* 宽为页面的60% */
		        width: 52%;
		        /* 让div在页面居中 */
		        margin: 0 auto;
		        /* 上边距设置为10像素 */
		        margin-top: 10px;
		    }
		.header {
		        background-color: white;
		        height: 50px;
		    }
		.main {
		        height: 1300px;
		    }
		.slider {
			        width: 15%;
			        height: 1000px;
			        background-color: lightgray;
			        /* 设置绝对定位，将侧边栏固定在页面上的右边区域 */
			        position: fixed;
			        /* 330像素正好将侧边栏与主体区域的顶部对齐 */
			        top: 10px;
			        left: 77%;
			    }
		.sliderLeft{
			width: 15%;
			height: 500px;
			background-color: lightgray;
			/* 设置绝对定位，将侧边栏固定在页面上的右边区域 */
			position: fixed;
			/* 330像素正好将侧边栏与主体区域的顶部对齐 */
			top: 10px;
			left: 8%;
		}
		.nav li{
			float: left;
			list-style: none;
			padding: 10px;
		}
		.nav li a{
			text-decoration: none;
			color:black;
		}
		.span a{
			padding: 10px;
			text-decoration: none;
			color:black;
		}
		.anew a{
			float: right;
			text-decoration: none;
			color:black;
			color: gray;
		}
		.video{
			width: 100%;
			margin: 0 auto;
			margin-top: 10px;
		}
		.weibo{
			width: 30%;
			margin: 0 auto;
			position: absolute;
			left: 45%;
			top:100px;
			font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
			font-size: 40px;
			color: lightgray;
		}
		.txt{
			color: gray;
		}
		.part{
			background-color: lightgray;
		}
		.button{
			background-color: rgba(255, 166, 0, 0.712);
			color:white;
			width: 20%;
			height: 40px;
			border:0;
			border-radius: 5px;
			font-size: 14px;
		}
	</style>
	<body bgcolor="#333333">
		<div class="main w">
			<form class="part" enctype="multipart/form-data" action="addpasswage.php" method="post">
			<div class="txt">有什么新鲜事想告诉大家？</div>
			<div>
				<label for="title">文章名</label> <input type="text" id="title" name="title" />
			</div>
			&nbsp;<textarea name="comment" id="content" cols="65" rows="10"></textarea>	
			<label for="file">上传图片</label> <input type="file" id="file" name="upFile">
				<input type="submit" name="" value="发布" class="button">
			</form>		
	<script>
		function check() {
			var isOK = true;
			var content = document.getElementById('content');
			var file = document.getElementById('file');
			if (content.value =="" &&file.value == "") {
				isOK = false;
			}
			if(document.getElementById('title')==""){
				isOK=false;
				alert("请填写文章标题");
			}
			if (!isOK) {
				alert("发布内容为空");
			} else {
				alert("添加成功!");
			}
			return isOK;
		}
    </script>
			<div class="part">
			<?php
			$mysqli = new mysqli();
		    $mysqli->connect("localhost", "root", "", "weiBo");
			$mysqli->set_charset("utf8");
			$sql="select * from passage";
			$result=$mysqli->query($sql);
			   $datanum=$result->num_rows;  
			   echo "<table>";
			  for($i=1;$i<=$datanum;$i++){
			   $info=$result->fetch_assoc();
			  echo "<tr><td><a href='customer.php?id=".$info['passageId']."'><img width=8% src='".$info['ownerimg']."'/></a>".$info['owner']."</td>";
		      echo "<td>".$info['date']."</td>";
			  echo "<td><input id='guanzhu' value='关注' type='button' onclick='ajaxRequest1(".$info['passageId'].")'/>"."</td>"."</tr>";
			  echo "<tr>"."<td>".$info['passageWord']."</td>"."</tr>";
		   echo "<tr><td><img width=40% src='".$info['passageImg']."'/>"."</td>"."</tr>";
		   echo "<tr>"."<td><a href='press.php?id=".$info['passageId']."'><input id='pinglun' value='评论' class='button' type='button'></a></td><td><input id='dianzan' value='点赞' type='button' onclick='ajaxRequest2(".$info['passageId'].")'".">"."</td>"."</tr>";
		   }
			  echo "</table>";
			?>
		</div>
		<script>
			function ajaxRequest1(a){
        if(window.XMLHttpRequest){
           xmlhttp=new XMLHttpRequest();
        }else if(window.ActiveXObject){
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        if(xmlhttp!=null){
            xmlhttp.onreadystatechange=state_Change;
           xmlhttp.open("POST",'addNumber.php',true);
          xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;charset=UTF-8'); 
          xmlhttp.send("button="+document.getElementById('guanzhu').value+"&id="+a);
       }else{
           alert("您的浏览器不支持XMLHTTP.");
        }
    
    }
	function ajaxRequest2(a){
        if(window.XMLHttpRequest){
           xmlhttp=new XMLHttpRequest();
        }else if(window.ActiveXObject){
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        if(xmlhttp!=null){
            xmlhttp.onreadystatechange=state_Change;
           xmlhttp.open("POST",'addLikeNum.php',true);
          xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;charset=UTF-8'); 
          xmlhttp.send("button="+document.getElementById('dianzan').value+"&id="+document.getElementById('type').b);
       }else{
           alert("您的浏览器不支持XMLHTTP.");
        }
    
    }
    function state_Change(){
        if(xmlhttp.readyState==4&&xmlhttp.status==200){
           if(xmlhttp.responseText=="1"){
                document.getElementById("guanzhu").value="取消关注";
				document.getElementById("guanzhu").style.background = "rgba(247, 128, 17, 0.962)";
            }
			else if(xmlhttp.responseText=="2"){
		    	document.getElementById("guanzhu").value="关注";
				document.getElementById("guanzhu").style.background = "rgba(9, 43, 78, 0.424)";
			}
			else if(xmlhttp.responseText=="3"){
				document.getElementById("dianzan").value="取消点赞";
			document.getElementById("dianzan").style.background = "rgba(247, 128, 17, 0.962)";
			}
            else if(xmlhttp.responseText=="4"){
			document.getElementById("dianzan").value="点赞";
			document.getElementById("dianzan").style.background = "rgba(9, 43, 78, 0.424)";
            }
            return false;
        }
       }
		</script>
		     </div>
		</div>
		<div class="slider">
		    <span >
				<br>
				<table align="center">
					<tr>
							<td colspan="3" align="center">
								<a href="customer.html">
									<img width="50%" src="/upFile/content2.png" alt="">
								</a>
							</td>
					</tr>
					<tr>
						<td colspan="3" align="center">
							lytt
						</td>
					</tr>
					<tr>
						<td align="center">2</td>
						<td align="center">5</td>
						<td align="center">3</td>
					</tr>
					<tr class="txt">
						<td align="center">关注</td>
						<td align="center">粉丝</td>
						<td align="center">微博</td>
					</tr>
				</table>
			</span>
		</div>
		<div class="sliderLeft">
		    <span class="span">
				<br>
			 <a href="main.php">首页</a><br><br>
				<a href="hot.php">热搜榜</a><br>
			</span>
		</div>
	</body>
</html>
