<?php
require_once("inc/lock.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>eBook Store</title>

<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/msgbox/style.css" rel="stylesheet">
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
    <body>
	<div id="main">
					<center><h1 style="font-family:Arial;">Submit a Request to Admin to Upload New Books</h1></center>
					<form action="requestquery.php" method="POST">
						<div id="container">
							<hr/>
							<marquee style="font-family:Arial;"> Note: Admin takes 2-4 days to upload the new books! </marquee>
							<center> <h3 style="font-family:Arial;">Fill up Book Title and Additional Description</h3></center>
							<br>
							<table style="width:110%" >
								<tr>
									<td id="td-label">Book Title : </td>
									<td><input type="text" name="title" id="name" placeholder="Book Name"></td>		
								</tr>
								<tr>
									<td id="td-label">Description : </td>
									<td><input type="text" name="description" id="name" placeholder="Additional Description"></td>		
								</tr>
							</table> </br>
							<center> <div >
								<input type="submit" style=" background-color: #48cfc1; font-size: 14px;
								font-family: 'Varela Round', sans-serif; padding: px;" value="Send Request" >
						</div></center><br>
						</div>
					</form>
		</div> </center>

				<div id="popup1" class="overlay">
					<div class="popup">
						<h2>Incorrect!</h2>
							<a class="close" href="index.php">&times;</a>
								<div class="content">
									Please enter correct username and password.
								</div>
					</div>
				</div>

		</body>
	</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
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
