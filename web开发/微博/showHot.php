<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title></title>
	</head>

	<style>

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
		        height: 1300px;
		    }
</style>
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
			   if(strpos($info['passageTitle'],$_GET['Title'])!==false){
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
				    echo "<td><input id='guanzhu' value='关注' type='button' onclick='"."addNumber.php?passageId=".$info['passageId']."'/>"."</td>"."</tr>";
				    echo "<tr>"."<td>".$info['passageWord']."</td>"."</tr>";
				    echo "<tr><td><img width=40% src='".$info['passageImg']."'/>"."</td>"."</tr>";
				    echo "<tr>"."<td><input id='pinglun".$info['passageId']."' value='评论' type='button' onclick='showCurrentMenu".$info['passageId']."()' class='before_press'>
				    </td><td><input id='dianzan' value="."点赞"." type="."button"." onclick='fun2()'".">"."</td>"."</tr>";
				    echo "<tr><td>
				    <div class='hidden' id='content".$info['passageId']."'>
				      <div  style='background-color:#F5F5F5;'> 
				      <p><input id='presscontent".$info['passageId']."' type='text'style='width:400px;'><br><input type='button' value='评论' style='margin-top: 10px;' onclick='addPress".$info['passageId']."()'></p></div>";
				    $sql1="select * from press";
				    $result1=$mysqli->query($sql1);
				    $datanum1=$result1->num_rows;
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
				       
				}else{
				   echo "";
			   }
			  echo "</table>";
			}
		?>
</div>
</html>