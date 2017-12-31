<?php
require_once("inc/lock.php");
require_once("inc/init.php");
require_once("inc/config.ui.php");
$page_title = "User Details";
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
				<h1 class="page-title txt-color-blueDark"> User Details </h1>
				<form method="post" action="userstatusview.php">
				&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;	
				<b> Select Subscription Type: </b><select name="type">
												<option value="all"> All Users</option> 
												<option value="sub"> Subscribed Users</option> 
												<option value="unsub"> Non Subscribed Users</option> 
											 </select>
				<input type="submit" value="Search"/>
				</form>
											 
				<center>	
					
				</center>
			</div>
		</div>
		<!-- widget grid -->
		<br><br><br><br><br>
		<section id="widget-grid" class="">
		</section>
		</div>
	</div>
	</br></br></br></br></br></br>
<?php
include("inc/footer.php");
?>