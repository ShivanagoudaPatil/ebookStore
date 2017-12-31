<link href="css/msgbox/style.css" rel="stylesheet">
<?php
include_once('dbconnect.php');
$uname=$_POST['username'];
$pwd=$_POST['password'];
$res="select * from user where name='$uname' and pwd='$pwd'";
$result = $conn->query($res);
$count=$result->num_rows;
//echo "$count";
if($count==1) {
	session_start(); 
	$_SESSION["uname"]=$uname;
	header("Location:home.php");
}
else
{ ?>
							<body>
								<div id="popup1" class="overlay">
									<div class="popup">
										<h2>Incorrect!</h2>
										<a class="close" href="index.php">&times;</a>
										<div class="content">
											Please enter correct username and password.
										</div>
									</div>
								</div>
								<a href="#popup1" id="dp"> </a>
								<script> document.getElementById('dp').click(); </script>
							</body>
<?php }
?>