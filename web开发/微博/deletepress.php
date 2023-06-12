<?php
   $mysqli = new mysqli();
   $mysqli->connect("localhost", "root", "", "weiBo");
   $mysqli->set_charset("utf8");
   $sql="select * from press";
   $result=$mysqli->query($sql);
   $datanum=$result->num_rows;
   for($i=1;$i<=$datanum;$i++){
      $info=$result->fetch_assoc();
      if($info['passageId']==$_POST['passageId']){
        $mysqli->query("Delete from press where id = {$info['id']}");
      }
      alert('您的浏览器不支持 XMLHTTP.');
   }
   $result->close();
?>