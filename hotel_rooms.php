<?php include("config/func.php"); ?>
<!DOCTYPE HTML>
<html>
	<?php include("head.php");	?>
	<body>		
	<!-- <div class="salnazi-loader"></div> -->

	<div id="page">
		<?php 
		include ("top_menu.php");
		?>

		
		<div class="salnazi-wrap">
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						<div class="row">
							<div class="col-md-12">
								<div class="wrap-division">
									<div class="col-md-12 col-md-offset-0 heading2 animate-box">										
									</div>
									<div class="row">

										<!-- Result Section Start -->
										<?php

										if($_GET['Action'] == "Find Hotel")
										{

											$CityId = GetCityCode($_GET['CityName']);
											$CheckIn = DateFormatter($_GET['CheckIn'],1);
											$CheckOut = DateFormatter($_GET['CheckOut'],1);
											$Pax = $_GET['Pax'];

											$SearchRQ = SearchRQ($CheckIn, $CheckOut, $CityId);											
											//$SearchRP = multiple_threads_request($SearchRQ , _SEARCH_URL);


											$SearchRP[] = '{"popularity":[{"hotel_id":47440632,"distance":3.88,"name":"Four-Bedroom Holiday home in R\u00f8m\u00f8 8","stars":0,"rating":0,"ty_summary":null,"property_type":"other","hotel_type":[],"last_price_info":null,"has_wifi":false},{"hotel_id":47440625,"distance":4.63,"name":"Two-Bedroom Holiday home in R\u00f8m\u00f8 19","stars":0,"rating":0,"ty_summary":null,"property_type":"other","hotel_type":[],"last_price_info":null,"has_wifi":false},{"hotel_id":47440620,"distance":3.98,"name":"Two-Bedroom Holiday home in R\u00f8m\u00f8 6","stars":0,"rating":0,"ty_summary":null,"property_type":"other","hotel_type":[],"last_price_info":null,"has_wifi":false},{"hotel_id":47440613,"distance":3.46,"name":"Three-Bedroom Holiday home in R\u00f8m\u00f8 4","stars":0,"rating":0,"ty_summary":null,"property_type":"other","hotel_type":[],"last_price_info":null,"has_wifi":false},{"hotel_id":47440618,"distance":3.01,"name":"Three-Bedroom Holiday home in R\u00f8m\u00f8 11","stars":0,"rating":0,"ty_summary":null,"property_type":"other","hotel_type":[],"last_price_info":null,"has_wifi":false}]}';

											$i = 0;
											$j = count($SearchRP);
											while($i < $j)
											{
												$json = json_decode($SearchRP[$i], true);
												print_R ($json); exit;
												$i++;
											}

										?>
										<div class="col-md-12 animate-box">
											<div class="room-wrap">
												<div class="row">
													<div class="col-md-6 col-sm-6">
														<div class="room-img" style="background-image: url(images/room-1.jpg);"></div>
													</div>
													<div class="col-md-6 col-sm-6">
														<div class="desc">
															<h2>Family Room</h2>
															<p class="price"><span>$45</span> <small>/ night</small></p>
															<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
															<p><a href="#" class="btn btn-primary">Book Now!</a></p>
														</div>
													</div>
												</div>
											</div>
										</div>
										<?php
										}
										?>

										<!-- Result Section End -->

									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- sBar Start-->
					<!-- sBar End-->
				
					
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
		<?php 
			include("footer.php");
			include("footer_js.php"); 
		?>
	</div>
	</body>	
</html>


