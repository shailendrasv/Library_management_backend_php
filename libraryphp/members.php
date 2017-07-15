<?php
	require_once('init.php');
	
	$sql = "select * from student";
	
	$res = mysqli_query($con,$sql);
	
	$result = array();
	
	while($row = mysqli_fetch_array($res)){
		array_push($result,array('name'=>$row['name'],
			'email'=>$row['email'],'roll_no'=>$row['roll_no'],
			'branch'=>$row['branch']
			
		));
	}
	
	print json_encode(array("result"=>$result));
	
	mysqli_close($con);
	?>