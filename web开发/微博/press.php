<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title></title>
	</head>

	<style>
	     .show{
            display:block;
          }
          .hidden{
            display:none;
          }
          .before_press{
            background-color:grey;
            text-align:center;
            margin:0 auto;
            cursor:pointer;
          }
          .after_press{
            background-color:#555555;
            text-align:center;
            margin:0 auto;
            cursor:pointer;
          }
		.button{
			background-color:rgba(9, 43, 78, 0.424);
			color:white;
			width: 100%;
			height: 40px;
			border:0;
			font-size: 16px;
		}
		.w {
		        /* 宽为页面的60% */
		        width: 60%;
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
		        background-color: white;
		        height: 90%;
		    }
		.slider {
			        width: 15%;
			        height: 500px;
			        background-color: white;
			        /* 设置绝对定位，将侧边栏固定在页面上的右边区域 */
			        position: absolute;
			        /* 330像素正好将侧边栏与主体区域的顶部对齐 */
			        top: 300px;
			        left: 80%;
			    }
		.sliderLeft{
			width: 15%;
			height: 500px;
			background-color: white;
			/* 设置绝对定位，将侧边栏固定在页面上的右边区域 */
			position: absolute;
			/* 330像素正好将侧边栏与主体区域的顶部对齐 */
			top: 300px;
			left: 5%;
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
		.search-box {
					        font-family: FontAwesome;
					        position: absolute;
					        top: 23%;
					        left: 45%;
					        /* transform: translate(-50%, -50%); */
					        background-color: lightgray;
					        height: 40px;
					        border: 10px;
					        border-radius: 40px;
					        padding: 10px;/* 
					        opacity: 0;
					        transition-delay: 99999999s;
					        transition-duration: 1s; */
					    }
					
		.search-box:hover>.search-txt {
					        width: 240px;
					        padding: 0 6px;
					    }
		.search-box:hover>.search-btn {
					        color: white;
					        background: black;
					    }
					
		.search-btn {
					        transition: 0.5s;
					        font-family: FontAwesome;
					        font-size: 25px;
					        color: black;
					        float: right;
					        width: 40px;
					        height: 40px;	
					        border: 10px;
					        border-radius: 50%;
					        background: #ffffff;
					        display: flex;
					        justify-content: center;
					        align-items: center;
					        text-decoration: none;
					    }
		.search-txt {
					        border: none;
					        background: none;
					        outline: none;
					        float: left;
					        padding: 0;
					        color: rgb(51, 159, 150);
					        font-size: 16px;
					        transition: 0.6s;
					        line-height: 50px;
					        width: 0px;
					    }
	</style>
	<body bgcolor="#222222">
		<div>
			<div class="video">
				<video class="video" loop="loop" autoplay="autoplay" preload muted="muted" src="images/earth.mp4" poster="images/earth.mp4">
				</video>
			</div>
			<div class="weibo">新浪微博</div>
			<div class="search-box">
				<input class="search-txt" type='text' id='inp' placeholder="What are you looking for?"/>
				<input class="search-btn" type='button' id='btn' value='&#xf002' />
			</div>
		</div>
		
		<script>
			    var oInp = document.getElementById('inp');
			    var oBtn = document.getElementById('btn');
			
			    oBtn.onclick = function () {
			        Search();
			    }
			
			    document.onkeydown = function () {
			        if (event.keyCode == 13) {
			            Search();
			        }
			    }
			
			    function Search() {
			        var url = 'https://www.baidu.com/s?wd=' + oInp.value;
			        window.open(url);
			    }
			</script>
		
		<div class="header w">
			<ul class="nav">
				<li><a href="#">热门</a></li>
				<li><a href="#">世界杯</a></li>
				<li><a href="">同城</a></li>
				<li><a href="">抗疫</a></li>
				<li><a href="">明星</a></li>
				<li><a href="">情感</a></li>
				<li><a href="">搞笑</a></li>
				<li><a href="">社会</a></li>
				<li><a href="">美食</a></li>
				<li><a href="">财经</a></li>
			</ul>
			
		</div>
		<div class="main w" id="pa">
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
			   echo"
	              <script type='text/javascript'>
        	        function showCurrentMenu".$info['passageId']."(){
        	        var pinglun".$info['passageId']."=document.getElementById('pinglun".$info['passageId']."');
        	        var content".$info['passageId']."=document.getElementById('content".$info['passageId']."');
        		   if(pinglun".$info['passageId'].".getAttribute('class')=='before_press' || content".$info['passageId'].".getAttribute('class')=='hidden'){
        			 pinglun".$info['passageId'].".setAttribute('class','after_press');
        			 content".$info['passageId'].".setAttribute('class','show');
        		  }
        		  else if(pinglun".$info['passageId'].".getAttribute('class')=='after_press' || content".$info['passageId'].".getAttribute('class')=='show'){
        			 pinglun".$info['passageId'].".setAttribute('class','before_press');
        			 content".$info['passageId'].".setAttribute('class','hidden');
        		  }
        	       }
        	       
      function deletepress".$info['passageId']."(){
         var ownerpress".$info['passageId']."=document.getElementById('ownerpress".$info['passageId']."');
         //var ownerpress1=document.getElementById('ownerpress1');
         //ownerpress1.setAttribute('class','hidden');
         ownerpress".$info['passageId'].".setAttribute('class','hidden');
         if(window.XMLHttpRequest){
    	       xmlhttp=new XMLHttpRequest();
    	    }else if(window.ActiveXObject){
    		  xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
    	    }
    	    if(xmlhttp!=null){
    	       //alert('owernpress1');
     		  xmlhttp.onreadystatechange=state_Changediv".$info['passageId'].";
    		  String='passageId=".$info['passageId']."&passageWord=".$info['passageWord']."';  
    		  //alert(String);
    		  xmlhttp.open('POST','deletepress.php',true);
    		  xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    		  xmlhttp.send(String); 
    	    }else{
    		  alert('您的浏览器不支持 XMLHTTP.');
    	    }
      } 	
      function state_Changediv".$info['passageId']."(){
    	    if(xmlhttp.readyState==4&&xmlhttp.status==200){
    	        //document.getElementById('owernpress').innerHTML=xmlhttp.responseText;
    	    }
     }
                  </script>";
			   echo "<tr><td><img width=8% src='".$info['ownerimg']."'/>".$info['owner']."</td>";
		        echo "<td>".$info['date']."</td>";
                  echo "<td><input id='guanzhu".$info['passageId']. "' value='关注' type='button' class='button' onclick='ajaxRequest1".$info['passageId']."()'/>"."</td></tr>
                  <tr><td>".$info['passageWord']."</td>"."</tr>";
			   echo "<tr>"."<td>".$info['passageWord']."</td>"."</tr>";
			   echo "<tr><td><img width=40% src='".$info['passageImg']."'/>"."</td>"."</tr>";
			   echo "<tr>"."<td><input id='pinglun".$info['passageId']."' value='评论' type='button' onclick='showCurrentMenu".$info['passageId']."()' class='before_press'>
			   </td><td><input id='dianzan".$info['passageId']."'  value='点赞' type='button' class='button' onclick='ajaxRequest2".$info['passageId']."()'>"."</td></tr>";
			   echo "<tr><td>
			   <div class='hidden' id='content".$info['passageId']."'>
			     <div  style='background-color:#F5F5F5;'> 
			     <p><input id='presscontent".$info['passageId']."' type='text'style='width:400px;'><br><input type='button' value='评论' style='margin-top: 10px;' onclick='addPress".$info['passageId']."()'></p></div>";
			   $sql1="select * from press";
			   $result1=$mysqli->query($sql1);
			   $datanum1=$result1->num_rows;
                  echo"
                  <script>
                  function ajaxRequest2".$info['passageId']."(){
             //alert('100');
               if(window.XMLHttpRequest){
                  xmlhttp=new XMLHttpRequest();
               }else if(window.ActiveXObject){
                   xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
               }
               if(xmlhttp!=null){
                  var dianzan=document.getElementById('dianzan".$info['passageId']."').value;
                  xmlhttp.onreadystatechange=state_Changed".$info['passageId'].";
                  xmlhttp.open('POST','addLikeNum.php',true);
                 xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded;charset=UTF8');
                 xmlhttp.send('button='+dianzan+'&id=".$info['passageId']."');
                 //alert(dianzan);
                 
              }else{
                  alert('您的浏览器不支持XMLHTTP.');
               }
           
           }
           function ajaxRequest1".$info['passageId']."(){
               if(window.XMLHttpRequest){
                  xmlhttp=new XMLHttpRequest();
               }else if(window.ActiveXObject){
                   xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
               }
               if(xmlhttp!=null){
                   xmlhttp.onreadystatechange=state_Changed".$info['passageId'].";
                  xmlhttp.open('POST','addNumber.php',true);
                 xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;charset=UTF-8');
                 xmlhttp.send('button='+document.getElementById('guanzhu".$info['passageId']."').value+'&id=".$info['passageId']."');
              }else{
                  alert('您的浏览器不支持XMLHTTP.');
               }
           
           }
           function state_Changed".$info['passageId']."(){
               //alert(xmlhttp1.responseText);
               if(xmlhttp.readyState==4&&xmlhttp.status==200){
               //alert('100');
               //alert(xmlhttp.responseText);
                  if(xmlhttp.responseText=='1'){
                       document.getElementById('guanzhu".$info['passageId']."').value='取消关注';
                       document.getElementById('guanzhu".$info['passageId']."').style.background = 'rgba(247, 128, 17, 0.962)';
                   }
                   else if(xmlhttp.responseText=='2'){
                       document.getElementById('guanzhu".$info['passageId']."').value='关注';
                       document.getElementById('guanzhu".$info['passageId']."').style.background = 'rgba(9, 43, 78, 0.424)';
                   }
                   else if(xmlhttp.responseText=='3'){
                       document.getElementById('dianzan".$info['passageId']."').value='取消点赞';
                   document.getElementById('dianzan".$info['passageId']."').style.background = 'rgba(247, 128, 17, 0.962)';
                   }
                   else if(xmlhttp.responseText=='4'){
                   document.getElementById('dianzan".$info['passageId']."').value='点赞';
                   document.getElementById('dianzan".$info['passageId']."').style.background = 'rgba(9, 43, 78, 0.424)';
                   }
               }
              }
              
           </script>";
			   echo "
			   <script type='text/javascript'>
			   function addPress".$info['passageId']."(){
        	          if(window.XMLHttpRequest){
    		             xmlhttp=new XMLHttpRequest();
    	                }else if(window.ActiveXObject){
    		             xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
    	                }
    	                if(xmlhttp!=null){
    	                   var presscontent".$info['passageId']."=document.getElementById('presscontent".$info['passageId']."').value;
    		             xmlhttp.onreadystatechange=state_Change".$info['passageId'].";
    		             String='passageId=".$info['passageId']."&passageWord='+presscontent".$info['passageId'].";  
    		             //alert(String);
    		             xmlhttp.open('POST','addPress.php',true);
    		             xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    		             xmlhttp.send(String); 
    	               }else{
    		             alert('您的浏览器不支持 XMLHTTP.');
    	               }
        	       } 	
        	       function state_Change".$info['passageId']."(){
    	               if(xmlhttp.readyState==4&&xmlhttp.status==200){
    	               //alert('owernpress".$info['passageId']."');
    	                  document.getElementById('owernpressdiv".$info['passageId']."').innerHTML=xmlhttp.responseText;
    	               }
                  }
			  </script> ";
			   echo "
			   <b id='owernpressdiv".$info['passageId']."'></b>
			   ";
			   for($j=1;$j<=$datanum1;$j++){
			      $info1=$result1->fetch_assoc();
			      if($info['passageId']==$info1['passageId']){
			         echo "<div  style='background-color:#F5F5F5;'>";
			         echo "<img width=4% src='".$info1['ownerimg']."'/>".$info1['owner']."<br>";
			         echo "<p>".$info1['pressWord']."<br>";
			         echo "</div>";
			      }
			   }
			   echo "</div>
			   </tr></td>";
	              
			   }
			  echo "</table>";
			?>
		</div>
		<div class="slider">
		    <span>
				<br>
				<input type="button" class="button" onclick='window.open("signup.php")' value="注册">
			    <input type="button" class="button" onclick='window.open("login.html")' value="立即登录">
			    
				<div class="slider_center">
				<br>
                 微博热搜
				  <span class="anew">
					<a href="">立即刷新</a>
				  </span>
				  <div class="slider_center_part">
					 <?php
					 $conn=new mysqli('localhost','root','');
					 $conn->set_charset("utf8");
					 $conn->select_db('weiBo');     
					 $sql="select * from passage";
					 $result=$conn->query($sql);
					 $row=$result->fetch_assoc();
					 $datanum=$result->num_rows;
					 echo $conn->error;
					   $total=array(0);
						$id=array(0);
					   for($i=1;$i<=$datanum;$i++){
						   $id[$i]=$i;
						}
						for($i=1;$i<=$datanum;$i++){
						   $press=$row['pressNum'];
						   $like=$row['likeNum'];
						   $totalnum=$press+$like;
						   $total[$i]=$totalnum;
						   $row=$result->fetch_assoc();
						}
						$result->close();
						$result=$conn->query($sql);
						$datanum=$result->num_rows;
						$row=$result->fetch_assoc();
						for($i=1;$i<=$datanum;$i++){
						   $max=$i;
						   for($j=$i+1;$j<=$datanum;$j++){
							  if($total[$max]<$total[$j]){
								 $temp=$total[$max];
								 $total[$max]=$total[$j];
								 $total[$j]=$temp;
								 $tempid=$id[$max];
								 $id[$max]=$id[$j];
								 $id[$j]=$tempid;
							  }
						   }
						}
						for($j=1;$j<=$datanum;$j++){
						$result=$conn->query($sql);
						$datanum=$result->num_rows;
						$row=$result->fetch_assoc();
						for($i=1;$i<=$datanum;$i++){
						   $Id=$row['passageId'];
						   if($Id==$id[$j]){
							  $title=$row['passageTitle'];
							  echo "<a href=''>$title</a><br><br>";
						   }
						   $row=$result->fetch_assoc();
						}
						$result->close();
						}
					 ?>
				  </div>
				</div>
			</span>
		</div>
		<div class="sliderLeft">
		    <span class="span">
				<br>
				<a href="main.php">热门微博</a><br><br>
				<a href="hotlist.php">热门榜单</a><br><br>
				<a href="hot.php">热搜榜</a><br>	
			</span>
		</div>
		<script  type="text/javascript">
			let header = document.querySelector(".header");
			let slider = document.querySelector(".slider");
			let sliderL = document.querySelector(".sliderLeft");
			document.addEventListener("scroll", function () {
			            //（1）获取主体区域距离页面顶部的高度，等于头部区域的高度+banner区域的高度+3个margin-top的高度30
			        let mainHeight = header.scrollHeight  + 250;
			            //（2）当页面顶部的偏移量大于主体区域距离页面顶部的高度时，
			            //将侧边栏的高度固定在页面的顶部，不跟随页面的上下滑动而变化位置，显示返回顶部文字
			        if (window.pageYOffset > mainHeight) {
			            slider.style.position = "fixed";
			            slider.style.top = "0px";
			            slider.style.left = "80%";
						sliderL.style.position = "fixed";
						sliderL.style.top = "0px";
						sliderL.style.left = "5%";
			        } else {//当页面顶部偏移量小于主体区域距离页面顶部的高度时，侧边栏的位置在主体区域旁边
			            
			            slider.style.position = "absolute";
			            slider.style.left = "80%";
			            slider.style.top = mainHeight + "px";
						sliderL.style.position = "absolute";
						sliderL.style.left = "5%";
						sliderL.style.top = mainHeight + "px";
			        }
			    })
		</script>
	</body>
</html>
