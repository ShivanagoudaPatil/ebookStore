<?php
require_once("inc/lock.php");
require_once("inc/init.php");
require_once("inc/config.ui.php");
$page_title = "View Books";
$page_css[] = "your_style.css";
include("inc/header.php");
include("inc/nav.php");
?>

<!--Displays FileHirearchy-->
<link rel="stylesheet" href="css/user/style.css" type="text/css">
<div id="main" role="main">
	<?php
		//configure ribbon (breadcrumbs) array("name"=>"url"), leave url empty if no url
		//$breadcrumbs["New Crumb"] => "http://url.com"
		include("inc/ribbon.php");
	?>
	
	<div id="content">
	
		<div class="row">
			<div class="col-xs-12 col-sm-15 col-md-15 col-lg-15">
				<h1 class="page-title txt-color-blueDark"> View Books </h1>
				<h3> Select Catgory: </h3>
				<div class="tbl-header">
					<table cellpadding="0" cellspacing="0" border="0" style="color: red;">
					  <thead>
						<tr>
						  <th style="font-size:16px; font-color:green;"> <a href="bookview.php?category=comedy" target="myiframe"> Comedy </a> </th>
						  <th style="font-size:16px;"> <a href="bookview.php?category=drama" target="myiframe"> Drama </a> </th>
						  <th style="font-size:16px;"> <a href="bookview.php?category=horror" target="myiframe"> Horror </a> </th>
						  <th style="font-size:16px;"> <a href="bookview.php?category=romance" target="myiframe"> Romance </a> </th>
						  <th style="font-size:16px;"> <a href="bookview.php?category=fantasy" target="myiframe"> Fantasy </a> </th>
						  <th style="font-size:16px;"> <a href="bookview.php?category=mythology" target="myiframe"> Mythology </a> </th>
						  <th style="font-size:16px;"> <a href="bookview.php?category=satire" target="myiframe"> Satire </a> </th>
						  <th style="font-size:16px;"> <a href="bookview.php?category=sifi" target="myiframe"> Si-Fi </a> </th>
						</tr>
					  </thead>
					</table>
	 </div>
	 
	 <div class="tbl-content">
					<center> <table border="1" style="padding:30px;">
					  <tbody>
						<?php
						$category=$_GET['category'];
						$disp=strtoupper($category);
						echo "<h3>Category: $disp </h3>";
						include_once("dbconnect.php");
							$uname=$_SESSION["uname"];
							
							//selecting books belonging to particular category
							$sql2 = "SELECT * FROM fileupload where genre='$category'";
							$result = $conn->query($sql2);
								//echo "<tr> <th> Book ID </th> <th> Book Name </th> <th> Author </th> <th> Description </th> <th> Genre </th> <th> View Books </th> </tr>";
							if ($result->num_rows > 0) 
							{
								//echo "<tr>";
								$break=0;
								while($row = $result->fetch_array()) 
								{ 
									$count=$row["book_id"];
									echo "<td>";
									echo "<center><img src='".$row["img_path"]."' height='120px' width='160px'></center></br>";
									echo "<i style='font-family:times new roman; font-size:18px;'> Book ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ".$row["book_id"]."</i></br>";
									echo "<i style='font-family:times new roman; font-size:18px;'> Book Name &nbsp;: ".$row["book_name"]."</i></br>";
									echo "<i style='font-family:times new roman; font-size:18px;'> Author &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    : ".$row["author"]."</i></br>";
									//echo " <i style='font-size:15px;'>&nbsp;&nbsp; Description&nbsp;&nbsp;: ".$row["description"]."</i></br>";
									echo "&nbsp;&nbsp;&emsp;&emsp;"."<a style='font-family:times new roman; font-size:20px;color:blue' href='viewindividualbook.php?book_id=$count' style='font-size:16px; color: blue'> View </a>"; 
									echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&emsp;"."<a style='font-family:times new roman; font-size:20px; color:blue' href='deleteindividualbook.php?book_id=$count' style='font-size:16px; color: blue' target='index.php' style='pointer-events: none; cursor: default;'> Delete </a>"." </td>";	
									$break++;
									if($break%3==0)
									{
										echo "<tr> </tr>";
									}
								}
							}
							else
							{
								echo "&nbsp&nbsp&nbsp&nbsp"."No books listed in this category!!";
							}
							
							echo "</table> </center>";
							$conn->close();
					?>
					</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
			</div></br></br></br></br></br></br>
		</div>
		</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
		<!-- widget grid -->
		</div>
	</div>
	
<?php
include("inc/footer.php");
?>