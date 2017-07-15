<?php 
error_reporting(0);
require "init.php";

$username = $_POST["username"];
$password = $_POST["password"];

//$name = "sdf";
//$password = "sdf";

$sql = "SELECT * FROM `student` WHERE `username`='".$username."' AND `password`='".$password."';";

$result = mysqli_query($con, $sql);

$response = array();

while($row = mysqli_fetch_array($result)){
	$response = array("roll_no"=>$row[1],"name"=>$row[0],"password"=>$row[7],"email"=>$row[4],"branch"=>$row[2],"year"=>$row[3],"phone"=>$row[5],"username"=>$row[6]);
}

echo json_encode(array("user_data"=>$response));

?>