<?php
	require_once('inc/lock.php');
	include('dbconnect.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>eBook Store</title>

<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
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
					<li><a href="profile.php">View Profile</a></li>
					<li><a href="logout.php">Log Out</a></li>
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
<?php
$uname=$_SESSION["uname"];

//extracting uid
$sql="select cid from user where name='$uname'";
$conn->query($sql);
$res=mysqli_query($conn,$sql);
while ($row = $res->fetch_array()) {
	$uid=$row['cid'];
}

//checking for subscription
$query = "SELECT COUNT(*) as total FROM subscription where cid='$uid'";
$results = mysqli_query($conn,$query);
$value=mysqli_fetch_assoc($results) ;
$num_rows=$value['total'];

//checking for enddate
if($num_rows>=1)
{	
	$sql1="select subend from subscription where cid='$uid'";
	$res=mysqli_query($conn,$sql1);
	while ($row = $res->fetch_array()) {
		$subend=$row['subend'];
	}
	$curdate=Date('Y-m-d');

	$date1 = new DateTime($curdate);
	$date2 = new DateTime($subend);

	$diff = $date2->diff($date1)->format("%a");
	//echo $diff;
	if($diff<=3 && $diff>=1) 
	{
		echo '<script language="javascript">';
		echo 'alert("You have less than 3 days remaining. Subscribe to a new Pack!")';
		echo '</script>';
	}
	elseif($diff<=0)
	{
		$sql="delete from subscription where cid='$uid'";
		$conn->query($sql);
	}
}
?>
</br>

<div class="content-bottom">
		<div class="btm-grids">
			<div class="col-md-4 btm-grid back-col1 text-center">
			</div>
			<div class="col-md-4 btm-grid btm-wid">
				<h3> <?php echo "hi ".$_SESSION['uname']."!"; ?> </h3>
				<p>Welcome to eBooks! Happy Reading :).</p>
			</div>
			<div class="col-md-4 btm-grid back-col2 text-center">
			</div>
			<div class="clearfix"></div>
		</div>
</div>
	</div>
	</br></br></br></br></br></br></br></br>
<!--Stats-->
<link href="css/data/style.css" rel="stylesheet">
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Table Style</title>
	<meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">
</head>

<body>
<div style="position:absolute; left:50px; top:380px;"> <h3 >Top Views of the Month</h3> </div>
<div class="table-title">
</div>
	<table class="table-fill" style="position:absolute;left:0px;top:440px;">
		<thead>
			<tr>
			<th class="text-left">Book Name</th>
			<th class="text-left">Author</th>
			<th class="text-left">No. of Downloads</th>
			</tr>
		</thead>
			<tbody class="table-hover">
			<?php
				$s="SELECT b.book_name, b.author, r.downloads from ratings r, fileupload b where r.book_id=b.book_id ORDER BY downloads DESC limit 5";
				$result = $conn->query($s);
				if ($result->num_rows > 0) 
				{
					while($row = $result->fetch_array()) 
					{ 
						echo "<tr>";
							echo "<td class='text-left'>".$row["book_name"]."</td>";
							echo "<td class='text-left'>".$row["author"]."</td>";
							echo "<td class='text-left'>".$row["downloads"]."</td>";
						echo "</tr>";
					}
				}
			?>
			</tbody>
	</table>
	</br></br></br></br></br></br></br></br></br></br></br></br>
</br>
<div style="position:absolute; left:850px; top:380px;"> <h3 >Top Downloads of the Month</h3> </div> </br>
<div class="table-title">

</div>
	<table class="table-filll" style="position:absolute;left:3px;top:440px;">
		<thead>
			<tr>
			<th class="text-left">Book Name</th>
			<th class="text-left">Author</th>
			<th class="text-left">No. of Views</th>
			</tr>
		</thead>
			<tbody class="table-hover">
			<?php
				$s="SELECT b.book_name, b.author, r.views from ratings r, fileupload b where r.book_id=b.book_id ORDER BY views DESC limit 5";
				$result = $conn->query($s);
				if ($result->num_rows > 0) 
				{
					while($row = $result->fetch_array()) 
					{ 
						echo "<tr>";
						echo "<td class='text-left'>".$row["book_name"]."</td>";
						echo "<td class='text-left'>".$row["author"]."</td>";
						echo "<td class='text-left'>".$row["views"]."</td>";
						echo "</tr>";
					}
				}
			?>
			</tbody>
	</table>
	
</body>







</br></br></br></br></br></br></br></br></br></br></br></br></br>
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

			<!-- login -->
			<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body modal-spa">
							<div class="login-grids">
								<div class="login">
									<div class="login-left">
										<ul>
											<li><a class="fb" href="#"><i></i>Sign in with Facebook</a></li>
											<li><a class="goog" href="#"><i></i>Sign in with Google</a></li>
											<li><a class="linkin" href="#"><i></i>Sign in with Linkedin</a></li>
										</ul>
									</div>
									<div class="login-right">
										<form>
											<h3>Signin with your account </h3>
											<input type="text" value="Enter your mobile number or Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter your mobile number or Email';}" required="">	
											<input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">	
											<h4><a href="#">Forgot password</a> / <a href="#">Create new password</a></h4>
											<div class="single-bottom">
												<input type="checkbox"  id="brand" value="">
												<label for="brand"><span></span>Remember Me.</label>
											</div>
											<input type="submit" value="SIGNIN" >
										</form>
									</div>
									<div class="clearfix"></div>								
								</div>
								<p>By logging in you agree to our <span>Terms and Conditions</span> and <span>Privacy Policy</span></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- //login -->
			<!-- signup -->
			<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body modal-spa">
							<div class="login-grids">
								<div class="login">
									<div class="login-left">
										<ul>
											<li><a class="fb" href="#"><i></i>Sign in with Facebook</a></li>
											<li><a class="goog" href="#"><i></i>Sign in with Google</a></li>
											<li><a class="linkin" href="#"><i></i>Sign in with Linkedin</a></li>
										</ul>
									</div>
									<div class="login-right">
										<form>
											<h3>Create your account </h3>
											<input type="text" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
											<input type="text" value="Mobile number" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Mobile number';}" required="">
											<input type="text" value="Email id" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email id';}" required="">	
											<input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">	
											
											<input type="submit" value="CREATE ACCOUNT" >
										</form>
									</div>
									<div class="clearfix"></div>								
								</div>
								<p>By logging in you agree to our <span>Terms and Conditions</span> and <span>Privacy Policy</span></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- //signup -->
<!-- for bootstrap working -->
		<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
</body>
</html>