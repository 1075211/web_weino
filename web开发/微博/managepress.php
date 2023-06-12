<?php
	$mysqli = new mysqli();
	$mysqli->connect("localhost", "root", "", "weiBo");
	$mysqli->set_charset("utf8");
    $sql="select * from press where passageId=".$_GET['id'];
	$result=$mysqli->query($sql);
    $datanum=$result->num_rows;  
			   echo "<table>";
			  for($i=1;$i<=$datanum;$i++){
		   $info=$result->fetch_assoc();
              echo "<tr><td>".$info['pressWord']."</td><td><input value='删除' type='button' onclick='deletepress".$info['id']."()'/>"."</td>"."</tr>";
              echo "<script>
                                function deletepress".$info['id']."(){
    
                                if(window.XMLHttpRequest){
    	                           xmlhttp=new XMLHttpRequest();
    	                          }else if(window.ActiveXObject){
    		                      xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
    	                          }
    	                         if(xmlhttp!=null){
     		                     xmlhttp.onreadystatechange=state_Changepress".$info['id'].";
    		                     String='id=".$info['id']."';  
    		                     
    		                     xmlhttp.open('POST','deletepress1.php',true);
    		                     xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    		                     xmlhttp.send(String); 
    	                        }else{
    		                     alert('您的浏览器不支持 XMLHTTP.');
    	                        }
                           } 	
                           function state_Changepress".$info['id']."(){
    	                       if(xmlhttp.readyState==4&&xmlhttp.status==200){
    	                       //document.getElementById('owernpress').innerHTML=xmlhttp.responseText;
    	                     }
                        }
                  	
                                </script>";
		    }
			  echo "</table>";
?>
<!DOCTYPE html>
<html>
    <style>
            body{
                background-image: linear-gradient(to right, rgba(200, 200, 200, .7),rgba(222, 119, 119, 0.7));
            }
       </style>
    <body>
    <h1>评论管理</h1>
        </body>
</html>