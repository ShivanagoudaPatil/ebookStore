<?php
require_once("inc/lock.php");
require_once("inc/init.php");
require_once("inc/config.ui.php");
$page_title = "View Books";
$page_css[] = "your_style.css";
include("inc/header.php");
include("inc/nav.php");
?>
<html>
    <head>
        <title>paypal payments via credit card</title>
        <link rel="stylesheet" type="text/css" href="css/payment/style.css">
        <link rel="stylesheet" type="text/css" href="css/payment/loadding.css">
        <link rel="stylesheet" type="text/css" href="css/payment/popup-style.css">
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
					<center><h1>Submit a Request to Admin to Upload New Books</h1></center>
					<form action="requestquery.php" method="POST">
						<div id="container">
							<hr/>
							<marquee> Note: Admin takes 2-4 days to upload the new books! </marquee>
							<center> <h3>Fill up Book Title and Additional Description</h3></center>
							<table style="width:100%" >
								<tr>
									<td id="td-label">Book Title : </td>
									<td><input type="text" name="title" id="name" placeholder="Book Name"></td>		

								</tr>
								<tr>
									<td id="td-label">Description : </td>
									<td><input type="text" name="description" id="name" placeholder="Additional Description"></td>		

								</tr>
							</table> </br>
							<center> <input  style="  height: 5%; width: 10%;" type="submit" id="submit" name="DoDirectPaymentBtn" value="Submit"></center><br>
						</div>
					</form>
		</div> </center>
	</body>
</html>
<?php
include("inc/footer.php");
?>