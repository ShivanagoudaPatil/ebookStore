<?php

function __autoload($class)
{
    require_once('./models/class.'.$class.'.php');
}
$userObj = new user();

$type = $_REQUEST['type'];
$pid = $_REQUEST['pid'];
$status = $_REQUEST['status'];

if($type == 'approvePainting') {
    echo $userObj->changePaintingStatus($pid, $status);
}
elseif($type == 'deletePainting') {
    echo $userObj->deletePainting($pid);
}