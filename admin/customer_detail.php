<?php

//database connection & session check
require_once("inc/lock.php");

//initilize the page
require_once("inc/init.php");

//require UI configuration (nav, ribbon, etc.)
require_once("inc/config.ui.php");

/*---------------- PHP Custom Scripts ---------

YOU CAN SET CONFIGURATION VARIABLES HERE BEFORE IT GOES TO NAV, RIBBON, ETC.
E.G. $page_title = "Custom Title" */

$page_title = "Customer Detail";

/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
$page_css[] = "your_style.css";
include ("inc/header.php");

//include left panel (navigation)
//follow the tree in inc/config.ui.php
$page_nav["customers"]["active"] = true;
include ("inc/nav.php");


if(isset($_GET['uid'])){
    $customer = $userObj->getCustomer($_GET['uid']);
}


?>
    <!-- ==========================CONTENT STARTS HERE ========================== -->
    <!-- MAIN PANEL -->
    <div id="main" role="main">
        <?php
        //configure ribbon (breadcrumbs) array("name"=>"url"), leave url empty if no url
        //$breadcrumbs["New Crumb"] => "http://url.com"
        $breadcrumbs["Misc"] = "";
        include("inc/ribbon.php");
        ?>

        <!-- MAIN CONTENT -->
        <div id="content">

            <!-- widget grid -->
            <section id="widget-grid" class="">

                <!-- row -->
                <div class="row">

                    <!-- NEW WIDGET START -->
                    <article class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                        <!-- Widget ID (each widget will need unique ID)-->
                        <div class="jarviswidget well jarviswidget-color-darken" id="wid-id-0" data-widget-sortable="false" data-widget-deletebutton="false" data-widget-editbutton="false" data-widget-colorbutton="false">

                            <header>
                                <span class="widget-icon"> <i class="fa fa-barcode"></i> </span>
                                <h2>Item #44761 </h2>

                            </header>

                            <!-- widget div-->
                            <div>

                                <!-- widget edit box -->
                                <div class="jarviswidget-editbox">
                                    <!-- This area used as dropdown edit box -->

                                </div>
                                <!-- end widget edit box -->

                                <!-- widget content -->
                                <div class="widget-body no-padding">

                                    <div class="widget-body-toolbar">

                                        <div class="row">

                                            <div class="col-sm-4">
                                                <h1>Customer Details</h1>
                                            </div>

                                            <div class="col-sm-8 text-align-right">

                                                <div class="btn-group">
                                                    <a href="add-new-customer.php?uid=<?php if(isset($customer)) echo $customer['uid'];?>&action=edit" class="btn btn-sm btn-primary"> <i class="fa fa-edit"></i> Edit </a>
                                                </div>

                                                <div class="btn-group">
                                                    <a href="add-new-customer.php" class="btn btn-sm btn-success"> <i class="fa fa-plus"></i> Create New Customer</a>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="padding-10" style="border-bottom: 1px solid #ccc;">
                                            <div class="col-sm-7">
                                                <dl class="dl-horizontal">
                                                    <dt>Customer Id</dt>
                                                    <dd><?php if(isset($customer)) echo $customer['uid'];?></dd>

                                                    <dt>Customer Name</dt>
                                                    <dd><?php if(isset($customer)) echo $customer['prefix'].' '.$customer['customer_name'];?></dd>

                                                </dl>
                                            </div>
                                            <div class="col-sm-5">
                                                <dl>
                                                    <dt>Address</dt>
                                                    <dd><?php if(isset($customer)) echo $customer['address'];?></dd>
                                                </dl>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>

                                        <div class="padding-10" style="border-bottom: 1px solid #ccc;">
                                            <div class="col-sm-4">
                                                <address>
                                                    <abbr title="Phone"><strong>Contact Number - </strong></abbr> <?php if(isset($customer)) echo $customer['phone'];?>
                                                </address>
                                                <dl class="dl-horizontal">
                                                    <dt>Practice Name</dt>
                                                    <dd><?php if(isset($customer)) echo $customer['practice_name'];?></dd>
                                                    <dt>Referred By</dt>
                                                    <dd><?php if(isset($customer)) echo $customer['referred_by'];?></dd>
                                                </dl>
                                            </div>
                                            <div class="col-sm-4">
                                                <address>
                                                    <abbr title="Phone"><strong>Email - </strong></abbr> <?php if(isset($customer)) echo $customer['email'];?>
                                                </address>
                                                <dl class="dl-horizontal">
                                                    <dt>Type</dt>
                                                    <dd><?php if(isset($customer)) echo $customer['type'];?></dd>
                                                    <dt>Tax</dt>
                                                    <dd><?php if(isset($customer)) echo $customer['tax'];?></dd>
                                                </dl>
                                            </div>
                                            <div class="col-sm-4">
                                                <address>
                                                    <abbr title="Phone"><strong>Office Hour - </strong></abbr><?php if(isset($customer)) echo $customer['office_hour'];?>
                                                </address>
                                                <dl class="dl-horizontal">
                                                    <dt>Speciality</dt>
                                                    <dd><?php if(isset($customer)) echo $customer['speciality'];?></dd>
                                                </dl>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="padding-10">
                                            <div class="col-sm-12">
                                                <dl class="dl-horizontal">
                                                    <dt>Note</dt>
                                                    <dd><?php if(isset($customer)) echo $customer['note'];?></dd>
                                                </dl>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>


                                </div>

                            </div>
                                <!-- end widget content -->

                        </div>
                            <!-- end widget div -->
                    </article>
                    <!-- WIDGET END -->

                </div>

                <!-- end row -->

            </section>
            <!-- end widget grid -->

        </div>
        <!-- END MAIN CONTENT -->

    </div>
    <!-- END MAIN PANEL -->
    <!-- ==========================CONTENT ENDS HERE ========================== -->

<?php
//include required scripts
include("inc/scripts.php");
?>

    <!-- PAGE RELATED PLUGIN(S)
    <script src="..."></script>-->

    <script>

        $(document).ready(function() {
            // PAGE RELATED SCRIPTS
        })

    </script>

<?php
//include footer
include("inc/footer.php");
?>