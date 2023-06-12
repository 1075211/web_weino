<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<style>
		.header {
		        background-color: white;
		        height: 50px;
		    }
		.show{
                 display:block;
               }
          .hidden{
                 display:none;
               }
		.main {
		        height: 1300px;
	 		background-color: lightgray;
		    }
		.img{
			margin: 0 auto;
			margin-top: 10px;
		}
		.txt{
			color: whitesmoke;
			font-size: 45px;
		}
		.txt1{
			color: whitesmoke;
			font-size: 18px;
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
		.w {
		        /* 宽为页面的60% */
		        width: 60%;
		        /* 让div在页面居中 */
		        margin: 0 auto;
		        /* 上边距设置为10像素 */
		        margin-top: 10px;
		    }
		.unit{
				background-color:gray;
				color:white;
				float: left;
				                   /*居中*/
				display: flex; 
				justify-content: center; /*水平居中*/
				align-items: Center; /*垂直居中*/
				
				width: 50%;
				height: 40px;
				border:0;
				font-size: 16px;
			}
			.current{
				background-color:dimgrey;
				color:white;
				float: left;
				                   /*居中*/
				display: flex; 
				justify-content: center; /*水平居中*/
				align-items: Center; /*垂直居中*/
				
				width: 50%;
				height: 40px;
				border:0;
				font-size: 16px;
			}
			.txt2{
				color: gray;
			}
			.wenzhang{
				width:50%;
				float:left;
			}
	</style>
	<body bgcolor="#333333">
		<div align="center">
			<?php
			$mysqli = new mysqli();
			$mysqli->connect("localhost", "root", "", "weiBo");
			$mysqli->set_charset("utf8");
			$sql="select * from passage";
			$result=$mysqli->query($sql);
			   $datanum=$result->num_rows;  
			for($i=1;$i<=$datanum;$i++){
			   $info=$result->fetch_assoc();
			   if($info['passageId']==$_GET['id']){
				   echo "<img class='img' width='10%' src='".$info['ownerimg']."'/><br>";
			   echo "<span class='txt'>".$info['owner']."</span><br>";
				}
			}
			?>
			<span class="txt1">do what I what</span>
		</div>&nbsp;
		<table align="center">
			<tr class="txt1">
				<td align="center">
					<?php
					$mysqli = new mysqli();
					$mysqli->connect("localhost", "root", "", "weiBo");
					$mysqli->set_charset("utf8");
					$sql="select * from myuser";
					$result=$mysqli->query($sql);
					   $datanum=$result->num_rows;  
					for($i=1;$i<=$datanum;$i++){
					   $info=$result->fetch_assoc();
					   if($info['username']=="lytt"){
						   echo $info['number'];
						}
					}
					?>
				</td>
				<td align="center">5</td>
				<td align="center">3</td>
			</tr>
			<tr class="txt2">
				<td align="center">关注</td>
				<td align="center">粉丝</td>
				<td align="center">微博</td>
			</tr>
		</table>
		<div class="w">
			
			<div id="levelmenu">
				<div class="unit">
					<h4 color="white">我的文章</h4>
				</div>
				<div class="unit">
					<h4 color="white">我的评论</h4>
				</div>
				<div id="txt" align="center" class="wenzhang">
					<?php
					$mysqli = new mysqli();
					$mysqli->connect("localhost", "root", "", "weiBo");
					$mysqli->set_charset("utf8");
					$sql="select * from passage";
					$result=$mysqli->query($sql);
					   $datanum=$result->num_rows;  
					   $passageId=$_GET['id'];
				   echo "<table class='show' id='ownerpassage$passageId'>";
					for($i=1;$i<=$datanum;$i++){
					   $info=$result->fetch_assoc();
					   if($info['owner']=="lytt"){
						   echo "<tr><td><img width=20% src='".$info['ownerimg']."'/>".$info['owner']."</td>";
						   echo "<td>".$info['date']."</td></tr>";
						   echo "<td><input id='guanzhu' value='删除' type='button' onclick='deletepassage".$info['passageId']."()'/>"."</td>"."</tr>";
						   echo "<tr>"."<td>".$info['passageWord']."</td>"."</tr>";
						   echo "<tr><td><img width=80% src='".$info['passageImg']."'/>"."</td>"."</tr>";
						}
						echo "<script>
                                function deletepassage".$info['passageId']."(){
                                var ownerpassage".$info['passageId']."=document.getElementById('ownerpassage".$info['passageId']."');
                            
                                ownerpassage".$info['passageId'].".setAttribute('class','hidden');
                                if(window.XMLHttpRequest){
    	                           xmlhttp=new XMLHttpRequest();
    	                          }else if(window.ActiveXObject){
    		                      xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
    	                          }
    	                         if(xmlhttp!=null){
     		                     xmlhttp.onreadystatechange=state_Changepassage".$info['passageId'].";
    		                     String='passageId=".$info['passageId']."&passageWord=".$info['passageWord']."';  
    		                     //alert(String);
    		                     xmlhttp.open('POST','deletepassage.php',true);
    		                     xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    		                     xmlhttp.send(String); 
    	                        }else{
    		                     alert('您的浏览器不支持 XMLHTTP.');
    	                        }
                           } 	
                           function state_Changepassage".$info['passageId']."(){
    	                       if(xmlhttp.readyState==4&&xmlhttp.status==200){
    	                       //alert (xmlhttp.responseText);
    	                       //document.getElementById('owernpress').innerHTML=xmlhttp.responseText;
    	                     }
                        }
                  	
                                </script>";
					}
					  echo "</table>";
					?>
				</div>
				<div align="center"  class="wenzhang">
					<?php
					$mysqli = new mysqli();
					$mysqli->connect("localhost", "root", "", "weiBo");
					$mysqli->set_charset("utf8");
					$sql="select * from press";
                           $result=$mysqli->query($sql);
					   $datanum=$result->num_rows;  
					   //$passageId=$_GET['id'];
					   
					for($i=1;$i<=$datanum;$i++){
					   $info=$result->fetch_assoc();
					   echo "<table class='show' id='ownerpress".$info['passageId']."'>";
					   if($info['owner']=="lytt"){
						   echo "<br><tr><td>".$info['pressWord']."</td></tr>";
						   echo "<tr><td>".$info['pressDate']."</td>";
						   echo "<td><input id='guanzhu' value='删除' type='button' onclick='deletepress".$info['passageId']."()'/>"."</td>"."</tr>";
					
						}
						echo "<script>
                                function deletepress".$info['passageId']."(){
                                var ownerpress".$info['passageId']."=document.getElementById('ownerpress".$info['passageId']."');
                            
                                ownerpress".$info['passageId'].".setAttribute('class','hidden');
                                if(window.XMLHttpRequest){
    	                           xmlhttp=new XMLHttpRequest();
    	                          }else if(window.ActiveXObject){
    		                      xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
    	                          }
    	                         if(xmlhttp!=null){
     		                     xmlhttp.onreadystatechange=state_Changepress".$info['passageId'].";
    		                     String='passageId=".$info['passageId']."';  
    		                     //alert(String);
    		                     xmlhttp.open('POST','deletepress.php',true);
    		                     xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    		                     xmlhttp.send(String); 
    	                        }else{
    		                     alert('您的浏览器不支持 XMLHTTP.');
    	                        }
                           } 	
                           function state_Changepress".$info['passageId']."(){
    	                       if(xmlhttp.readyState==4&&xmlhttp.status==200){
    	                       //document.getElementById('owernpress').innerHTML=xmlhttp.responseText;
    	                     }
                        }
                  	
                                </script>";
				}
					  echo "</table>";
					?>
				</div>
			</div>			
			
	</body>
</html>