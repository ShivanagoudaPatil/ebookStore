<?php
include("dbconnect.php");
$name=$_POST['name'];
$author=$_POST['author'];
$description=$_POST['description'];
$genre=$_POST['genre'];
//PDF
$target_dir = "uploads/";
$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
//IMAGE
$upload_directory = "uploadsImages/";
//$UploadedFileName=$_FILES['UploadImage']['name'];
$TargetPath=$upload_directory.basename($_FILES["UploadImage"]["name"]);

$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image
/*if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}*/

// Check if file already exists
if (file_exists($target_file)) {
    $msg="Sorry, This file already exists! Please Slelect a new File.  ";
    echo "<script type='text/javascript'>alert('$msg');</script>";
    $uploadOk = 0;
}
// Check file size
/*if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}*/

// Allow certain file formats
if($imageFileType != "pdf") {
	$msg="Sorry, your file was not uploaded. Please Upload PDF Files Only!";
     echo "<script type='text/javascript'>alert('$msg');</script>";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file) && move_uploaded_file($_FILES["UploadImage"]["tmp_name"],$TargetPath)) {
	
	$sql="insert into fileupload(book_name,author,description,genre,book_path,img_path) values('$name','$author','$description','$genre','$target_file','$TargetPath')";
	$conn->query($sql);
	$msg="The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		echo "<script type='text/javascript'>alert('$msg');</script>";
		
	$sql="select book_id from fileupload where book_name='$name'";
	$conn->query($sql);
	$res=mysqli_query($conn,$sql);
	while ($row = $res->fetch_array()) {
		$id=$row['book_id'];
	}
	
	$sql="insert into ratings values($id,0,0)";
	$conn->query($sql);
	
    }else {
        $msg = "Error in uploading file. Please check the file again.";
		  echo "<script type='text/javascript'>alert('$msg');</script>";
    }

}


echo"<script> window.location.href = 'upload.php' ; </script>";
?>