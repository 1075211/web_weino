<?php
   $mysqli = new mysqli();
   $mysqli->connect("localhost", "root", "", "weiBo");
   $mysqli->set_charset("utf8");
   $mysqli->query("Delete from myuser where id = {$_POST['id']}");
   $result->close();
?>
