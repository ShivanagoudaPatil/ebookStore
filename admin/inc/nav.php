		<!-- Left panel : Navigation area -->
		<!-- Note: This width of the aside area can be adjusted through LESS variables -->
		<aside id="left-panel">

			<div class="login-info">
				<span>
					<a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
                        <img src="../img/male.png" alt="me" class="online" >
						<span style="margin-left: 5px">
                            <?php echo $_SESSION["uname"]; ?>
						</span>
					</a>
				</span>
			</div>

			<!-- NAVIGATION : This navigation is also responsive

			To make this navigation dynamic please make sure to link the node
			(the reference to the nav > li) after page load. Or the navigation
			will not initialize.
			-->
			<nav>
				<!-- NOTE: Notice the gaps after each icon usage <i></i>..
				Please note that these links work a bit different than
				traditional hre="" links. See documentation for details.
				-->
				<?php
					echo "<ul type='circle'>";
					echo '<li> <a href="home.php"> Home </a> <center> </li>';
					echo '<li> <a href="viewbook.php"> View Books </a> <center> </li>';
					echo '<li> <a href="upload.php"> Upload Books </a> <center> </li>';
					echo '<li> <a href="users.php"> User Details </a> <center> </li>';
					echo '<li> <a href="requests.php"> Book Requests </a> <center> </li>';
					echo "<ul>";
					//$ui = new SmartUI();
					//$ui->create_nav($page_nav)->print_html();
				?>

			</nav>
			<span class="minifyme" data-action="minifyMenu"> <i class="fa fa-arrow-circle-left hit"></i> </span>

		</aside>
		<!-- END NAVIGATION -->