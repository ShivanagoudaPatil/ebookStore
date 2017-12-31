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
<link href="css/button/style.css" rel="stylesheet"/>
</br>
<div> <h3 >Search Results</h3> </div>
<br/><br/><br/><br/>
<?php
			$ss=$_POST['search'];
			include_once("dbconnect.php");
				
				//selecting books belonging to particular category
				$sql2 = "Select * from fileupload where book_name like '%$ss%' or genre like '%$ss%' or author like '%$ss%'";
				$result = $conn->query($sql2);
				echo "<center> <table border='1'>";
					//echo "<tr> <th> Book ID </th> <th> Book Name </th> <th> Author </th> <th> Description </th> <th> Genre </th> <th> View Books </th> </tr>";
				if ($result->num_rows > 0) 
				{
					$break=0;
					while($row = $result->fetch_array()) 
					{ 
						$count=$row['book_id'];
						$img1="../web1/";
						$img2=$row["img_path"];
						$image=$img1.$img2;
						echo "<td>";
						echo "</br>";
						echo "<center><img src='".$image."' height='180px' width='180px'></center>";
						echo "<p style='color: #555268   ; font-size: 21px; font-family: Libre Baskerville, serif; line-height: 25px; text-shadow: 0 1px 1px #fff; padding-top: 20px;'> Book Name : ".$row["book_name"]."</br> </p>";
						echo "<p style='color: #555268  ; font-size: 21px; font-family: Libre Baskerville, serif; line-height: 25px; text-shadow: 0 1px 1px #fff; padding-top: 20px;'> Author &emsp;&emsp;: ".$row["author"]."</br> </p>";
						echo "<p style='color: #555268  ; font-size: 21px; font-family: Libre Baskerville, serif; line-height: 25px; text-shadow: 0 1px 1px #fff; padding-top: 20px;'> Genre &nbsp;&emsp;&emsp;&nbsp;: ".$row["genre"]."</br> </p>";
						echo"</br>";
						$break=$break+1;
						/*echo "<a href='viewindividualbook.php?book_id=$count' class='button'>View</a>";
							echo "<a href='downloadindividualbook.php?book_id=$count' onclick='myFun($count)' class='button' target='index.php'> Download </a>"."</br> </td>";*/
						if($break%4==0)
							echo "<tr> </tr>";
					}
				}
				else
				{
					echo "&nbsp&nbsp&nbsp&nbsp"."No books match this keyword!!";
				}
				
				echo "</table> </center>";
				$conn->close();
		?>
		