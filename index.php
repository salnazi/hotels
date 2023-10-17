<?php include("config/func.php"); ?>
<!DOCTYPE HTML>
<html>
	<?php include("head.php");	?>
	<body>		
		<!-- <div class="salnazi-loader"></div>  -->
		<div id="page">

			<?php 
				// Top Section
				include ("top_menu.php");
				include ("top_banner.php");
				
				// Search Hotels
				include("home_search.php");

				// Content Section
				//include ("home_content_1.php");
				include ("home_content_2.php");
				//include ("home_content_3.php");
				//include ("home_content_4.php");
				//include ("home_content_5.php");
				//include ("home_content_6.php");
				
				//Footer Section
				include("footer.php");
				include("footer_js.php"); 
			?>

		</div>
	</body>	
</html>

