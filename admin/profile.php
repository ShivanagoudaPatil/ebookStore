<?php
require_once("inc/lock.php");
include('dbconnect.php');
require_once("inc/init.php");
require_once("inc/config.ui.php");
$page_title = "View Books";
$page_css[] = "your_style.css";
include("inc/header.php");
include("inc/nav.php");

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
}
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
        <link rel="stylesheet" type="text/css" href="css/payment/style.css">
        <link rel="stylesheet" type="text/css" href="css/payment/loadding.css">
        <link rel="stylesheet" type="text/css" href="css/payment/popup-style.css">
        <meta name="robots" content="noindex, nofollow">
    </head>
    <body>
	<div id="main">
					&nbsp;&nbsp;<center><h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;User Information Section</h1></center>
					<form style="position:absolute; left:350px; top:85px;" action="requestquery.php" method="POST">
						<div id="container">
						<h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;All Profile Related Information at a Galance!</h3>
							<hr/>
							<table style="width:85%" >
								<tr>
									<sd id="sd-label">Name : </sd>
									<sd id="sd-label"> <?php echo $name; ?> </sd>
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
		</div> </center>
	</body>
</html>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
include("inc/footer.php");
?>