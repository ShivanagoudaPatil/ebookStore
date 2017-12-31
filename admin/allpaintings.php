<?php

//database connection & session check
require_once("inc/lock.php");

//initilize the page
require_once ("inc/init.php");

//require UI configuration (nav, ribbon, etc.)
require_once ("inc/config.ui.php");

/*---------------- PHP Custom Scripts ---------

 YOU CAN SET CONFIGURATION VARIABLES HERE BEFORE IT GOES TO NAV, RIBBON, ETC.
 E.G. $page_title = "Custom Title" */

$page_title = "All Paintings";

/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
$page_css[] = "your_style.css";
include ("inc/header.php");

//include left panel (navigation)
//follow the tree in inc/config.ui.php
$page_nav["allpaintings"]["active"] = true;
include ("inc/nav.php");


$product = $userObj->getPaintings($uid, null);
$pendingProduct = $userObj->getAllPaintings();

if(isset($_GET['pid']) && isset($_GET['action']) && $_GET['action'] == 'delete'){
    if($userObj->deleteProduct($_GET['pid'])){
        header('Location: paintings.php');
        exit();
    }
}


?>
    <!-- ==========================CONTENT STARTS HERE ========================== -->
    <!-- MAIN PANEL -->
    <div id="main" role="main">

        <?php
        //configure ribbon (breadcrumbs) array("name"=>"url"), leave url empty if no url
        //$breadcrumbs["New Crumb"] => "http://url.com"
        //$breadcrumbs["Tables"] = "";
        include("inc/ribbon.php");
        ?>

        <!-- MAIN CONTENT -->
        <div id="content">

            <div class="row">
                <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                    <h1 class="page-title txt-color-blueDark">
                        <i class="fa fa-table fa-fw "></i>
                        All Paintings
                    </h1>
                </div>
                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-8" style="text-align: right;margin-top: 10px;">
                    <?php if($role == 'Artist')
                        echo '<a href="add-painting.php" class="btn btn-labeled btn-primary"> <span class="btn-label"><i class="glyphicon glyphicon-file"></i></span>Add New Painting</a>';
                    ?>
                </div>
            </div>
            <!-- widget grid -->
            <section id="widget-grid" class="">

                <!-- row -->
                <div class="row">

                    <!-- NEW WIDGET START -->
                    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                        <!-- Widget ID (each widget will need unique ID)-->
                        <div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-3" data-widget-editbutton="false">

                            <header>
                                <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                                <h2>Paintings</h2>

                            </header>

                            <!-- widget div-->
                            <div>

                                <!-- widget edit box -->
                                <div class="jarviswidget-editbox">

                                </div>
                                <!-- end widget edit box -->

                                <!-- widget content -->
                                <div class="widget-body no-padding">

                                    <table id="datatable_tabletools" class="table table-striped table-bordered table-hover" width="100%">
                                        <thead>
                                        <tr>
                                            <th data-class="expand">Artist Name</th>
                                            <th data-class="expand">Type</th>
                                            <th data-class="expand">Category</th>
                                            <th data-class="expand">Picture</th>
                                            <th data-class="expand">Painting Name</th>
                                            <th data-class="expand" width="500">Description</th>
                                            <th data-class="expand">Amount</th>
                                            <th data-class="expand">Estimate</th>
                                            <th data-class="expand">Start Date</th>
                                            <th data-class="expand">End Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            if($role == 'admin') {
                                                foreach ($pendingProduct as $p) {
                                                    echo '<tr>
                                                        <td>' . $p['first_name'] . ' ' . $p['last_name'] . '</td>
                                                        <td>' . $p['type'] . '</td>
                                                        <td>' . $p['cat_name'] . '</td>
                                                        <td><img src="../upload/' . $p['img'] . '" style="width:100px"/></td>
                                                        <td>' . $p['name'] . '</td>
                                                        <td>' . $p['details'] . '</td>
                                                        <td>' . $p['amount'] . '</td>
                                                        <td>' . $p['estimate'] . '</td>
                                                        <td>' . $p['start_date'] . '</td>
                                                        <td>' . $p['end_date'] . '</td>  
                                                       
                                                    </tr>';
                                                }
                                            }


                                        ?>
                                        </tbody>
                                    </table>

                                </div>
                                <!-- end widget content -->

                            </div>
                            <!-- end widget div -->

                        </div>
                        <!-- end widget -->

                    </article>
                    <!-- WIDGET END -->

                </div>

                <!-- end row -->

                <!-- end row -->

            </section>
            <!-- end widget grid -->


        </div>
        <!-- END MAIN CONTENT -->

    </div>
    <!-- END MAIN PANEL -->
    <!-- ==========================CONTENT ENDS HERE ========================== -->

    <!-- PAGE FOOTER -->
<?php // include page footer
include ("inc/footer.php");
?>
    <!-- END PAGE FOOTER -->

<?php //include required scripts
include ("inc/scripts.php");
?>

    <!-- PAGE RELATED PLUGIN(S) -->
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/datatables/dataTables.colVis.min.js"></script>
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/datatables/dataTables.tableTools.min.js"></script>
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>

    <script type="text/javascript">

        // DO NOT REMOVE : GLOBAL FUNCTIONS!

        $(document).ready(function() {

            $('.approve').click(function () {

                var pid=$(this).data("pid");
                var tr = $(this).closest('tr');
                if (confirm("Do you want to approve this painting?") == true) {
                    $.ajax({
                        type: "POST",
                        url: "ajaxHandler.php",
                        data: {pid: pid, status:"approve", type: "approvePainting"},
                        success: function (data) {
                            tr.fadeOut(300, function(){
                                $(this).remove();
                            });
                        }
                    });
                }
            });

            $('.disapprove').click(function () {

                var pid=$(this).data("pid");
                var tr = $(this).closest('tr');
                if (confirm("Do you want to disapprove this painting?") == true) {
                    $.ajax({
                        type: "POST",
                        url: "ajaxHandler.php",
                        data: {pid: pid, status:"disapprove", type: "approvePainting"},
                        success: function (data) {
                            tr.fadeOut(300, function(){
                                $(this).remove();
                            });
                        }
                    });
                }
            });

            $('.deletePainting').click(function () {

                var pid=$(this).data("pid");
                var tr = $(this).closest('tr');
                if (confirm("Do you want to delete this painting?") == true) {
                    $.ajax({
                        type: "POST",
                        url: "ajaxHandler.php",
                        data: {pid: pid, type: "deletePainting"},
                        success: function (data) {
                            tr.fadeOut(300, function(){
                                $(this).remove();
                            });
                        }
                    });
                }
            });

            /* BASIC ;*/
            var responsiveHelper_dt_basic = undefined;
            var responsiveHelper_datatable_fixed_column = undefined;
            var responsiveHelper_datatable_col_reorder = undefined;
            var responsiveHelper_datatable_tabletools = undefined;

            var breakpointDefinition = {
                tablet : 1024,
                phone : 480
            };

            $('#dt_basic').dataTable({
                "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
                "t"+
                "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
                "autoWidth" : true,
                "preDrawCallback" : function() {
                    // Initialize the responsive datatables helper once.
                    if (!responsiveHelper_dt_basic) {
                        responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
                    }
                },
                "rowCallback" : function(nRow) {
                    responsiveHelper_dt_basic.createExpandIcon(nRow);
                },
                "drawCallback" : function(oSettings) {
                    responsiveHelper_dt_basic.respond();
                }
            });

            /* END BASIC */


            /* TABLETOOLS */
            $('#datatable_tabletools').dataTable({

                // Tabletools options:
                //   https://datatables.net/extensions/tabletools/button_options
                "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'T>r>"+
                "t"+
                "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
                "oTableTools": {
                    "aButtons": [
                        "copy",
                        "csv",
                        "xls",
                        {
                            "sExtends": "pdf",
                            "sTitle": "SmartAdmin_PDF",
                            "sPdfMessage": "SmartAdmin PDF Export",
                            "sPdfSize": "letter"
                        },
                        {
                            "sExtends": "print",
                            "sMessage": "#Generated by KA Dental IMS Admin <i>(press Esc to close)</i>"
                        }
                    ],
                    "sSwfPath": "http://www.kabirdentallab.com/ka-app/js/plugin/datatables/swf/copy_csv_xls_pdf.swf"
                },
                "autoWidth" : true,
                "preDrawCallback" : function() {
                    // Initialize the responsive datatables helper once.
                    if (!responsiveHelper_datatable_tabletools) {
                        responsiveHelper_datatable_tabletools = new ResponsiveDatatablesHelper($('#datatable_tabletools'), breakpointDefinition);
                    }
                },
                "rowCallback" : function(nRow) {
                    responsiveHelper_datatable_tabletools.createExpandIcon(nRow);
                },
                "drawCallback" : function(oSettings) {
                    responsiveHelper_datatable_tabletools.respond();
                }
            });

            /* END TABLETOOLS */

        })

    </script>

<?php
//include footer
include ("inc/google-analytics.php");
?>