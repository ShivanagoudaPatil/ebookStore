<?php
include_once('dbconnect.php');
$uname=$_POST['username'];
$pwd=$_POST['password'];
$res="select * from admin where admin_name='$uname' and admin_password='$pwd'";
$result = $conn->query($res);
$count=$result->num_rows;
echo "$count";
if($count==1)
{
	session_start(); 
	$_SESSION["uname"]=$uname;
	header("Location:home.php");
}
?>