<?php 
session_start();

echo $_SESSION["uname"];
?>
<?php session_start(); echo 'Hi '.$_SESSION["uname"].'!'; ?>