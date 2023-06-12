<?php
	//echo "<input class='search-btn' type='button' id='btn' value='&#xf002' />";
	echo "<ul class='list-group' id='list-box'>";
	$mysqli = new mysqli();
	$mysqli->connect("localhost", "root", "", "weiBo");
	$mysqli->set_charset("utf8");
	$result=$mysqli->query('select* from passage');
	
	$value=$_GET['value'];
	while($row=$result->fetch_assoc()){
	if($row['passageTitle']==$value){
		 
	echo "<li class='list-group-item' onclick='showHot.php?Title=$value'>{{$row['passageTitle']}}</li>";
		}
	}
	echo "</ul>";
?>