<?php
require_once("inc/lock.php");
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
</br></br></br></br></br></br>

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
<!-- mobile -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body">
								<section>
									<div class="wizard">
										<div class="wizard-inner">
											<ul class="nav nav-tabs" role="tablist">
												<li role="presentation" class="active">
													<a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
														
													</a>
												</li>

												<li role="presentation" class="disabled">
													<a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
														
													</a>
												</li>
												<li role="presentation" class="disabled">
													<a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
														
													</a>
												</li>
												<li role="presentation" class="disabled">
													<a href="#step4" data-toggle="tab" aria-controls="step4" role="tab" title="Step 4">
														
													</a>
												</li>
												<li role="presentation" class="disabled">
													<a href="#step5" data-toggle="tab" aria-controls="step5" role="tab" title="Step 5">
														
													</a>
												</li>
												<li role="presentation" class="disabled">
													<a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
														
													</a>
												</li>
											</ul>
										</div>

										<form role="form">
											<div class="tab-content">
												<div class="tab-pane active" role="tabpanel" id="step1">
													<div class="mobile-grids">
														<div class="mobile-left text-center">
															<img src="images/mobile.png" alt="" />
														</div>
														<div class="mobile-right">
															<h4>Enter your mobile number</h4>
															<label>+91</label><input type="text" class="mobile-text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" required="">
														</div>
														
													</div>
													<ul class="list-inline pull-right">
														<li><button type="button" class="mob-btn btn btn-primary next-step">Next</button></li>
													</ul>
												</div>
												<div class="tab-pane" role="tabpanel" id="step2">
													<div class="mobile-grids">
														<div class="mobile-left text-center">
															<img src="images/mobile.png" alt="" />
														</div>
														<div class="mobile-right ">
															<h4>Prepaid or Postpaid?</h4>
															<div class="radio-btns">
																<div class="swit">								
																	<div class="check_box"> 
																		<img src="images/card.png" alt="" />
																		<div class="clearfix"></div>
																		<div class="radio"> 
																			<label>
																				<input type="radio" name="radio" checked=""><i></i>Prepaid
																			</label> 
																		</div>
																	</div>
																	<div class="check_box"> 
																		<img src="images/card.png" alt="" />
																		<div class="clearfix"></div>
																		<div class="radio"> 
																			<label>
																				<input type="radio" name="radio"><i></i>Postpaid
																			</label> 
																		</div>
																	</div>
																</div>
															</div>
														</div>
														
													</div>
													<ul class="list-inline pull-right">
														<li><button type="button" class="mob-btn btn btn-default prev-step">Previous</button></li>
														<li><button type="button" class="mob-btn btn btn-primary next-step">Next</button></li>
													</ul>
												</div>
												<div class="tab-pane" role="tabpanel" id="step3">
													<div class="mobile-grids">
														<div class="mobile-left text-center">
															<img src="images/mobile.png" alt="" />
														</div>
														<div class="mobile-right ">
															<h4>Which operator?</h4>
															<ul class="rchge-icons">
																<li><a href="#">Airtel</a></li>
																<li><a href="#">Aircel</a></li>
																<li><a href="#">Bsnl</a></li>
																<li><a href="#">Idea</a></li>
																<li><a href="#">Vodafone</a></li>
																<li><a href="#">Reliance</a></li>
																<li><a href="#">Uninor</a></li>
															</ul>
															<div class="section_room">
																<select id="country" onchange="change_country(this.value)" class="frm-field required">
																	<option value="null">Airtel</option>
																	<option value="null">Aircel</option>         
																	<option value="AX">Bsnl</option>
																	<option value="AX">Idea</option>
																	<option value="AX">Tata Docomo</option>
																	<option value="AX">Reliance</option>
																	<option value="AX">Tata Indicom</option>
																	<option value="AX">Uninor</option>
																	<option value="AX">Vodafone</option>
																	<option value="AX">MTS</option>
																</select>
															</div>	
														</div>
														
													</div>
													<ul class="list-inline pull-right">
														<li><button type="button" class="mob-btn btn btn-default prev-step">Previous</button></li>
														<li><button type="button" class="mob-btn btn btn-primary btn-info-full next-step">Next</button></li>
													</ul>
												</div>
												<div class="tab-pane" role="tabpanel" id="step4">
													<div class="mobile-grids">
														<div class="mobile-left text-center">
															<img src="images/mobile.png" alt="" />
														</div>
														<div class="mobile-right ">
															<h4>Which Circle?</h4>
															<div class="map-image">
																<img src="images/map.png" alt="" />
															</div>
															<div class="section_room">
																<select id="country" onchange="change_country(this.value)" class="frm-field required">
																	<option value="null">Andhra Pradesh</option>
																	<option value="null">Assam</option>         
																	<option value="AX">Bihar</option>
																	<option value="AX">Chennai</option>
																	<option value="AX">Delhi</option>
																	<option value="AX">Gujarat</option>
																	<option value="AX">Haryana </option>
																	<option value="AX">Himachal Pradesh</option>
																	<option value="AX">Karnataka</option>
																	<option value="AX">Madhya Pradesh</option>
																	<option value="AX">Mumbai</option>
																	<option value="AX">Tamil Nadu</option>
																	<option value="AX">Uttar Pradesh</option>
																</select>
															</div>	
														</div>
														
													</div>
													<ul class="list-inline pull-right">
														<li><button type="button" class="mob-btn btn btn-default prev-step">Previous</button></li>
														<li><button type="button" class="mob-btn btn btn-primary btn-info-full next-step">Next</button></li>
													</ul>
												</div>
												<div class="tab-pane" role="tabpanel" id="step5">
													<div class="mobile-grids">
														<div class="mobile-left text-center">
															<img src="images/mobile.png" alt="" />
														</div>
														<div class="mobile-right ">
															<h4>How Much To Recharge?</h4>
															<div class="mobile-rchge">
																<input type="text" value="10" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '10';}" required="">	
															</div>
															<div class="mobile-rchge">
																<a href="single.html">VIEW PLANS</a>
															</div>
															<div class="clearfix"></div>
														</div>
													</div>
													<ul class="list-inline pull-right">
														<li><button type="button" class="mob-btn btn btn-default prev-step">Previous</button></li>
														<li><button type="button" class="mob-btn btn btn-primary btn-info-full" data-dismiss="modal">Finish</button></li>
													</ul>
												</div>	
												<div class="clearfix"></div>
											</div>
										</form>
									</div>
								</section>
						</div>
					</div>
				</div>
			</div>
			<!-- //mobile -->
			<!-- Dth -->
			<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body">
								<section>
									<div class="wizard">
										<div class="wizard-inner">
											<ul class="nav nav-tabs" role="tablist">
												<li role="presentation" class="active">
													<a href="#step6" data-toggle="tab" aria-controls="step6" role="tab" title="Step 6">
														<span class="round-tab">
															<i class="glyphicon glyphicon-folder-open"></i>
														</span>
													</a>
												</li>
												<li role="presentation" class="disabled">
													<a href="#step7" data-toggle="tab" aria-controls="step7" role="tab" title="Step 7">
														<span class="round-tab">
															<i class="glyphicon glyphicon-pencil"></i>
														</span>
													</a>
												</li>
												<li role="presentation" class="disabled">
													<a href="#step8" data-toggle="tab" aria-controls="step8" role="tab" title="Step 8">
														<span class="round-tab">
															<i class="glyphicon glyphicon-picture"></i>
														</span>
													</a>
												</li>
												
											</ul>
										</div>
										<form role="form">
											<div class="tab-content">
												<div class="tab-pane active" role="tabpanel" id="step6">
													<div class="mobile-grids">
														<div class="mobile-left text-center">
															<img src="images/dth.png" alt="" />
														</div>
														<div class="mobile-right ">
															<h4>Pay your DTH bill. Which operator?</h4>
															<div class="section_room">
																<select id="country" onchange="change_country(this.value)" class="frm-field required">
																	<option value="null">Select DTH Operator</option>
																	<option value="null">Dish TV</option>  
																	<option value="null">Sun Direct</option> 
																	<option value="AX">Reliance</option>
																	<option value="AX">Airtel</option>
																</select>
															</div>
														</div>
													</div>
													<ul class="list-inline pull-right">
														<li><button type="button" class="mob-btn btn btn-primary next-step">Next</button></li>
													</ul>
												</div>
												<div class="tab-pane" role="tabpanel" id="step7">
													<div class="mobile-grids">
														<div class="mobile-left text-center">
															<img src="images/dth.png" alt="" />
														</div>
														<div class="mobile-right">
															<h4>What's your DTH Number?</h4>
															<div class="dth-rchge">
																<input type="text" value="Enter Smart Card Number" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Smart Card Number';}" required="">	
															</div>
														</div>
													</div>
													<ul class="list-inline pull-right">
														<li><button type="button" class="mob-btn btn btn-default prev-step">Previous</button></li>
														<li><button type="button" class="mob-btn btn btn-primary next-step">Next</button></li>
													</ul>
												</div>
												<div class="tab-pane" role="tabpanel" id="step8">
													<div class="mobile-grids">
														<div class="mobile-left text-center">
															<img src="images/dth.png" alt="" />
														</div>
														<div class="mobile-right ">
															<h4>How Much To Recharge?</h4>
															<div class="dth-rchge">
																<input type="text" value="100" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '100';}" required="">	
															</div>
														</div>
													</div>
													<ul class="list-inline pull-right">
														<li><button type="button" class="mob-btn btn btn-default prev-step">Previous</button></li>
														<li><button type="button" class="mob-btn btn btn-primary btn-info-full" data-dismiss="modal">Finish</button></li>
													</ul>
												</div>
												<div class="clearfix"></div>
											</div>
										</form>
									</div>
								</section>
						</div>
					</div>
				</div>
			</div>
			<!-- //Dth -->
			<!-- datacard -->
			<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body">
								<section>
									<div class="wizard">
										<div class="wizard-inner">
											<ul class="nav nav-tabs" role="tablist">
												<li role="presentation" class="active">
													<a href="#step9" data-toggle="tab" aria-controls="step9" role="tab" title="Step 9">
														<span class="round-tab">
															<i class="glyphicon glyphicon-folder-open"></i>
														</span>
													</a>
												</li>
												<li role="presentation" class="disabled">
													<a href="#step10" data-toggle="tab" aria-controls="step10" role="tab" title="Step 10">
														<span class="round-tab">
															<i class="glyphicon glyphicon-pencil"></i>
														</span>
													</a>
												</li>
												<li role="presentation" class="disabled">
													<a href="#step11" data-toggle="tab" aria-controls="step11" role="tab" title="Step 11">
														<span class="round-tab">
															<i class="glyphicon glyphicon-picture"></i>
														</span>
													</a>
												</li>
												
											</ul>
										</div>
										<form role="form">
											<div class="tab-content">
												<div class="tab-pane active" role="tabpanel" id="step9">
													<div class="mobile-grids">
														<div class="mobile-left text-center">
															<img src="images/usb.png" alt="" />
														</div>
														<div class="mobile-right ">
															<h4>Enter your data card number</h4>
															<label>+91</label><input type="text" class="mobile-text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" required="">
															
														</div>
													</div>
													<ul class="list-inline pull-right">
														<li><button type="button" class="mob-btn btn btn-primary next-step">Next</button></li>
													</ul>
												</div>
												<div class="tab-pane" role="tabpanel" id="step10">
													<div class="mobile-grids">
														<div class="mobile-left text-center">
															<img src="images/usb.png" alt="" />
														</div>
														<div class="mobile-right ">
															<h4>Which operator?</h4>
															<ul class="rchge-icons">
																<li><a href="#">Airtel</a></li>
																<li><a href="#">Aircel</a></li>
																<li><a href="#">Bsnl</a></li>
																<li><a href="#">Idea</a></li>
																<li><a href="#">Vodafone</a></li>
																<li><a href="#">Reliance</a></li>
																<li><a href="#">Uninor</a></li>
															</ul>
															<div class="section_room">
																<select id="country" onchange="change_country(this.value)" class="frm-field required">
																	<option value="null">Airtel</option>
																	<option value="null">Aircel</option>         
																	<option value="AX">Bsnl</option>
																	<option value="AX">Idea</option>
																	<option value="AX">Tata Docomo</option>
																	<option value="AX">Reliance</option>
																	<option value="AX">Tata Indicom</option>
																	<option value="AX">Uninor</option>
																	<option value="AX">Vodafone</option>
																	<option value="AX">MTS</option>
																</select>
															</div>	
														</div>
														
													</div>
													<ul class="list-inline pull-right">
														<li><button type="button" class="mob-btn btn btn-default prev-step">Previous</button></li>
														<li><button type="button" class="mob-btn btn btn-primary next-step">Next</button></li>
													</ul>
												</div>
												<div class="tab-pane" role="tabpanel" id="step11">
													<div class="mobile-grids">
														<div class="mobile-left text-center">
															<img src="images/usb.png" alt="" />
														</div>
														<div class="mobile-right ">
															<h4>How much to recharge?</h4>
															<div class="dth-rchge">
																<input type="text" value="100" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '100';}" required="">	
															</div>
														</div>
													</div>
													<ul class="list-inline pull-right">
														<li><button type="button" class="mob-btn btn btn-default prev-step">Previous</button></li>
														<li><button type="button" class="mob-btn btn btn-primary btn-info-full" data-dismiss="modal">Finish</button></li>
													</ul>
												</div>
												<div class="clearfix"></div>
											</div>
										</form>
									</div>
								</section>
						</div>
					</div>
				</div>
			</div>
			<!-- //datacard -->
			<!-- landline -->
			<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body">
								<section>
									<div class="wizard">
										<div class="wizard-inner">
											<ul class="nav nav-tabs" role="tablist">
												<li role="presentation" class="active">
													<a href="#step12" data-toggle="tab" aria-controls="step12" role="tab" title="Step 12">
														<span class="round-tab">
															<i class="glyphicon glyphicon-folder-open"></i>
														</span>
													</a>
												</li>
												<li role="presentation" class="disabled">
													<a href="#step13" data-toggle="tab" aria-controls="step13" role="tab" title="Step 13">
														<span class="round-tab">
															<i class="glyphicon glyphicon-pencil"></i>
														</span>
													</a>
												</li>
												<li role="presentation" class="disabled">
													<a href="#step14" data-toggle="tab" aria-controls="step14" role="tab" title="Step 14">
														<span class="round-tab">
															<i class="glyphicon glyphicon-picture"></i>
														</span>
													</a>
												</li>
												
											</ul>
										</div>
										<form role="form">
											<div class="tab-content">
												<div class="tab-pane active" role="tabpanel" id="step12">
													<div class="mobile-grids">
														<div class="mobile-left text-center">
															<img src="images/landline.png" alt="" />
														</div>
														<div class="mobile-right">
															<h4>Pay your landline bill.Which Provider?</h4>
															<div class="section_room">
																<select id="country" onchange="change_country(this.value)" class="frm-field required">
																	<option value="null">Enter Landline Provider Name</option>  
																	<option value="null">Airtel Landline</option>       
																	<option value="AX">Bsnl Landline</option>
																	<option value="AX">MTNL Delhi</option>
																</select>
															</div>	
														</div>
													</div>
													<ul class="list-inline pull-right">
														<li><button type="button" class="mob-btn btn btn-primary next-step">Next</button></li>
													</ul>
												</div>
												<div class="tab-pane" role="tabpanel" id="step13">
													<div class="mobile-grids">
														<div class="mobile-left text-center">
															<img src="images/landline.png" alt="" />
														</div>
														<div class="mobile-right">
															<h4>Telephone Number</h4>
															<div class="dth-rchge">
																<input type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" required="">
																<p>Please enter a valid  telephone number with std code.</p>
															</div>
														</div>
													</div>
													<ul class="list-inline pull-right">
														<li><button type="button" class="mob-btn btn btn-default prev-step">Previous</button></li>
														<li><button type="button" class="mob-btn btn btn-primary next-step">Next</button></li>
													</ul>
												</div>
												<div class="tab-pane" role="tabpanel" id="step14">
													<div class="mobile-grids">
														<div class="mobile-left text-center">
															<img src="images/landline.png" alt="" />
														</div>
														<div class="mobile-right ">
															<h4>How much did you wish to pay?</h4>
															<div class="dth-rchge">
																<input type="text" value="100" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '100';}" required="">	
																<p>Please enter an amount between Rs.10 and Rs.1000.</p>
															</div>
														</div>
													</div>
													<ul class="list-inline pull-right">
														<li><button type="button" class="mob-btn btn btn-default prev-step">Previous</button></li>
														<li><button type="button" class="mob-btn btn btn-primary btn-info-full" data-dismiss="modal">Finish</button></li>
													</ul>
												</div>
												<div class="clearfix"></div>
											</div>
										</form>
									</div>
								</section>
						</div>
					</div>
				</div>
			</div>
			<!-- //landline -->
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
<!--Displays FileHirearchy-->

