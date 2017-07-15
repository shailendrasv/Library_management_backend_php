<?php
	require_once('init.php');
    $bookID = $_REQUEST['id'];
	
	$sql = "select * from data where id = '$bookID' ";
	
	$res = mysqli_query($con,$sql);
	
	$result = array();
	
	while($row = mysqli_fetch_array($res)){
		array_push($result,array('id'=>$row['id'],
			'name'=>$row['bname'],'author'=>$row['author'],
			'availability' =>$row['availability'],
			'imageName'=>$row['imageName']
			
		));
	}
	
	echo json_encode(array("result"=>$result));
	
	mysqli_close($con);
	?>