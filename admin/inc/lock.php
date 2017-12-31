<?php

//ini_set('display_errors', '1');
//error_reporting(E_ALL);

ob_start();
session_start();

function __autoload($class)
{
    require_once('./models/class.'.$class.'.php');
}

//$userObj = new user();

//$user =$_SESSION["uname"];
/*$uid = $user['id'];
$role = $user['role'];
$userName = $user['first_name'] .' '. $user['last_name'];*/
	
if(!(isset($_SESSION["uname"]))) {
    //$loginURL   = './logout.php';
    header('Location: login.php');
    exit;
}

?>