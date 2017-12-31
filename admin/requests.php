<?php
require_once("inc/lock.php");
require_once("inc/init.php");
require_once("inc/config.ui.php");
$page_title = "Book Requests";
$page_css[] = "your_style.css";
include("inc/header.php");
include("inc/nav.php");
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
				<h1 class="page-title txt-color-blueDark"> Book Requests </h1>
				<link rel="stylesheet" href="css/user/style.css" type="text/css">
				<!--<h1>Fixed Table header</h1>-->
				  <div class="tbl-header">
					<table cellpadding="0" cellspacing="0" border="0">
					  <thead>
						<tr>
						  <th>Customer Name</th>
						  <th>Book Name</th>
						  <th>Description</th>
						  <th>Status </th>
						</tr>
					  </thead>
					</table>
				  </div>
				  <div class="tbl-content">
					<table cellpadding="0" cellspacing="0" border="0">
					  <tbody>
					  	<?php
							$count=1;
							include_once("dbconnect.php");
							$sql = "SELECT * FROM requestbooks";
							$result = $conn->query($sql);
							//echo "<table border='2' align='center' cellpadding='20' width='500'>";
								//echo "<tr> <th>Customer Name</th> <th>Book Name</th> <th>Description</th> <th>Status</th> </tr>";
								//echo "<tr> <th> Book ID </th> <th> Book Name </th> <th> Author </th> <th> Description </th> <th> Genre </th> <th> View Books </th> </tr>";
							if ($result->num_rows > 0) 
							{
								$count=6;
								while($row = $result->fetch_array()) 
								{
									$id=$row["reqid"];
									echo "<tr>";
									echo "<td>"." ".$row["uname"]."</td>";
									echo "<td>"." ".$row["bname"]."</td>";
									echo "<td>"." ".$row["description"]."</td>";
									echo "<td> <a href='updone.php?reqid=$id'> Done </a> </td> </tr>";
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
					  
		
			</div>
		</div>
		<section id="widget-grid" class="">
		</section>
		</div></br></br></br></br></br></br></br></br></br></br></br></br>
		
	</div>
	
<?php
include("inc/footer.php");
?>