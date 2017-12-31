<?php

//database connection & session check
//require_once("inc/lock.php");
//initilize the page
 session_start();
  if(isset($_SESSION['uname']) == false) {
    header("Location: index.php");
  }
 
require_once("inc/init.php");

//require UI configuration (nav, ribbon, etc.)
require_once("inc/config.ui.php");

/*---------------- PHP Custom Scripts ---------

YOU CAN SET CONFIGURATION VARIABLES HERE BEFORE IT GOES TO NAV, RIBBON, ETC.
E.G. $page_title = "Custom Title" */

$page_title = "Admin";

/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
$page_css[] = "your_style.css";
include("inc/header.php");

//include left panel (navigation)
//follow the tree in inc/config.ui.php
$page_nav["hehe"]["active"] = true;
include("inc/nav.php");
//include("viewbook.php");
include('dbconnect.php');
$uname=$_SESSION["uname"];
?>
<!-- ==========================CONTENT STARTS HERE ========================== -->
<!-- MAIN PANEL -->
<div>
<div id="main" role="main">
	<?php
		include("inc/ribbon.php");
	?>

	<!-- MAIN CONTENT -->
	<div id="content">

		<div class="row">
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
				<h1 class="page-title txt-color-blueDark"><i class="fa-fw fa fa-home"></i> Welcome </h1>
			</div>
		</div>
		<!-- widget grid -->
		<section id="widget-grid" class="">
		
<!--To Plot Graph-->
<?php 
	//No. of files
	$sql="select count(*) as filecount from fileupload";
	$res=mysqli_query($conn,$sql);
	while ($row = $res->fetch_array()) {
		$fc=$row['filecount'];
	}
	
	//Total Downloads
	$sql="SELECT SUM(downloads) as fd from ratings";
	$res=mysqli_query($conn,$sql);
	while ($row = $res->fetch_array()) {
		$fd=$row['fd'];
	}
	
	//Total Views
	$sql="SELECT SUM(views) as fv from ratings";
	$res=mysqli_query($conn,$sql);
	while ($row = $res->fetch_array()) {
		$fv=$row['fv'];
	}
	
	//Total Users
	$sql="select count(*) as tu from user";
	$res=mysqli_query($conn,$sql);
	while ($row = $res->fetch_array()) {
		$tu=$row['tu'];
	}
	
	//Registered Users
	$sql="SELECT count(*) as ru FROM user u, subscription s where u.cid=s.cid";
	$res=mysqli_query($conn,$sql);
	while ($row = $res->fetch_array()) {
		$ru=$row['ru'];
	}
	
	//Unregistered Users
	$sql="select count(*) as uu FROM user LEFT JOIN subscription ON subscription.cid = user.cid WHERE subscription.cid IS NULL";
	$res=mysqli_query($conn,$sql);
	while ($row = $res->fetch_array()) {
		$uu=$row['uu'];
	}
?>

<!DOCTYPE HTML>
<!--<h1> Books & User Details at a Glance! </h1> </br></br></br>-->
<div>
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "eBook Site Statistics"
	},
	axisY: {
		title: "Total"
	},
	data: [{        
		type: "column",  
		showInLegend: true, 
		legendMarkerColor: "grey",
		legendText: "Category",
		dataPoints: [      
			{ y: <?php echo $fc; ?>,  label: "No. of Books" },
			{ y: <?php echo $fd; ?>,  label: "No. of Downloads" },
			{ y: <?php echo $fv; ?>,  label: "No. of Views" },
			{ y: <?php echo $tu; ?>, label: "No. of Users" },
			{ y: <?php echo $ru; ?>, label: "No. of Subscribed Users " },
			{ y: <?php echo $uu; ?>, label: "No. of Unsubscribed Users" },
		]
	}]
});
chart.render();

}
</script>
</div>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
		</section>
	</div>
</div>
</div>
<!-- END MAIN PANEL -->

</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<!-- ==========================CONTENT ENDS HERE ========================== -->

<!-- PAGE FOOTER -->
<?php
	include("inc/footer.php");
?>
<!-- END PAGE FOOTER -->

<?php 
	//include required scripts
	include("inc/scripts.php"); 
?>
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/datatables/dataTables.colVis.min.js"></script>
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/datatables/dataTables.tableTools.min.js"></script>
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/morris/raphael.min.js"></script>
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/morris/morris.min.js"></script>

<script type="text/javascript">

</script>