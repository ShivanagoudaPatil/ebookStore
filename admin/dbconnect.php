<?php
	$conn = mysqli_connect("localhost", "root", "", "book_store");

	if($conn->connect_error) {
		die("connect_error".$conn->connect_error);
	}
?>