<?php
require_once("inc/lock.php");
require_once("inc/init.php");
require_once("inc/config.ui.php");
$page_title = "View Books";
$page_css[] = "your_style.css";
include("inc/header.php");
include("inc/nav.php");
?>

<div id="content">
		<div class="row">
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-10">
				<h1 class="page-title txt-color-blueDark">&emsp&emsp&ems Select Your Subscription Pack: </h1>
					<img src="img\Banner1.jpg" style="position:absolute; left:350px; top:100px;" > </img>
					<img src="img\Banner2.jpg" style="position:absolute; left:850px; top:100px;" > </img>
				  <form action="payment.php" method="post">
					<input type ="radio" name="pack" value="499.00" style="position:absolute; left:350px; top:400px;"  > </br>
					<label style="position:absolute; left:380px; top:400px;"> Select 499 Pack </label>
					<input type ="radio" name="pack" value="999.00" style="position:absolute; left:850px; top:400px;"  > </br>
					<label style="position:absolute; left:880px; top:400px;"> Select 999 Pack </label>
					<input type="submit" value="Buy Now!!" style="position:absolute; left:720px; top:480px;">
				  </form>
			</div>
		</div>
<div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
include("inc/footer.php");
?>