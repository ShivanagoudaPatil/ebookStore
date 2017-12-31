<?php include('inc/lock.php'); ?>
<link href="css/table/style.css" rel="stylesheet">

<div class="promos">  
<div class="promo scale">
  <div class="deal">
  <?php 
			$category="comedy";
			//$disp=strtoupper($category);
			//echo "<h3 style='position: absolute; left: 550px; top: 150px;'> Category: $disp </h3>";
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
				if ($result->num_rows > 0) 
				{
					$count=6;
					while($row = $result->fetch_array()) 
					{
						echo "<span>Plus</span>
						<span>This is really a good deal!</span>
						</div>
												<span class='price'>$89</span>
						  <ul class='features'>
							<li>".$row["book_name"]."</li>
							<li>".$row["description"]."</li>
							<li>".$row["author"]."</li>   
						  </ul>
						  <button>Sign up</button>";
						
						if($tdays>0)
						 {
							echo "<a class='signup' href='viewindividualbook.php?book_id=$count'> View </a>";
							echo "&emsp;&emsp;&emsp;"; 
							echo "<a class='signup' href='downloadindividualbook.php?book_id=$count'>Download</a>";

							$count=$count+1;	
							if($count%3==0)
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
							
						<?php
						echo "<a class='signup' href='#popup1'> View </a>";
						echo "&emsp;&emsp;&emsp;"; 
						echo "<a class='signup' href='#popup1'>Download</a>";
						?>
						
						<?php 
						}
						 else
						{
							echo "<a class='signup' href='viewindividualbook.php?book_id=$count'> View </a>";
							echo "&emsp;&emsp;&emsp;";
							
							if($downloads<=$maxdownloads){
								echo "<a class='signup' href='downloadindividualbook.php?book_id=$count'>Download</a>";
								echo "</div>";
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
							//if($count%2==0)
						}
					}
					echo "</div>";
				}
				else 	
				{
					echo "&nbsp&nbsp&nbsp&nbsp"."No books listed in this category!!";
				}
				echo "</table>";
				$conn->close();
				//echo "</div> </div>";
		?>
		
    
</div>


<!--<div class="promo scale">
  <div class="deal">
    <span>Plus</span>
    <span>This is really a good deal!</span>
  </div>
  <span class="price">$89</span>
  <ul class="features">
    <li>Some great feature</li>
    <li>Another super feature</li>
    <li>And more...</li>   
  </ul>
  <button>Sign up</button>
</div>
<div class="promo scale">
  <div class="deal">
    <span>Plus</span>
    <span>This is really a good deal!</span>
  </div>
  <span class="price">$89</span>
  <ul class="features">
    <li>Some great feature</li>
    <li>Another super feature</li>
    <li>And more...</li>   
  </ul>
  <button>Sign up</button>
</div> -->
</div>