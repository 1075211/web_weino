<?php
   $conn=new mysqli('localhost','root','');
   $conn->set_charset("utf8");
   $conn->select_db('weiBo');     
   $sql="select * from passage";
   echo $conn->error;
   $passageWord=$_POST['passageWord'];
   $passageId=$_POST['passageId'];
   $conn->query("insert into press (owner,ownerimg,pressDate,pressWord,passageId) values ('lytt', '/upFile/content2.png','2022-12-22',$passageWord,$passageId)");
   echo "
   <div  style='background-color:#F5F5F5;' class='show' id='ownerpress".$passageId."'><img width=4% src='/upFile/content2.png'/>lytt<br><p>".$passageWord."<br><input id='shanchu' value="."删除"." type="."button"." onclick='deletepress".$passageId."()'></div>
   ";
?>