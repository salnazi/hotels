<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.flexslider-min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/main.js"></script>
 	
	<script>
	$(document).ready(function() {
        $("#datepicker").datepicker({
            format: "dd-mm-yyyy",
            changeMonth: true,
            changeYear: true
        });
    });
	</script>
   <script>
   $(document).ready(function () {
	        $('#cities').typeahead({
	            source: function (query, result) {
	                $.ajax({
	                    url: "GetCity.php",
	          data: 'query=' + query,            
	                    dataType: "json",
	                    type: "POST",
	                    success: function (data) {
	            result($.map(data, function (item) {
	              return item;
	                        }));
	                    }
	                });
	            }
	        });
	    });
	</script>