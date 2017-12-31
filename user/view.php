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
<!--style="background-color:#CAebf2"-->
<body >	

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
							<form>
								<input class="sb-search-input" placeholder="Enter your search item..." type="search" name="search" id="search">
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

<div class="products">
		<div class="container">
		<div class="col-md-4 products-left">
				<div class="categories">
					<h2>Genre</h2>
					<ul class="cate">
					<u>	<li><a href="view1.php?category=comedy"> <i class="fa fa-arrow-right" aria-hidden="true"></i>Comedy</a></li><u>
						<li><a href="view1.php?category=drama"> <i class="fa fa-arrow-right" aria-hidden="true"></i>Drama</a></li>
						<li><a href="view1.php?category=fantasy"> <i class="fa fa-arrow-right" aria-hidden="true"></i>Fantasy</a></li>
						<li><a href="view1.php?category=horror"> <i class="fa fa-arrow-right" aria-hidden="true"></i>Horror</a></li>
						<li><a href="view1.php?category=mythology"> <i class="fa fa-arrow-right" aria-hidden="true"></i>Mythology</a></li>
						<li><a href="view1.php?category=romance"> <i class="fa fa-arrow-right" aria-hidden="true"></i>Romance</a> </li>
						<li><a href="view1.php?category=satire"> <i class="fa fa-arrow-right" aria-hidden="true"></i>Satire</a> </li>
						<li><a href="view1.php?category=sifi"> <i class="fa fa-arrow-right" aria-hidden="true"></i>SiFi</a></li>
					</ul>
		<section id="widget-grid" class="">
		</section>
		</div>
	</div>
	</div>
</div>


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