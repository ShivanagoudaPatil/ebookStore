<?php

// defined("DB_HOST") ? null : define("DB_HOST", "localhost");
// defined("DB_USER") ? null : define("DB_USER", "root");
// defined("DB_PASSWORD") ? null : define("DB_PASSWORD", "");
// defined("DB_NAME") ? null : define("DB_NAME", "kmims");

$servername = "localhost";
$mysql_user = "root";
$mysql_password = "root";
$mysql_database = "auction";

// Create connection
$conn = new mysqli($servername, $mysql_user, $mysql_password, $mysql_database);
// Check connection
if ($conn->connect_errno) {
    die("Connection failed: " . $conn->mysqli_connect_error());
} 

?>