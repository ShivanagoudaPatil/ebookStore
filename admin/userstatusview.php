<?php
require_once("inc/lock.php");
require_once("inc/init.php");
require_once("inc/config.ui.php");
$page_title = "View Books";
$page_css[] = "your_style.css";
include("inc/header.php");
include("inc/nav.php");

$utype=$_POST["type"];
?>

<!--Displays FileHirearchy-->

<div id="main" role="main">
	<?php
		//configure ribbon (breadcrumbs) array("name"=>"url"), leave url empty if no url
		//$breadcrumbs["New Crumb"] => "http://url.com"
		include("inc/ribbon.php");
	?>
	
	<div id="content">
	
		<div class="row">
			<div class="col-xs-12 col-sm-15 col-md-15 col-lg-15">
				<h1 class="page-title txt-color-blueDark"> User Details </h1>
				<form method="post" action="userstatusview.php">
				&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;	
				<b> Select Subscription Type: </b><select name="type">
												<option value="all"> All Users</option> 
												<option value="sub"> Subscribed Users</option> 
												<option value="unsub"> Non Subscribed Users</option> 
											 </select>
				<input type="button" value="Search"/>
											 
				</form>
			<body>
				<link rel="stylesheet" href="css/user/style.css" type="text/css">
				<?php if($utype=="all") { ?>
				<!--<h1>Fixed Table header</h1>-->
				  <div class="tbl-header">
					<table cellpadding="0" cellspacing="0" border="0">
					  <thead>
						<tr>
						  <th>Customer ID</th>
						  <th>Name</th>
						  <th>Phone No.</th>
						  <th>Email ID: </th>
						</tr>
					  </thead>
					</table>
				  </div>
				  <div class="tbl-content">
					<table cellpadding="0" cellspacing="0" border="0">
					  <tbody>
					  	<?php
							include_once("dbconnect.php");
							$sql = "SELECT * FROM user";
							$result = $conn->query($sql);
							//echo "<table border='2' align='center' cellpadding='20' width='1000'>";
								//echo "<tr> <th> Book ID </th> <th> Book Name </th> <th> Author </th> <th> Description </th> <th> Genre </th> <th> View Books </th> </tr>";
							if ($result->num_rows > 0) 
							{
								while($row = $result->fetch_array()) 
								{
									echo "<tr>";
									echo "<td>".$row["cid"]."</td>";
									echo "<td>".$row["name"]."</td>";
									echo "<td>".$row["phno"]."</td>";
									echo "<td> ".$row["email"]."</td>";
									echo "</tr>";
									//hmm
								}
							}
							else 	
							{
								echo "0 results";
							}
							echo "</table>";
							$conn->close();
						?>
					   <tbody>
					  </table>
				</div> <?php } else if($utype=="sub") {?>
				
				<!--<h1>Fixed Table header</h1>-->
				  <div class="tbl-header">
					<table cellpadding="0" cellspacing="0" border="0">
					  <thead>
						<tr>
						  <th>Customer ID</th>
						  <th>Name</th>
						  <th>Phone No.</th>
						  <th>Email ID: </th>
						  <th>Subscription Type</th>
						  <th>Subscription Start</th>
						  <th>Subscription End</th>
						</tr>
					  </thead>
					</table>
				  </div>
				  <div class="tbl-content">
					<table cellpadding="0" cellspacing="0" border="0">
					  <tbody>
					  	<?php
							include_once("dbconnect.php");
							$sql = "SELECT u.cid,u.name,u.phno,u.email,u.date as start_date, s.subtype, s.substart, s.subend FROM user u, subscription s where u.cid=s.cid";
							$result = $conn->query($sql);
							//echo "<table border='2' align='center' cellpadding='20' width='1000'>";
								//echo "<tr> <th> Book ID </th> <th> Book Name </th> <th> Author </th> <th> Description </th> <th> Genre </th> <th> View Books </th> </tr>";
							if ($result->num_rows > 0) 
							{
								while($row = $result->fetch_array()) 
								{
									echo "<tr>";
									echo "<td>".$row["cid"]."</td>";
									echo "<td>".$row["name"]."</td>";
									echo "<td>".$row["phno"]."</td>";
									echo "<td> ".$row["email"]."</td>";
									echo "<td>&emsp;&emsp;&emsp;&emsp;&emsp;".$row["subtype"]."</td>";
									echo "<td> ".$row["substart"]."</td>";
									echo "<td> ".$row["subend"]."</td>";
									echo "</tr>";
									//hmm
								}
							}
							else 	
							{
								echo "0 results";
							}
							echo "</table>";
							$conn->close();
						?>
					   <tbody>
					  </table>
				</div> <?php } else if($utype=="unsub") {?>
						
						<h1>Fixed Table header</h1>
				  <div class="tbl-header">
					<table cellpadding="0" cellspacing="0" border="0">
					  <thead>
						<tr>
						  <th>Customer ID</th>
						  <th>Name</th>
						  <th>Phone No.</th>
						  <th>Email ID: </th>
						</tr>
					  </thead>
					</table>
				  </div>
				  <div class="tbl-content">
					<table cellpadding="0" cellspacing="0" border="0">
					  <tbody>
					  	<?php
							include_once("dbconnect.php");
							$sql = "SELECT user.cid,user.name,user.phno,user.email FROM user LEFT JOIN subscription ON subscription.cid = user.cid WHERE subscription.cid IS NULL";
							$result = $conn->query($sql);
							//echo "<table border='2' align='center' cellpadding='20' width='1000'>";
								//echo "<tr> <th> Book ID </th> <th> Book Name </th> <th> Author </th> <th> Description </th> <th> Genre </th> <th> View Books </th> </tr>";
							if ($result->num_rows > 0) 
							{
								while($row = $result->fetch_array()) 
								{
									echo "<tr>";
									echo "<td>".$row["cid"]."</td>";
									echo "<td>".$row["name"]."</td>";
									echo "<td>".$row["phno"]."</td>";
									echo "<td> ".$row["email"]."</td>";
									echo "</tr>";
									//hmm
								}
							}
							else 	
							{
								echo "0 results";
							}
							echo "</table>";
							$conn->close();
						?>
					   <tbody>
					  </table>
				</div> <?php }?>
				<?php //echo"<script> window.location.href = 'users.php' ; </script>"; ?>
		</body>					 
			</div>
		</div>
		<!-- widget grid -->
		<br><br><br><br><br>
		<section id="widget-grid" class="">
		</section>
		</div>
	</div>
	
<?php
include("inc/footer.php");
?>