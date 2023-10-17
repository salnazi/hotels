<?php	
	include ("config/func.php");
	global $DB;
	$_POST['query'] = 'bang';
	$keyword = strval($_POST['query']);
	$search_param = "{$keyword}%";
	$Qry = "SELECT SnCityName FROM cities WHERE SnCityName LIKE '".$search_param."' "; 
	$sql = mysqli_query($DB, $Qry);
	while($row = mysqli_fetch_array($sql)) {

		$countryResult[] = $row["SnCityName"];
		
	}
	echo json_encode($countryResult);
	
?>