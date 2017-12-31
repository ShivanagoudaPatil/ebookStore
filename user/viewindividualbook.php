<iframe width="100%" height="100%" src="<?php include("dbconnect.php");
		$id=$_GET['book_id'];
        
		//Update Views
		
		//Extrating no. of Book Views
		$sql4="select views from ratings where book_id='$id'";
		$result=mysqli_query($conn,$sql4);
		while ($row = $result->fetch_array()) {
			$bookviews=$row['views'];
		}
			
		//echo "BookDownloads: $bookdownloads";
		$bookviews=$bookviews+1;
		//echo "BookDownloads: $bookdownloads";
		
		//Updating no. of Book Downloads
		$sql5="UPDATE ratings SET views = '$bookviews' WHERE book_id = '$id'";
		$conn->query($sql5);
		
		//download.php
		
		$sql="select book_path from fileupload where book_id='$id'";
		$res=mysqli_query($conn,$sql);
		while ($row = $res->fetch_array()) {
			$file1="../web1/";
			$file2=$row["book_path"];
			$file=$file1.$file2;
		}
		
		
		echo $file; ?>"> 
</iframe>