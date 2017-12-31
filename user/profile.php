<?php
require_once("inc/lock.php");
include('dbconnect.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>eBook Store</title>

<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<link href="css/view/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/view/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/view/css/font-awesome.css" rel="stylesheet"> 
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Easy Recharge Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<!--fonts-->
<link href='//fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!--//fonts-->	
<!-- js -->

<script type="text/javascript" src="js/view/js/move-top.js"></script>
<script type="text/javascript" src="js/view/js/easing.js"></script>

<script type="text/javascript" src="js/jquery.min.js"></script>
<!-- js -->
								<script>
									$(document).ready(function () {
										//Initialize tooltips
										$('.nav-tabs > li a[title]').tooltip();
										
										//Wizard
										$('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

											var $target = $(e.target);
										
											if ($target.parent().hasClass('disabled')) {
												return false;
											}
										});

										$(".next-step").click(function (e) {

											var $active = $('.wizard .nav-tabs li.active');
											$active.next().removeClass('disabled');
											nextTab($active);

										});
										$(".prev-step").click(function (e) {

											var $active = $('.wizard .nav-tabs li.active');
											prevTab($active);

										});
									});

									function nextTab(elem) {
										$(elem).next().find('a[data-toggle="tab"]').click();
									}
									function prevTab(elem) {
										$(elem).prev().find('a[data-toggle="tab"]').click();
									}
								</script>
</head>
<body>

<div>
	<div class="header">	
			<div class="logo">
			   <h1><a href="home.php"><i><img src="images/cell.png" alt=" " /></i>ebook store</a></h1>
			</div>
			<div class="top-nav">
				<span class="menu"><img src="images/menu.png" alt=" " /></span>
				<ul>
					<li><a href="home.php">Home</a></li>
					<li><a href="viewbook.php">View Books</a></li>
					<li><a href="subscribe.php">Buy Subscription</a></li>
					<li><a href="request.php">Request Books</a></li>
					<li><a href="profile">View Profile</a></li>
					<li><a href="logout.php">Log Out</a></li>
				</ul>
				</ul>
						<!-- script-for-menu --> 
						 <script>
						   $( "span.menu" ).click(function() {
							 $( "ul.nav1" ).slideToggle( 300, function() {
							 // Animation complete.
							  });
							 });
						</script>
						<!-- /script-for-menu -->
			</div>
			<!-- start search-->
				   <div class="search-box">
					    <div id="sb-search" class="sb-search">
							<form action="searchbook.php" method="post">
								<input class="sb-search-input" placeholder="Enter your search item..." name="search" id="search" type="text">
								<input class="sb-search-submit" type="submit" value="">
								<span class="sb-icon-search"> </span>
							</form>
						</div>
				    </div>
					<!-- search-scripts -->
					<script src="js/classie.js"></script>
					<script src="js/uisearch.js"></script>
						<script>
							new UISearch( document.getElementById( 'sb-search' ) );
						</script>
				<!-- //search-scripts -->
				
			
			<div class="clearfix"> </div>
	</div>
</div>
<html>
    <head>
        <title>Profile</title>
        <link rel="stylesheet" type="text/css" href="css/payment/new/style.css">
        <link rel="stylesheet" type="text/css" href="css/payment/new/loadding.css">
        <link rel="stylesheet" type="text/css" href="css/payment/new/popup-style.css">
        <meta name="robots" content="noindex, nofollow">
        <script type="text/javascript">
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-43981329-1']);
            _gaq.push(['_trackPageview']);
            (function() {
                var ga = document.createElement('script');
                ga.type = 'text/javascript';
                ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(ga, s);
            })();
        </script>
    </head>
	
<?php
$flag=0;
$uname=$_SESSION["uname"];
//user name, phno, email
$sql1="select cid,name,phno,email from user where name='$uname'";
$result=$conn->query($sql1);
while ($row = $result->fetch_array()) {
	$uid=$row['cid'];
	$name=$row['name'];
	$phno=$row['phno'];
	$email=$row['email'];
}

$sql2="select * from subscription where cid='$uid'";
$result=$conn->query($sql2);
while ($row = $result->fetch_array()) {
	$substart=$row['substart'];
	$subend=$row['subend'];
	$subtype=$row['subtype'];
	$downloads=$row['downloads'];
	$maxdownloads=$row['maxdownloads'];
	$flag=1;
}

if($flag==1)
{
	$downloadsremaining=$maxdownloads-$downloads;
	if($downloadsremaining<1)
		$downloadsremaining=0;

	$curdate=Date('Y-m-d');

	$date1 = new DateTime($curdate);
	$date2 = new DateTime($subend);

	$diff = $date2->diff($date1)->format("%a");
?>

<html>
    <head>
        <title>User Information</title>
        <link rel="stylesheet" type="text/css" href="css/payment/new/style.css">
        <link rel="stylesheet" type="text/css" href="css/payment/new/loadding.css">
        <link rel="stylesheet" type="text/css" href="css/payment/new/popup-style.css">
        <meta name="robots" content="noindex, nofollow">
    </head>
    <body>
	<div id="main">
					<center><h1>User Information Section</h1></center>
					</br></br></br></br></br></br>
					<form style="position:absolute; left:350px; top:85px;" action="requestquery.php" method="POST">
					</br></br></br></br>	<div id="container">
						<h3>Profile Information at a Galance!</h3>
							<hr/>
							<table align="center" style="font-size: 18px;" >
								<tr>
									<b><sd id="sd-label">Name : </sd>
									<sd id="sd-label"> <?php echo $name; ?> </sd> <b>
								</tr>
								<hr>
								<tr>
									<sd id="sd-label">Mobile No. : </sd>
									<sd id="sd-label"> <?php echo $phno; ?> </sd>	
								</tr>
								<hr>
								<tr>
									<sd id="sd-label">Email-ID : </sd>
									<sd id="sd-label"> <?php echo $email; ?> </sd>	
								</tr>
								<hr>
								<tr>
									<sd id="sd-label">Subscription Pack : </sd>
									<sd id="sd-label"> <?php echo $subtype.' Pack'; ?> </sd>	
								</tr>
								<hr>
								<tr>
									<sd id="sd-label">Subscription Start Date : </sd>
									<sd id="sd-label"> <?php echo $substart; ?> </sd>	
								</tr>
								<hr>
								<tr>
									<sd id="sd-label">Subscrption End Date : </sd>
									<sd id="sd-label"> <?php echo $subend; ?> </sd>	
								</tr>
								<hr>
								<tr>
									<sd id="sd-label">No. of Downloads Remaining: </sd>
									<sd id="sd-label"> <?php echo $downloadsremaining; ?> </sd>	
								</tr>
								<hr>
								<tr>
									<sd id="sd-label">No. of Days Remaining: </sd>
									<sd id="sd-label"> <?php echo $diff; ?> </sd>	
								</tr>
								<hr>
								<tr>
									<sd id="sd-label">Total no. of Downloaded Files: </sd>
									<sd id="sd-label"> <?php echo $downloads; ?> </sd>	
								</tr>
								
							</table> </br>
						</div>
					</form>
		</div> 
<?php }	elseif($flag==0) {
	?>
	<div id="main">
					&nbsp;&nbsp;<center><h1>User Information Section</h1></center>
					</br></br></br></br></br></br>
					<form style="position:absolute; left:350px; top:85px;" action="requestquery.php" method="POST">
					</br></br></br></br>	<div id="container">
						<h3>Profile Information at a Galance!</h3>
							<hr/>
							<table align="center" style="font-size: 18px;" >
								<tr>
									<b><sd id="sd-label">Name : </sd>
									<sd id="sd-label"> <?php echo $name; ?> </sd> <b>
								</tr>
								<hr>
								<tr>
									<sd id="sd-label">Mobile No. : </sd>
									<sd id="sd-label"> <?php echo $phno; ?> </sd>	
								</tr>
								<hr>
								<tr>
									<sd id="sd-label">Email-ID : </sd>
									<sd id="sd-label"> <?php echo $email; ?> </sd>	
								</tr>
								<hr>
								<tr>
									<sd id="sd-label">Subscription Pack : </sd>
									<sd id="sd-label"> <?php echo 'NA'; ?> </sd>	
								</tr>
							</table>
						</form>
					</div>
<?php } ?>
	</body>
	<img src="images/user.png" height="300px" width="300px" style="position:absolute;left:800px;"/>
	</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
	<div class="footer">
	<div class="container">
		<h2><a href="index.html">eBook Store</a></h2>
		<p>© 2017 eBook Store. All Rights Reserved </p>
		<ul>
			<li><a class="face1" href="#"></a></li>
			<li><a class="face2"href="#"></a></li>
			<li><a class="face3" href="#"></a></li>
			<li><a class="face4" href="#"></a></li>
		</ul>
	</div>
</div>
</html>
