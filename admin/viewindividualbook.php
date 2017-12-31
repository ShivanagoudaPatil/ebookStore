<iframe width="100%" height="100%" src="<?php include("dbconnect.php");
		$id=$_GET['book_id'];
        //download.php
		$sql="select book_path from fileupload where book_id='$id'";
		$res=mysqli_query($conn,$sql);
		while ($row = $res->fetch_array()) {
			$file=$row['book_path'];
		}
		echo $file; ?>"> 
</iframe>