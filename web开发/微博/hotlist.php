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
          .header-c h5{
            float:left;
            font-size:20px;
            height:30px;
            width:22.73%;
            background-color:#555555;
            text-align:center;
            color:#ffffff;
            margin:0 auto;
            text-align:center;
            cursor:pointer;
		  padding: 10px;
	       margin-left:100 px;
         }
         .header h5{
            height:30px;
            width:22.5%;
            text-align:center;
            font-size:20px;
            float:left;
            background-color:grey;
            text-align:center;
            margin:0 auto;
            cursor:pointer;
            padding: 10px;
	       margin-left:100 px;
         }
         .content{
            clear:left;
            width:99%;
         }
         .content p{
            padding:20px 5px 20px 5px;
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
		        clear:left;
		    }
		.headertop {
		        background-color: white;
		        height: 50px;
		        margin: 0 auto;
		        margin-left:30%px;
		    }
		.main {
		        background-color: white;
		        height: 90%px;
		    }
		.slider {
			        width: 15%;
			        height: 500px;
			        background-color: white;
			        position: fixed;
			        top: 15px;
			        left: 80%;
			    }
		.sliderLeft{
			width: 15%;
			height: 500px;
			background-color: white;
			position:fixed;
			top:15px;
			left: 5%;
		}
		.nav li{
			float: left;
			list-style: none;
			padding: 10px;
			margin-left:100 px;
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

	</style>
	
	<body bgcolor="#222222">				
		<div class="headertop w">
			<div class="nav" id="title">
			<div class="header-c"><h5>全部</h5></div>
				<div class="header"><h5>昨日</h5></div>
				<div class="header"><h5>前日</h5></div>
				<div class="header"><h5>周榜</h5></div>			
			</div>
			
		</div>
		<div class="main w" id="pa">
		<div class="show" id="content1">
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
        	       
        	       function addPress".$info['passageId']."(){
        	          if(window.XMLHttpRequest){
    		             xmlhttp=new XMLHttpRequest();
    	                }else if(window.ActiveXObject){
    		             xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
    	                }
    	                if(xmlhttp!=null){
    		             xmlhttp.onreadystatechange=state_Change;
    		             //String=document.getElementsByTagName('input')[0].attributes.name.value+'='+document.getElementsByTagName('input')[0].value;
    		             //xmlhttp.open('POST','UserNameVerification.php',true);
    		             xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    		             xmlhttp.send(); 
    	               }else{
    		             alert('您的浏览器不支持 XMLHTTP.');
    	               }
        	       }
        	        	
                  </script>";
			   echo "<tr><td><img width=8% src='".$info['ownerimg']."'/>".$info['owner']."</td>";
		        echo "<td>".$info['date']."</td>";
			   echo "<td><input id='guanzhu' value='关注' type='button' onclick='"."addNumber.php?passageId=".$info['passageId']."'/>"."</td>"."</tr>";
			   echo "<tr>"."<td>".$info['passageWord']."</td>"."</tr>";
			   echo "<tr><td><img width=40% src='".$info['passageImg']."'/>"."</td>"."</tr>";
			   echo "<tr>"."<td><input id='pinglun".$info['passageId']."' value='评论' type='button' onclick='showCurrentMenu".$info['passageId']."()' class='before_press'>
			   </td><td><input id='dianzan' value="."点赞"." type="."button"." onclick='fun2()'".">"."</td>"."</tr>";
			   echo "<tr><td>
			   <div class='hidden' id='content".$info['passageId']."'>
			     <div  style='background-color:#F5F5F5;'> 
			     <p><input type='text'style='width:400px;'><br><input type='button' value='评论' style='margin-top: 10px;' onclick='addPress".$info['passageId']."()'></p></div>";
			   $sql1="select * from press";
			   $result1=$mysqli->query($sql1);
			   $datanum1=$result1->num_rows;
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
			  $result->close();
			  $result=$mysqli->query($sql);
			  $datanum=$result->num_rows;
			?>
		</div>
		<div class="hidden" id="content2">
		   <?php
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
        	       
        	       function addPress".$info['passageId']."(){
        	          if(window.XMLHttpRequest){
    		             xmlhttp=new XMLHttpRequest();
    	                }else if(window.ActiveXObject){
    		             xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
    	                }
    	                if(xmlhttp!=null){
    		             xmlhttp.onreadystatechange=state_Change;
    		             //String=document.getElementsByTagName('input')[0].attributes.name.value+'='+document.getElementsByTagName('input')[0].value;
    		             //xmlhttp.open('POST','UserNameVerification.php',true);
    		             xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    		             xmlhttp.send(); 
    	               }else{
    		             alert('您的浏览器不支持 XMLHTTP.');
    	               }
        	       }
        	        	
                  </script>";
                  if($info['date']=='2022-12-28'){
			   echo "<tr><td><img width=8% src='".$info['ownerimg']."'/>".$info['owner']."</td>";
		        echo "<td>".$info['date']."</td>";
			   echo "<td><input id='guanzhu' value='关注' type='button' onclick='"."addNumber.php?passageId=".$info['passageId']."'/>"."</td>"."</tr>";
			   echo "<tr>"."<td>".$info['passageWord']."</td>"."</tr>";
			   echo "<tr><td><img width=40% src='".$info['passageImg']."'/>"."</td>"."</tr>";
			   echo "<tr>"."<td><input id='pinglun".$info['passageId']."' value='评论' type='button' onclick='showCurrentMenu".$info['passageId']."()' class='before_press'>
			   </td><td><input id='dianzan' value="."点赞"." type="."button"." onclick='fun2()'".">"."</td>"."</tr>";
			   echo "<tr><td>
			   <div class='hidden' id='content".$info['passageId']."'>
			     <div  style='background-color:#F5F5F5;'> 
			     <p><input type='text'style='width:400px;'><br><input type='button' value='评论' style='margin-top: 10px;' onclick='addPress".$info['passageId']."()'></p></div>";
			   $sql1="select * from press";
			   $result1=$mysqli->query($sql1);
			   $datanum1=$result1->num_rows;
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
	              
			   }
			  echo "</table>";
			  $result->close();
			  $result=$mysqli->query($sql);
			  $datanum=$result->num_rows;
			?>
		</div>
		<div class="hidden" id="content3">
		   <?php
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
        	       
        	       function addPress".$info['passageId']."(){
        	          if(window.XMLHttpRequest){
    		             xmlhttp=new XMLHttpRequest();
    	                }else if(window.ActiveXObject){
    		             xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
    	                }
    	                if(xmlhttp!=null){
    		             xmlhttp.onreadystatechange=state_Change;
    		             //String=document.getElementsByTagName('input')[0].attributes.name.value+'='+document.getElementsByTagName('input')[0].value;
    		             //xmlhttp.open('POST','UserNameVerification.php',true);
    		             xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    		             xmlhttp.send(); 
    	               }else{
    		             alert('您的浏览器不支持 XMLHTTP.');
    	               }
        	       }
        	        	
                  </script>";
                  if($info['date']=='2022-12-27'){
			   echo "<tr><td><img width=8% src='".$info['ownerimg']."'/>".$info['owner']."</td>";
		        echo "<td>".$info['date']."</td>";
			   echo "<td><input id='guanzhu' value='关注' type='button' onclick='"."addNumber.php?passageId=".$info['passageId']."'/>"."</td>"."</tr>";
			   echo "<tr>"."<td>".$info['passageWord']."</td>"."</tr>";
			   echo "<tr><td><img width=40% src='".$info['passageImg']."'/>"."</td>"."</tr>";
			   echo "<tr>"."<td><input id='pinglun".$info['passageId']."' value='评论' type='button' onclick='showCurrentMenu".$info['passageId']."()' class='before_press'>
			   </td><td><input id='dianzan' value="."点赞"." type="."button"." onclick='fun2()'".">"."</td>"."</tr>";
			   echo "<tr><td>
			   <div class='hidden' id='content".$info['passageId']."'>
			     <div  style='background-color:#F5F5F5;'> 
			     <p><input type='text'style='width:400px;'><br><input type='button' value='评论' style='margin-top: 10px;' onclick='addPress".$info['passageId']."()'></p></div>";
			   $sql1="select * from press";
			   $result1=$mysqli->query($sql1);
			   $datanum1=$result1->num_rows;
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
	              
			   }
			  echo "</table>";
			  $result->close();
			  $result=$mysqli->query($sql);
			  $datanum=$result->num_rows;
			?>
		</div>
		<div class="hidden" id="content4">
		   <?php
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
        	       
        	       function addPress".$info['passageId']."(){
        	          if(window.XMLHttpRequest){
    		             xmlhttp=new XMLHttpRequest();
    	                }else if(window.ActiveXObject){
    		             xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
    	                }
    	                if(xmlhttp!=null){
    		             xmlhttp.onreadystatechange=state_Change;
    		             //String=document.getElementsByTagName('input')[0].attributes.name.value+'='+document.getElementsByTagName('input')[0].value;
    		             //xmlhttp.open('POST','UserNameVerification.php',true);
    		             xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    		             xmlhttp.send(); 
    	               }else{
    		             alert('您的浏览器不支持 XMLHTTP.');
    	               }
        	       }
        	        	
                  </script>";
                  if($info['date']>'2022-12-22'){
			   echo "<tr><td><img width=8% src='".$info['ownerimg']."'/>".$info['owner']."</td>";
		        echo "<td>".$info['date']."</td>";
			   echo "<td><input id='guanzhu' value='关注' type='button' onclick='"."addNumber.php?passageId=".$info['passageId']."'/>"."</td>"."</tr>";
			   echo "<tr>"."<td>".$info['passageWord']."</td>"."</tr>";
			   echo "<tr><td><img width=40% src='".$info['passageImg']."'/>"."</td>"."</tr>";
			   echo "<tr>"."<td><input id='pinglun".$info['passageId']."' value='评论' type='button' onclick='showCurrentMenu".$info['passageId']."()' class='before_press'>
			   </td><td><input id='dianzan' value="."点赞"." type="."button"." onclick='fun2()'".">"."</td>"."</tr>";
			   echo "<tr><td>
			   <div class='hidden' id='content".$info['passageId']."'>
			     <div  style='background-color:#F5F5F5;'> 
			     <p><input type='text'style='width:400px;'><br><input type='button' value='评论' style='margin-top: 10px;' onclick='addPress".$info['passageId']."()'></p></div>";
			   $sql1="select * from press";
			   $result1=$mysqli->query($sql1);
			   $datanum1=$result1->num_rows;
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
	              
			   }
			  echo "</table>";
			  $result->close();
			  $result=$mysqli->query($sql);
			  $datanum=$result->num_rows;
			?>
		</div>	
		</div>
		<div class="slider">
		    <span>
				<br>			    
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
				<a href="">热门榜单</a><br><br>
				<a href="hot.php">热搜榜</a><br>	
			</span>
		</div>
	</body>
	<script type="text/javascript">
        	 var arrayDiv1=document.getElementById("title");
        	 var divObj1=arrayDiv1.getElementsByTagName("h5");
        	 var arrayDiv2=document.getElementById("pa");
        	 var divObj2=arrayDiv2.getElementsByTagName("table");
        	 for(var i=0;i<divObj1.length;i++){
        		 divObj1[i].onclick=function(event){
        			 showCurrentContent(event);
        		 }
        	 }
        	 function showCurrentContent(event){
        		 if(!event){event=window.event;}
        		 var eventObj=event.srcElement?event.srcElement:event.target;
        		 for(var i=0;i<divObj1.length;i++){
        			 if(eventObj==divObj1[i])
        				 j=i;
        			 else{
        				 divObj1[i].parentNode.setAttribute("class","header");
        			     divObj2[i].parentNode.setAttribute("class","hidden");
        			 }
        		 }
        		 if(divObj1[j].parentNode.getAttribute("class")=="header"||divObj2[j].parentNode.getAttribute("class")=="hidden"){
        			 eventObj.parentNode.setAttribute("class","header-c");
        			 divObj2[j].parentNode.setAttribute("class","show");
        		 }
        	 }
        	
      </script>
</html>