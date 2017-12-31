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
			</div>
		</div>
		</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
		<!-- widget grid -->
		</div>
	</div>
	<script src="<?php echo ASSETS_URL; ?>/js/plugin/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/datatables/dataTables.colVis.min.js"></script>
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/datatables/dataTables.tableTools.min.js"></script>
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/morris/raphael.min.js"></script>
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/morris/morris.min.js"></script>
<?php
include("inc/footer.php");
?>