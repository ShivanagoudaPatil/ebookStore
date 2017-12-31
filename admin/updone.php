<?php
require_once("inc/lock.php");
include('dbconnect.php');
$res=$_GET["reqid"];
//DELETE FROM `requestbooks` WHERE reqid=2
$sql = "delete from requestbooks where reqid=$res";
	$result = $conn->query($sql);
	
echo"<script> window.location.href = 'requests.php' ; </script>";
?>