<?php
require_once("inc/lock.php");
require_once("inc/init.php");
require_once("inc/config.ui.php");
$page_title = "Upload Books";
$page_css[] = "your_style.css";
include("inc/header.php");
include("inc/nav.php");
?>

<!--Displays FileHirearchy-->
<link rel="stylesheet" href="css/user/style.css" type="text/css">
<div id="main" role="main">
	<?php
		//configure ribbon (breadcrumbs) array("name"=>"url"), leave url empty if no url
		//$breadcrumbs["New Crumb"] => "http://url.com"
		include("inc/ribbon.php");
	?>
	
	<div id="content">
	
		<div class="row">
			<div class="col-xs-12 col-sm-15 col-md-15 col-lg-15">
				<h1 class="page-title txt-color-blueDark"> Upload Books </h1>
					<center><form action="fileupload.php" method="post" enctype="multipart/form-data">
   <center><table style="font-size:18px;">
   <tr> <td> Select PDF Book: </td>
    <td> <input type="file" name="fileToUpload" id="fileToUpload" required> </td></tr>
	<td> Select PDF Book Cover: </td>
	 <td> <input type='file' name='UploadImage' id="uploadImage" required> </td> </tr>
	<tr> <td> Name: </td>
	<td> <input type="text" name="name" style="width:300px; background-color : #505050;" required> </td> </tr>
	<tr> <td> Author </td>
	<td> <input type="text" name="author" style="width:300px; background-color : #505050;" required> </td> </tr>
	<tr> <td>Description: </td>
	<td> <input type="text" name="description" style="width:300px; background-color : #505050;" required> </td> </tr>
	<tr> <td>Genre:</td>
	<td> <input type="radio" name="genre" value="comedy"> Comedy
	<input type="radio" name="genre" value="drama"> Drama
	<input type="radio" name="genre" value="horror"> Horror
	<input type="radio" name="genre" value="romance"> Romance <br>
	<input type="radio" name="genre" value="fantasy"> Fantasy
	<input type="radio" name="genre" value="mythology"> Mythology 
	<input type="radio" name="genre" value="satire"> Satire
	<input type="radio" name="genre" value="sifi"> Si-Fi <td> </tr>  </table> </center>
	
	<b> <input type="submit" value="Upload Book" name="submit" style="height:30px; width: 130px;font-size:18px; color: #0090ff	"> </b>
</form> </center>
			</div>
		</div>
		<!-- widget grid -->
		<br><br><br><br><br>
		<section id="widget-grid" class="">
		</section>
		</div>
	</div>
	<script src="<?php echo ASSETS_URL; ?>/js/plugin/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/datatables/dataTables.colVis.min.js"></script>
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/datatables/dataTables.tableTools.min.js"></script>
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/morris/raphael.min.js"></script>
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/morris/morris.min.js"></script>
<?php
include("inc/footer.php");
?>