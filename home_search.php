<div id="salnazi-reservation" >
	<!-- <div class="container"> -->
		<div class="row">
			<div class="search-wrap">
				<div class="container">
					<ul class="nav nav-tabs">
						<!-- <li><a data-toggle="tab" href="#flight"><i class="flaticon-plane"></i> Flight</a></li>
						<li class="active"><a data-toggle="tab" href="#hotel"><i class="flaticon-resort"></i> Hotel</a></li> -->
						<!--<li><a data-toggle="tab" href="#car"><i class="flaticon-car"></i> Car Rent</a></li>
						<li><a data-toggle="tab" href="#cruises"><i class="flaticon-boat"></i> Cruises</a></li>-->
					</ul>
				</div>
				<div class="tab-content">
					
			        <div id="hotel" class="tab-pane fade in active">
					      <form method="GET" action='hotels.php' class="salnazi-form">
			              	<div class="row">					              		
			              	 <div class="col-md-2">
		              	 	<div class="form-group">
		                    <label for="date">Where:</label>
		                    <div class="form-field">
		                      <input type="text" id="cities" name='CityName' class="form-control" placeholder="Enter the City" required value='Chennai' autocomplete='off'>
		                    </div>
		                  </div>
			              	 </div>
			                <div class="col-md-3">
			                  <div class="form-group">
			                    <label for="date">Check-in:</label>
			                    <div class="form-field">
			                      <i class="icon icon-calendar2"></i>
			                      <input type="text" id="datepicker" name='CheckIn' class="form-control date" placeholder="Check-in date" required autocomplete='off'>
			                    </div>
			                  </div>
			                </div>
			                <div class="col-md-3">
			                  <div class="form-group">
			                    <label for="date">Check-out:</label>
			                    <div class="form-field">
			                      <i class="icon icon-calendar2"></i>
			                      <input type="text" id="datepicker_1" name='CheckOut' class="form-control date" placeholder="Check-out date" required autocomplete='off'> 
			                    </div>
			                  </div>
			                </div>
			                <div class="col-md-2">
			                  <div class="form-group">
			                    <label for="guests">Guest</label>
			                    <div class="form-field">
			                      <i class="icon icon-arrow-down3"></i>
			                      <select name="Pax" id="guest" class="form-control">
			                        <option value="1">1</option>
			                        <option value="2">2</option>
			                        <option value="3">3</option>
			                        <option value="4">4</option>
			                      </select>
			                    </div>
			                  </div>
			                </div>
			                <div class="col-md-2">
			                  <input type="submit" name="Action" id="submit" value="Find Hotel" class="btn btn-primary btn-block">
			                </div>
			              </div>
		            </form>
				    </div>

	         </div>
			</div>
		</div>
	</div>
</div>
<script type='text/javascript'>
$( function() {
    $("#datepicker").datepicker({dateFormat: 'yyyy-mm-dd'});
  });
  $( function() {
    $("#datepicker_1").datepicker({dateFormat: 'yyyy-mm-dd'});
  });
</script>