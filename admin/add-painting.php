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

$page_title = "Add Paintings";

/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
$page_css[] = "your_style.css";
include("inc/header.php");

//include left panel (navigation)
//follow the tree in inc/config.ui.php
$page_nav["paintings"]["active"] = true;
include("inc/nav.php");

if(isset($_REQUEST['pid']) && isset($_GET['action']) && $_GET['action'] == 'edit') {
    $painting = $userObj->getPaintings(null, $_REQUEST['pid']);
    $action=$_REQUEST['action'];
    $pid=$_REQUEST['pid'];
    $oldImg=$painting['img'];
}
else
    $action='add';

$category = $userObj->getCategory();

if(isset($_POST['submit']) && $_SERVER["REQUEST_METHOD"] == "POST"){

    if($_FILES["paintingImage"]["name"]){

        $data = $userObj->uploadImg($_FILES["paintingImage"]);
        if($data[0] != "suceess"){
            echo '<div id="main" role="main"><div id="content"><p style="color:red">'.$data[0].'</p>';
            echo '<button type="button" class="btn btn-default" onclick="window.history.back();">Back</button></div></div>';
            exit();
        }else{
            $imgName = $data[1];
        }
    }else{
        $imgName = $oldImg ? $oldImg : NULL;
    }

    if($userObj->addPainting($pid, $uid, $_POST['name'], $_POST['detail'], $imgName, $_POST['amount'], $_POST['type'], $_POST['cat-id'], $_POST['estimate'], $_POST['increment'], $_POST['startDate'], $_POST['endDate'], $action)){
        $_SESSION['msg-success'] = "Painting added successfully.";
        header('Location: paintings.php');
        exit();
    } else {
        $_SESSION['msg-error'] = "Please enter valid username & password";
    }
}

?>
    <!-- ==========================CONTENT STARTS HERE ========================== -->
    <!-- MAIN PANEL -->
    <div id="main" role="main">
        <?php
        //configure ribbon (breadcrumbs) array("name"=>"url"), leave url empty if no url
        //$breadcrumbs["New Crumb"] => "http://url.com"
        //$breadcrumbs["Misc"] = "";
        include("inc/ribbon.php");
        ?>

        <!-- MAIN CONTENT -->
        <div id="content">
            <section id="widget-grid" class="">
                <div class="row">

                    <!-- NEW COL START -->
                    <article class="col-sm-12 col-md-12 col-lg-5">

                        <div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false">

                            <header>
                                <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                                <h2>Add Paintings</h2>

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

                                    <form id="item-add" class="smart-form" action="" method="post" enctype="multipart/form-data">

                                        <fieldset>
                                            <section>
                                                <div class="form-group col col-12">
                                                    <label class="label">Painting Name</label>
                                                    <label class="input">
                                                        <input type="text" name="name" class="input-lg"  value="<?php if(isset($painting)) echo $painting['name'];?>">
                                                    </label>
                                                </div>

                                                <div class="form-group col col-12">
                                                    <label class="label">Description</label>
                                                    <label class="textarea">
                                                        <textarea rows="6" name="detail" class="custom-scroll"><?php if(isset($painting)) echo $painting['details'];?></textarea>
                                                    </label>
                                                </div>

                                                <div class="form-group col col-12">
                                                    <label class="label">Painting Image</label>
                                                    <?php if(isset($painting)) {?>
                                                        <label class="input state-success" style="width: 78%;display: inline-block">
                                                            <input type="file" name="paintingImage" class="btn btn-default valid" id="exampleInputFile1" value="<?php echo $painting['img'];?>" aria-required="true" aria-invalid="false">
                                                        </label>
                                                        <img src="../upload/<?php echo $painting['img'];?>" style="width: 120px;float: right;display: inline-block;margin-top: -27px;">
                                                    <?php } else {?>
                                                    <label class="input">
                                                        <input type="file" name="paintingImage" class="btn btn-default" id="exampleInputFile1">
                                                    </label>
                                                    <?php } ?>
                                                </div>
                                            </section>

                                            <section>
                                                <div class="form-group col col-6">
                                                    <label class="label">Type</label>
                                                    <label class="select">
                                                        <select class="input-lg" name="type">
                                                            <option value="bid">Bid</option>
                                                            <option value="sale">Sale</option>
                                                        </select> <i></i>
                                                    </label>
                                                </div>

                                                <div class="form-group col col-6">
                                                    <label class="label">Category</label>
                                                    <label class="select">
                                                        <select class="input-lg" name="cat-id">
                                                            <option value="">Select Category</option>
                                                            <?php foreach ($category as $cat) {
                                                                echo '<option';
                                                                if(isset($painting) && $cat["cat_id"] == $painting["cat_id"]){
                                                                    echo ' selected'; }

                                                                echo ' value="'.$cat['cat_id'].'">'.$cat['cat_name'].'</option>';
                                                            } ?>
                                                        </select> <i></i>
                                                    </label>
                                                </div>

                                            </section>

                                            <section>
                                                <div class="form-group col col-4">
                                                    <label class="label">Amount</label>
                                                    <label class="input">
                                                        <input type="text" name="amount" class="input-lg" placeholder="e.g. 20000" value="<?php if(isset($painting)) echo $painting['amount'];?>">
                                                    </label>
                                                </div>

                                                <div class="form-group col col-4">
                                                    <label class="label">Estimate</label>
                                                    <label class="input">
                                                        <input type="text" name="estimate" class="input-lg" placeholder="e.g. 20000-40000" value="<?php if(isset($painting)) echo $painting['estimate'];?>">
                                                    </label>
                                                </div>

                                                <div class="form-group col col-4">
                                                    <label class="label">Bid Increment</label>
                                                    <label class="input">
                                                        <input type="text" name="increment" class="input-lg" placeholder="e.g. 1000" value="<?php if(isset($painting)) echo $painting['increment'];?>">
                                                    </label>
                                                </div>

                                            </section>

                                            <section>

                                                <div class="form-group col col-6">
                                                    <label>Start Date</label>
                                                    <div class="input-group" style="margin-top: 7px;">
                                                        <input type="text" name="startDate" placeholder="Select a date" class="form-control datepicker" data-dateformat="yy/mm/dd" value="<?php if(isset($painting)) echo $painting['start_date'];?>">
                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                                <div class="form-group col col-6">
                                                    <label>End Date</label>
                                                    <div class="input-group" style="margin-top: 7px;">
                                                        <input type="text" name="endDate" placeholder="Select a date" class="form-control datepicker" data-dateformat="yy/mm/dd" value="<?php if(isset($painting)) echo $painting['end_date'];?>">
                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>

                                            </section>

                                        </fieldset>

                                        <footer>
                                            <button type="submit" name="submit" class="btn btn-primary">
                                                Submit
                                            </button>
                                            <button type="button" class="btn btn-default" onclick="window.history.back();">
                                                Back
                                            </button>
                                        </footer>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </section>
        </div>
        <!-- END MAIN CONTENT -->

    </div>
    <!-- END MAIN PANEL -->
    <!-- ==========================CONTENT ENDS HERE ========================== -->

    <!-- PAGE FOOTER -->
<?php
// include page footer
include("inc/footer.php");
?>
    <!-- END PAGE FOOTER -->

<?php
//include required scripts
include("inc/scripts.php");
?>

    <!-- PAGE RELATED PLUGIN(S)
    <script src="..."></script>-->
    <script src="./js/custom.js"></script>
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/jquery-form/jquery-form.min.js"></script>
    <script>

        $(document).ready(function() {

            var errorClass = 'invalid';
            var errorElement = 'em';

            var $checkoutForm = $('#item-add').validate({
                errorClass		: errorClass,
                errorElement	: errorElement,
                highlight: function(element) {
                    $(element).parent().removeClass('state-success').addClass("state-error");
                    $(element).removeClass('valid');
                },
                unhighlight: function(element) {
                    $(element).parent().removeClass("state-error").addClass('state-success');
                    $(element).addClass('valid');
                },

                // Rules for form validation
                rules : {
                    name : {
                        required : true
                    },
                    detail : {
                        required : true,
                    },
                    amount : {
                        required : true,
                    }
                },

                // Do not change code below
                errorPlacement : function(error, element) {
                    error.insertAfter(element.parent());
                }
            });

        })

    </script>

<?php
//include footer
include("inc/google-analytics.php");
?>