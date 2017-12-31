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
<!--Same-->
<div class="products">
		<div class="container">
		<div class="col-md-4 products-left">
				<div class="categories">
					<h2>Genre</h2>
					<ul class="cate">
					<u>	<li><a href="view1.php?category=comedy"> <i class="fa fa-arrow-right" aria-hidden="true"></i>Comedy</a></li><u>
						<li><a href="view1.php?category=drama"> <i class="fa fa-arrow-right" aria-hidden="true"></i>Drama</a></li>
						<li><a href="view1.php?category=romance"> <i class="fa fa-arrow-right" aria-hidden="true"></i>Romance</a></li>
						<li><a href="view1.php?category=horror"> <i class="fa fa-arrow-right" aria-hidden="true"></i>Horror</a></li>
						<li><a href="view1.php?category=mythology"> <i class="fa fa-arrow-right" aria-hidden="true"></i>Mythology</a></li>
						<li><a href="view1.php?category=fantasy"> <i class="fa fa-arrow-right" aria-hidden="true"></i>Fantasy</a> </li>
						<li><a href="view1.php?category=satire"> <i class="fa fa-arrow-right" aria-hidden="true"></i>Satire</a> </li>
						<li><a href="view1.php?category=sifi"> <i class="fa fa-arrow-right" aria-hidden="true"></i>SiFi</a></li>
					</ul>
		<section id="widget-grid" class="">
		</section>
		</div>
	</div>
	</div>
</div>
<link href="css/button/style.css" rel="stylesheet"/>
<?php
			$category=$_GET['category'];
			$disp=strtoupper($category);
			echo "<div> <h3 style='position:absolute; left:510px; top:150px; font-size: 26px; font-weight: 500; color: #312F2E; margin: 0 0 24px;'> Category: $disp </h3> </div>";
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
				$sql2 = "SELECT * FROM fileupload where genre='$category'"; ?>
				<div></br></br></br></br></br></br></br></div>
				<?php
				$result = $conn->query($sql2);
				echo "<table style='position:absolute; left:510px; top:180px;' width='820px'>";
					//echo "<tr> <th> Book ID </th> <th> Book Name </th> <th> Author </th> <th> Description </th> <th> Genre </th> <th> View Books </th> </tr>";
				if ($result->num_rows > 0) 
				{
					while($row = $result->fetch_array()) 
					{
						$count=$row["book_id"];
						echo  "<td style='padding-top: 60px;'>";
						$img1="../admin/";
						$img2=$row["img_path"];
						$image=$img1.$img2;
						echo "<center> <img src='$image' height=250px width=240px> </center>";
						
						//echo "Book ID: ".$row["book_id"]."</br>";
						echo "<p style='color: #555268   ; font-size: 21px; font-family: Libre Baskerville, serif; line-height: 25px; text-shadow: 0 1px 1px #fff; padding-top: 20px;'> Book Name : ".$row["book_name"]."</br> </p>";
						echo "<p style='color: #555268  ; font-size: 21px; font-family: Libre Baskerville, serif; line-height: 25px; text-shadow: 0 1px 1px #fff; padding-top: 20px;'> Author &emsp;&emsp;: ".$row["author"]."</br> </p>";
						echo "<p style='color: #555268  ; font-size: 21px; font-family: Libre Baskerville, serif; line-height: 25px; text-shadow: 0 1px 1px #fff; padding-top: 20px;'> Description &nbsp;: ".$row["description"]."</br> </p>";
						echo"</br>";
						
						if($tdays>2)
						 {
							echo "<a href='viewindividualbook.php?book_id=$count' class='button'>View</a>";
							echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"."<a href='downloadindividualbook.php?book_id=$count' class='button' target='index.php' style='pointer-events: none; cursor: default;'> Download </a>"."</br> </td>";
							//$count=$count+1;	
							//if($count%3==0)
								echo "<tr> </tr> </hr>";
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
						<a href="#popup1" class='button'>View</a>
						
						<a href="#popup1" class='button'> Download </a>
						<?php 
							$count=$count+1;	
								//if($count%3==0)
								echo "<tr> </tr> </hr>";
						}
						 else
						{
							echo "<a href='viewindividualbook.php?book_id=$count' class='button'>View</a>";
							
							if($downloads<$maxdownloads){
								echo "<a href='downloadindividualbook.php?book_id=$count' onclick='myFun($count)' class='button' target='index.php'> Download </a>"."</br> </td>";
								//check download limit
								$dq="select downloads, maxdownloads from subscription where cid='$uid'";
								$res=$conn->query($dq);
								while ($row = $res->fetch_array()) {
									$downloads=$row['downloads'];
									$maxdownloads=$row['maxdownloads'];
								}
								//$count=$count+1;	
								//if($count%3==0)
								echo "<tr> </tr> </hr>";
							}
							elseif($downloads>=$maxdownloads)
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
							<a href="#popup1" class='button'> Download </a>
							<?php 
							//$count=$count+1;	
							//if($count%3==0)
								echo "<tr> </tr> </hr>";
							}
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
	<!--To put downloads-->
		</div>
	</div>
</div>
</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>

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

			<!-- //signup -->
<!-- for bootstrap working -->
		<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
</body>
</html>
<!--Displays FileHirearchy-->

