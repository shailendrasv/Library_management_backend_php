<?php
error_reporting(0);
require "init.php";

$name = $_POST["name"];
$roll_no = $_POST["roll_no"];
$branch=$_POST["branch"];
$year=$_POST["year"];
$email = $_POST["email"];
$phone=$_POST["phone"];
$username=$_POST["username"];
$password = $_POST["password"];


$sql = "INSERT INTO `student`(`name`, `roll_no`, `branch`, `year`, `email`, `phone`,`username`, `password`) VALUES ('$name', '$roll_no', '$branch', '$year', '$email', '$phone','$username', '$password')";

if(mysqli_query($con, $sql)){
	echo 'success';
}
else
{
	echo 'Data insertion error!!!'.mysqli_error($con);
}



?>