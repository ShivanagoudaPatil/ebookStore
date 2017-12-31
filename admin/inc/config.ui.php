<?php

//CONFIGURATION for SmartAdmin UI

//ribbon breadcrumbs config
//array("Display Name" => "URL");
$breadcrumbs = array(
	"Home" => APP_URL
);

/*navigation array config

ex:
"dashboard" => array(
	"title" => "Display Title",
	"url" => "http://yoururl.com",
	"url_target" => "_self",
	"icon" => "fa-home",
	"label_htm" => "<span>Add your custom label/badge html here</span>",
	"sub" => array() //contains array of sub items with the same format as the parent
)

*/
/*if($role == 'admin') {
    $page_nav = array(
        "dashboard" => array(
            "title" => "Dashboard",
            "icon" => "fa-home",
            "url" => APP_URL
        ),
        "customers" => array(
            "title" => "Customer",
            "icon" => "fa fa-lg fa-fw fa-user",
            "url" => APP_URL . "/all-customers.php"
        ),
        "artist" => array(
            "title" => "Artist",
            "icon" => "fa fa-lg fa-fw fa-user",
            "url" => APP_URL . "/artist.php"
        ),
        "paintings" => array(
            "title" => "New Paintings",
            "icon" => "fa fa-lg fa-fw fa-inbox",
            "url" => APP_URL . "/paintings.php"
        ),
        "allpaintings" => array(
            "title" => "Approved Paintings",
            "icon" => "fa fa-lg fa-fw fa-inbox",
            "url" => APP_URL . "/allpaintings.php"
        )

    );
}*/
//else{
    $page_nav = array(
        "dashboard" => array(
            "title" => "Dashboard",
            "icon" => "fa-home",
            "url" => APP_URL
        ),
        "paintings" => array(
            "title" => "All Paintings",
            "icon" => "fa fa-lg fa-fw fa-inbox",
            "url" => APP_URL . "/paintings.php"
//        ),
//        "paintingHistory" => array(
//            "title" => "Paintings History",
//            "icon" => "fa fa-lg fa-fw fa-inbox",
//            "url" => APP_URL . "/paintingHistory.php"
        )
    );

//}

//configuration variables
$page_title = "";
$page_css = array();
$no_main_header = false; //set true for lock.php and login.php
$page_body_prop = array(); //optional properties for <body>
$page_html_prop = array(); //optional properties for <html>
?>