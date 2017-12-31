<?php
		include("dbconnect.php");
		
		$id=$_GET['book_id'];
		
        //download.php
		$sql2="delete from fileupload where book_id=$id";
		$conn->query($sql2);
			
		header('Location: viewbook.php');
?>