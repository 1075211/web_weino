<?php
	$mysqli = new mysqli();
	$mysqli->connect("localhost", "root", "", "weiBo");
	$mysqli->set_charset("utf8");
	$result=$mysqli->query('select* from passage');
	$a=$_POST['button'];
	$b=$_POST['id'];
	if($a=="点赞"){
    while($row=$result->fetch_assoc()){
        if($row['passageId']==$b){
		$likeNum=$row['likeNum'];
    	$l=$likeNum+1;
        }
    }
		$mysqli->query("Update passage set likeNum=$l where passageId=$b");
	
	echo "3";
	}
	else{
        while($row=$result->fetch_assoc()){
            if($row['passageId']==$b){
                $likeNum=$row['likeNum'];
                $l=$likeNum-1;
            }
        }
			$mysqli->query("Update passage set likeNum=$l where passageId=$b");
		
		echo "4";
	}
		mysqli_close($mysqli);
?>
