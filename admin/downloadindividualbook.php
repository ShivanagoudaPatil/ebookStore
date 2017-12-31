<?php
		session_start();
		include("dbconnect.php");
		$user=$_SESSION["uname"];
		
		// Extrating Customer ID
		$sql1="select cid from user where name='$user'";
		$res=mysqli_query($conn,$sql1);
		while ($row = $res->fetch_array()) {
			$uid=$row['cid'];
		}

		$id=$_GET['book_id'];
		
        //download.php
		$sql2="select book_path from fileupload where book_id='$id'";
		$res=mysqli_query($conn,$sql2);
		while ($row = $res->fetch_array()) {
			$file=$row['book_path'];
		}
		
		//Extrating no. of User Downloads 
		$sql3="select downloads from subscription where cid='$uid'";
		$result=mysqli_query($conn,$sql3);
		while ($row = $result->fetch_array()) {
			$userdownloads=$row['downloads'];
		}
		$userdownloads=$userdownloads+1;
		
		//Updating no. of User Downloads
		$sql4="UPDATE subscription SET downloads = '$userdownloads' WHERE cid = '$uid'";
		$conn->query($sql4);
		
		//Extrating no. of Book Downloads 
		$sql4="select downloads from ratings where book_id='$id'";
		$result=mysqli_query($conn,$sql4);
		while ($row = $result->fetch_array()) {
			$bookdownloads=$row['downloads'];
		}
			
		//echo "BookDownloads: $bookdownloads";
		$bookdownloads=$bookdownloads+1;
		//echo "BookDownloads: $bookdownloads";
		//Updating no. of Book Downloads
		$sql5="UPDATE ratings SET downloads = '$bookdownloads' WHERE book_id = '$id'";
		$conn->query($sql5);
		
		//Extrating File Name
		$newname=substr($file,15);
		
		//Mime Type
		header("Content-type:application/pdf");
		
		//Naming Downloaded File
		header("Content-Disposition:attachment;filename='$newname'");
		
		//The PDF source readfile() function reads a file and writes it to the output buffer	
		readfile($file);
?>