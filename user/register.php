<link href="css/msgbox/style.css" rel="stylesheet">
<?php
	include('dbconnect.php');
	$name=$_POST["name"];
	$phno=$_POST["phno"];
	$eid=$_POST["eid"];
	$pwd=$_POST["pwd"];
	$d=date("Y/m/d");
	$flag=0;
	$sql="insert into user (name,phno,email,pwd,date) values('$name','$phno','$eid','$pwd','$d')";
	if ($conn->query($sql) === TRUE) {
		echo "<body>
								<div id='popup1' class='overlay'>
									<div class='popup'>
										<h2>Success! :)</h2>
										<a class='close' href='index.php'>&times;</a>
										<div class='content'>
											You have successfully registered. Please Log in!
										</div>
									</div>
								</div>
								<a href='#popup1' id='dp'> </a>
								<script> document.getElementById('dp').click(); </script>
							</body>";
		  $flag=1;
			
	} else {
		//echo "Error: " . $sql . "<br>" . $conn->error;
		$msg = "Registeration Unsucessful!";
		  echo "<script type='text/javascript'>alert('$msg');</script>";
	}
	if($flag==1)
	{
		$sql="select cid from user where name='$name'";
		$conn->query($sql);
		$res=mysqli_query($conn,$sql);
		while ($row = $res->fetch_array()) 
		{
			$uid=$row['cid'];
		}
		
		$sql1="insert into trial values ($uid,20)";
		$conn->query($sql1);
	}
	
	
	$conn->close();
?>