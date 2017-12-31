<?php
	require_once("inc/lock.php");
?>
<html>
    <head>
        <title>View Books</title>
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
	<div id="content">
		<link rel="stylesheet" href="css/msgbox/style.css">
		<div class="row">
			<div class="col-xs-12 col-sm-15 col-md-15 col-lg-15">
				<h3 class="page-title txt-color-blueDark"> Genre: </h3>
		<div id="main">
		<?php
			$category=$_GET['category'];
			$disp=strtoupper($category);
			echo "<h3> $disp </h3>";
			echo "<hr>";
			include_once("dbconnect.php");
				$uname=$_SESSION["uname"];
				
				//selecting books belonging to particular category
				$sql2 = "SELECT * FROM fileupload where genre='$category'";
				$result = $conn->query($sql2);
				echo "<center> <table border='2'>";
					//echo "<tr> <th> Book ID </th> <th> Book Name </th> <th> Author </th> <th> Description </th> <th> Genre </th> <th> View Books </th> </tr>";
				if ($result->num_rows > 0) 
				{
					$count=6;
					while($row = $result->fetch_array()) 
					{ 
						echo "<td>";
						echo "<img src='".$row["img_path"]."' height='250px' width='250px'>";
						echo "<h3> Book ID : ".$row["book_id"]."</br> </h3>";
						echo "<h3> Book Name : ".$row["book_name"]."</br> </h3>";
						echo "<h3> Author &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    : ".$row["author"]."</br> </h3>";
						echo "<h3> Description&nbsp;&nbsp;: ".$row["description"]."</br> </h3>";
						//echo "<h3> Genre: ".$row["genre"]."</br> </h3>";
						echo "<a href='viewindividualbook.php?book_id=$count'> View </a>"; 
						echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"."<a href='downloadindividualbook.php?book_id=$count' target='index.php' style='pointer-events: none; cursor: default;'> Download </a>"."</br> </td>";
						$count=$count+1;	
						if($count%3==0)
							echo "<tr> </tr>";
					}
				}
				else
				{
					echo "&nbsp&nbsp&nbsp&nbsp"."No books listed in this category!!";
				}
				
				echo "</table> </center>";
				$conn->close();
		?>
		<tbody>
		</table>
		</div>
		</div>
		</div>
	</div>
</div>
</body>