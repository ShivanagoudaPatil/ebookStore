<?php
include('dbconnect.php');
session_start();
//require_once('../PPBootStrap.php');

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];

$curdate=date("Y-m-d");
$curtime=date("H:i:s");
$enddate=date("Y-m-d", strtotime($curdate. ' + 29 days'));

$user=$_SESSION["uname"];
		
$sql1="select cid from user where name='$user'";
$res=mysqli_query($conn,$sql1);
while ($row = $res->fetch_array()) {
	$uid=$row['cid'];
}

/*
 * shipping adress
 */

$Street1 = $_POST['address1'];
$CityName = $_POST['city'];
$StateOrProvince = $_POST['state'];
$PostalCode = $_POST['zip'];
$Country = $_POST['country'];
$Phone = $_POST['phone'];

$Total = $_POST['pcheck'];




	

$cardDetails= $_POST['creditCardNumber'];
$CreditCardType = $_POST['creditCardType'];
$ExpMonth = $_POST['expDateMonth'];
$ExpYear = $_POST['expDateYear'];
$CVV = $_POST['cvv2Number'];

$TransactionID = mt_rand(10000000, 99999999);


?>
    <html>
        <head>
            <title>paypal payments via credit card</title>
            <link rel="stylesheet" type="text/css" href="css/payment/new/style.css">
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
                <div class="success_main_heading"> 
                    <center><h1>Transaction Status</h1></center>
                </div>
                <div id="return">
                    <h2>Payment Status</h2>
                    <hr/>
                    <?php
						if($Total==299) {
							$sql="insert into subscription values('$TransactionID','$curdate','$enddate','$Total',0,150,$uid)";
						} else {
							$sql="insert into subscription values('$TransactionID','$curdate','$enddate','$Total',0,400,$uid)";
						}
						$conn->query($sql);
                        echo "<h3 id='success'>Payment Successful</h3>";
                        echo "<P>Amount - Rs. " . $Total."</P>";
                        echo "<P>Transaction ID -" . $TransactionID . "</P>";
						echo "<P>Date -" . $curdate . "</P>";
						echo "<P>Time -" . $curtime . "</P>";
                        echo "<div class='back_btn'><a  href='home.php' id= 'btn'><< Back </a></div>";
					?>
                </div>
			
            </div>
        </body>
    </html>
    <?php
?>
