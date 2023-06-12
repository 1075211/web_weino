<?php
     $mysqli = new mysqli();
	$mysqli->connect("localhost", "root", "", "weiBo");
	$mysqli->set_charset("utf8");
	$result=$mysqli->query('select* from passage');
	$a=$_POST['button'];
	$b=$_POST['id'];
	$mysqli2 = new mysqli();
	$mysqli2->connect("localhost", "root", "", "weiBo");
	$mysqli2->set_charset("utf8");
	$result2=$mysqli->query('select* from myuser');
	while($row=$result->fetch_assoc()){
		if($b==$row['passageId']){
	  $username=$row['owner'];
		}
	}
	if($a=="关注"){
    while($row2=$result2->fetch_assoc()){
		if($username==$row2['username']){
			$number=$row2['number'];
			$n=$number+1;
            
			$id=$row2['id'];
		     $mysqli2->query("Update myuser set number=$n where id=$id");
		    //$mysqli->query("Update passage set likeNum=$l where passageId=$b");
		}
	}
	echo "1";
	}
	else{
		while($row2=$result2->fetch_assoc()){
			if($username==$row2['username']){
				$number=$row2['number'];
				$n=$number-1;
                $id=$row2['id'];
                $mysqli2->query("Update myuser set number=$n where id=$id");
			}
		}
		echo "2";
	}
	

		mysqli_close($mysqli);
		mysqli_close($mysqli2);


?>
