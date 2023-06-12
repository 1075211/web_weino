<?php
	$mysqli = new mysqli();
	$mysqli->connect("localhost", "root", "", "weiBo");
	$mysqli->set_charset("utf8");
    $sql='select * from myuser';
	$result=$mysqli->query($sql);
    $datanum=$result->num_rows;  
			   echo "<table>";
			  for($i=1;$i<=$datanum;$i++){
	    	   $info=$result->fetch_assoc();
                echo "<script>
                                function deuser".$info['id']."(){
                                if(window.XMLHttpRequest){
    	                           xmlhttp=new XMLHttpRequest();
    	                          }else if(window.ActiveXObject){
    		                      xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
    	                          }
    	                         if(xmlhttp!=null){
                                    xmlhttp.onreadystatechange=state_Changepress".$info['id'].";
    		                     String='id=".$info['id']."';  
    		                     xmlhttp.open('POST','deleteuser.php',true);
    		                     xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    		                     xmlhttp.send(String); 
    	                        }else{
    		                     alert('您的浏览器不支持 XMLHTTP.');
    	                        }
                           } 	
                           function state_Changepress".$info['id']."(){
                            if(xmlhttp.readyState==4&&xmlhttp.status==200){
                            }
                          }
                                </script>";
               echo "<tr><td>".$info['username']."</td><td><input value='删除' type='button' onclick='deuser".$info['id']."()'/>"."</td>"."</tr>";
	    }
			  echo "</table>";
?>
<!DOCTYPE html>
<html>
    <meta charset="UTF-8">
    <style>
            body{
                background-image: linear-gradient(to right, rgba(200, 200, 200, .7),rgba(222, 119, 119, 0.7));
            }
    </style>
    <body>
    <h1>用户管理</h1>
        </body>
</html>