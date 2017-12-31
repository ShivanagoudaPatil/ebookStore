<?php
	include('inc/lock.php');
	unset($_SESSION['uname']);
	session_destroy();
	echo"<script> window.location.href = 'index.php' ; </script>";
	exit();
?>