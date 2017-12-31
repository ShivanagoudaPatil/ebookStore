<link href="css/msgbox/style.css" rel="stylesheet"
<?php
	require_once('inc/lock.php');
	include('dbconnect.php');
	$uname=$_SESSION["uname"];
	$title=$_POST["title"];
	$desc=$_POST["description"];
	$sql="insert into requestbooks(uname,bname,description) values('$uname','$title','$desc')";
	if ($conn->query($sql) === TRUE) {
		echo "<body>
								<div id='popup1' class='overlay'>
									<div class='popup'>
										<h2>Thank You! :)</h2>
										<a class='close' href='request.php'>&times;</a>
										<div class='content'>
											We have received your valuable request and will upload the book soon :)
										</div>
									</div>
								</div>
								<a href='#popup1' id='dp'> </a>
								<script> document.getElementById('dp').click(); </script>
							</body>";
		  $flag=1;
			
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
		$msg = "Request not Sent!";
		  echo "<script type='text/javascript'>alert('$msg');</script>";
	}
?>