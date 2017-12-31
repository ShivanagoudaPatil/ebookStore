<?php
	require_once("inc/lock.php");
?>
<div id="content">
		<link rel="stylesheet" href="css/msgbox/style.css">
		<div class="row">
			<div class="col-xs-12 col-sm-15 col-md-15 col-lg-15">
				<h3 class="page-title txt-color-blueDark"> Genre: </h3>
		<?php
			$category=$_GET['category'];
			$disp=strtoupper($category);
			echo "<h3> $disp </h3>";
			echo "<hr>";
			include_once("dbconnect.php");
				$uname=$_SESSION["uname"];
				//extracting uid
				$sql="select cid from user where name='$uname'";
				$conn->query($sql);
				$res=mysqli_query($conn,$sql);
				while ($row = $res->fetch_array()) {
				$uid=$row['cid'];
				}
				
				//checking if subscribed
				$sid=0;
				$sql1="select subid from subscription where cid='$uid'";
				$res=mysqli_query($conn,$sql1);
				while ($row = $res->fetch_array()) {
					$sid=$row['subid'];
				}
				
				//trial offer
				$try="select trialcount from trial where cid='$uid'";
				$res=mysqli_query($conn,$try);
				while ($row = $res->fetch_array()) {
					$tdays=$row['trialcount'];
				}
				
				//check download limit
				$dq="select downloads, maxdownloads from subscription where cid='$uid'";
				$res=$conn->query($dq);
				while ($row = $res->fetch_array()) {
					$downloads=$row['downloads'];
					$maxdownloads=$row['maxdownloads'];
				}
				
				//selecting books belonging to particular category
				$sql2 = "SELECT * FROM fileupload where genre='$category'";
				$result = $conn->query($sql2);
				echo "<table border='2' align='center' cellpadding='20' width='800'>";
					//echo "<tr> <th> Book ID </th> <th> Book Name </th> <th> Author </th> <th> Description </th> <th> Genre </th> <th> View Books </th> </tr>";
				if ($result->num_rows > 0) 
				{
					$count=6;
					while($row = $result->fetch_array()) 
					{
						echo "<td>";
						echo "<img src='images/bg-button.png'>";
						//echo "Book ID: ".$row["book_id"]."</br>";
						echo "<h3> Book Name: ".$row["book_name"]."</br> </h3>";
						echo "<h3> Author: ".$row["author"]."</br> </h3>";
						echo "<h3> Description: ".$row["description"]."</br> </h3>";
						echo "<h3> Genre: ".$row["genre"]."</br> </h3>";
						
						if($tdays>0)
						 {
							echo "<a href='viewindividualbook.php?book_id=$count'> View </a>"; 
							echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"."<a href='downloadindividualbook.php?book_id=$count' target='index.php' style='pointer-events: none; cursor: default;'> Download </a>"."</br> </td>";
							$count=$count+1;	
							if($count%2==0)
								echo "<tr> </tr>";
							$tdays=$tdays-1;
							$sql5="UPDATE trial SET trialcount = '$tdays' WHERE cid = '$uid'";
							$conn->query($sql5);
						 }
						
						elseif($sid==0)
						{ ?>
							<body>

								<div id="popup1" class="overlay">
									<div class="popup">
										<h2>Not Subscribed!</h2>
										<a class="close" href="subscribe.php">&times;</a>
										<div class="content">
											You have not subscribed to any pack, Please subscribe to a new Pack.
										</div>
									</div>
								</div>
							</body>
							
							<!--<script type="text/javascript">
								function AlertIt() {
								var answer = confirm ("You have not subscribed to any packs. To subscribe, Click ok. ")
								if (answer)
								window.location="subscribe.php";
								}
							</script>-->
					
						<a href="#popup1"> View </a>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#popup1"> Download </a>
						<?php 
						}
						 else
						{
							echo "<a href='viewindividualbook.php?book_id=$count'> View </a>";
							
							if($downloads<=$maxdownloads){
								echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"."<a href='downloadindividualbook.php?book_id=$count' target='index.php'> Download </a>"."</br> </td>";
								//check download limit
								$dq="select downloads, maxdownloads from subscription where cid='$uid'";
								$res=$conn->query($dq);
								while ($row = $res->fetch_array()) {
									$downloads=$row['downloads'];
									$maxdownloads=$row['maxdownloads'];
								}
							}
							elseif($downloads>$maxdownloads)
							{ ?>
								<body>

								<div id="popup1" class="overlay">
									<div class="popup">
										<h2>Hold On!</h2>
										<a class="close" href="#">&times;</a>
										<div class="content">
											You have downloaded the maximum pdfs for the current subscription. Please subscribe to new pack to download more pdfs.
										</div>
									</div>
								</div>
							</body>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#popup1"> Download </a>
							<?php }
							$count=$count+1;	
							if($count%2==0)
								echo "<tr> </tr>";
						}
					}
				}
				else 	
				{
					echo "&nbsp&nbsp&nbsp&nbsp"."No books listed in this category!!";
				}
				echo "</table>";
				$conn->close();
		?>
		
		</div>
	</div>
</div>