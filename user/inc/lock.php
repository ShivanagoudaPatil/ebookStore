<?php

ob_start();
session_start();

if(!(isset($_SESSION["uname"]))) {
    header('Location: index.php');
    exit;
}

?>