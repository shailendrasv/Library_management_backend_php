<?php
include("PDOConnection.php");
if($_POST["action"]=="add")
{
	insertToken($cnn,$_POST["tokenid"]);
}
//function to insert new device token into table
function insertToken($cnn,$token)
{
	if(isExistToken($cnn,$token))
	{
		echo("token already exists");
		return;
	}
	$query="insert into deviceinfo(tokenid) values(?)";
	$stmt=$cnn->prepare($query);
	$stmt->bindParam(1,$token);
	$stmt->execute();
	echo("Insert success");
	
}
//check if a token exists already in table
function isExistToken($cnn,$token)
{
	$query="select * from deviceinfo where tokenid= ?";
	$stmt=$cnn->prepare($query);
	$stmt->bindParam(1,$token);
	$stmt->execute();
	$rowcount=$stmt->rowCount();
	//for debug
	//var_dump($rowcount);
	return $rowcount;
}
?>