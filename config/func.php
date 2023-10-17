<?php
include("db.php");
include("define_config.php");
function GetCity($str)
{
	global $DB;
	$Qry = "SELECT SnCityCode FROM cities WHERE SnCityCode LIKE '%".$value."%' limit 5;";
	$sql = mysqli_query($DB, $Qry);
	while($r = mysqli_fetch_array($sql))
	{
		$out = $r;
	}
	return $out;
}
function StarRating($cnt)
{
	switch($cnt)
	{
		case 0:
			$rp = "";
		break;
		case 1:
			$rp = '<i class="icon-star-full"></i>';
		break;
		case 2:
			$rp = '<i class="icon-star-full"></i><i class="icon-star-full"></i>';
		break;
		case 3:
			$rp = '<i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i>';
		break;
		case 4:
			$rp = '<i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i>';
		break;
		case 5:
			$rp = '<i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i>';
		break;
	}
	return $rp;

}


function CheckFacilities($str)
{
    switch(strtoupper($str))
    {
        case "7":
         $Sal = '<i class="fa fa-bath" style="color:red;"></i>&nbsp;';
        break;
        case "4":
         $Sal = '<i class="fa fa-television" style="color:red;"></i>&nbsp;';
        break;
         case "38":
         $Sal = '<i class="fa fa-swimmer" style="color:red;"></i>&nbsp;';
        break;
        case "106":
         $Sal = '<i class="fa fa-cocktaail" style="color:red;"></i>&nbsp;';
        break;
        case "93":
         $Sal = '<i class="fa fa-dice" style="color:red;"></i>&nbsp;';
        break;
        case "132":
         $Sal = '<i class="fa fa-smoking" style="color:red;"></i>&nbsp;';
        break;
        case "133":
         $Sal = '<i class="fa fa-wifi" style="color:red;"></i>&nbsp;';
        break;
    }

    return $Sal;
}
function DateFormatter($Date, $Mode)
{
	switch($Mode)
 	{
		case "0":
			list($m,$d,$y) = explode("/",$Date);
			$nDate = $Date;
		break;

 		case "1":
 		list($m,$d,$y) = explode("/",$Date);
 		$nDate = $y."-".$m."-".$d;
 		break;
 	}
 	return $nDate;
}
function GetCityCode($CityName)
{
	global $DB;
	$Qry = "SELECT SnCityCode FROM cities WHERE SnCityName='".$CityName."' ";
	$sql = mysqli_query($DB, $Qry);
	while($r = mysqli_fetch_array($sql))
	{
		$out = $r['SnCityCode'];
	}
	return $out;
}
function SearchRQByCity($data)
{
	
	$ip = $_SERVER['HTTP_HOST'];
	//"token" => "229aaf145a185e5e03fc99613c06b0ef",
					//"marker" => "262512",
	$ip = "22.45.122.10";
	$signature = "229aaf145a185e5e03fc99613c06b0ef:262512:2:2023-10-21:2023-10-22:0:25864:INR:".$ip.":en:0";
	$arrRQ = array(
					"adultsCount" => "2",
					"checkIn" => "2023-10-21",
					"checkOut" => "2023-10-22",
					"childrenCount" => "0",
					"cityId" => "25864",
					"currency" => "INR",
					"customerIP" => $ip,
					"lang" => "en",
					"waitForResult" => "0",
					"signature" => md5($signature)
					);

	/*$arrRQ[] = array("adultsCount" => $data['adultsCount'],
					"childrenCount" => "0",
					"lang" => "en_US",
					"waitForResult" => "0",
					"cityId" => $data['cityId'],
					"checkIn" => $data['checkIn'],
					"checkOut" => $data['checkOut'],
					"customerIP" => '111.11.20.200',
					"currency" => "INR"
					);
					*/
	$input[0] = $arrRQ;
	return $input;
}
function SearchRQ($CheckIn,$CheckOut,$CityId)
{
	$arrRQ[] = array("currency" => _CURRENCY,
					"language" => _LANG,
					"limit" => _LIMIT,
					"locationId" => $CityId,
					"type" => _TYPE,
					"checkIn" => $CheckIn,
					"checkOut" => $CheckOut,
					"token" => _API_TOKEN
					);
	return $arrRQ;
}
function SearchHotelRQ($CheckIn,$CheckOut,$CityId,$HotelId)
{

	echo $arrRQ[] = array("locationId" => $CityId,
					"hotelId" => $HotelId,
					"currency" => _CURRENCY,
					"limit" => _LIMIT,					
					"checkIn" => $CheckIn,
					"checkOut" => $CheckOut,
					"token" => _API_TOKEN
					);
	return $arrRQ;
}
function PriceCheckRQ($CheckIn,$CheckOut,$CityId)
{
	$arrRQ[] = array("currency" => _CURRENCY,
					"language" => _LANG,
					"limit" => _LIMIT,
					"id" => $CityId,
					"type" => _TYPE,
					"check_in" => $CheckIn,
					"check_out" => $CheckOut,
					"token" => _API_TOKEN
					);
	return $arrRQ;
}
function multiple_threads_request($RqXML,$url)
{
	global $headerURL;
	$mh = curl_multi_init();
	$curl_array = array();
	foreach( $RqXML as $i => $cJsonData ) 
	{
		

        $sRq = '';
	    foreach($cJsonData as $ky => $vl)  {
	       $sRq .= $ky . "=". $vl."&";       
	    }  
		
	    $headerURL = $url.$sRq;  
		$signature = "ca2fe7888d34ac82a8fb97e5b0033c3b";
		
		//echo $headerURL = 'https://search.hotellook.com/hotels?=1&adults=2&checkIn=2023-08-29&checkOut=2023-09-05&children=&cityId=25864&currency=rub&destination=Chennai&language=en_us&token=3ca6065a20ea7aab866adfbb19911b86&locationId=25864&hotelId=45430733&searchId=36e92361-0c72-4741-b814-bd589acc3ddc&hotelName=MAJESTIC%20MANOR';
        //echo  $headerURL = 'http://engine.hotellook.com/api/v2/search/start.json?iata=HKT&checkIn=2021-08-10&checkOut=2021-08-13&adultsCount=2&customerIP=100.168.1.1&childrenCount=1&childAge1=10&lang=en&currency=USD&waitForResult=0&marker=250758&signature=a475100374414df97a9c6c7d7731b3c6';
		//echo $headerURL = "http://engine.hotellook.com/api/v2/lookup.json?query=london&lang=en&lookFor=both&limit=1&token=3ca6065a20ea7aab866adfbb19911b86";
		//$httpHeader = array("Api-Key:$apiKey", "X-Signature:$signature", "Content-Type: application/xml", "Accept:application/json" );

		$Header = array("Signature:$signature", "Accept:application/json","Content-Type:application/json");
		$curl_array[$i] = curl_init();
		curl_setopt($curl_array[$i], CURLOPT_HTTPHEADER, $Header);
		curl_setopt($curl_array[$i], CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl_array[$i], CURLOPT_HEADER, 0);
		curl_setopt($curl_array[$i], CURLOPT_URL, $headerURL);		
		curl_setopt($curl_array[$i], CURLOPT_TIMEOUT, 60);
		curl_setopt($curl_array[$i], CURLOPT_CONNECTTIMEOUT, 60);
		curl_setopt($curl_array[$i], CURLOPT_ENCODING, 'gzip,deflate');
		curl_multi_add_handle($mh, $curl_array[$i]);
	}
	$running = NULL;
	do {
		usleep(10000);
		curl_multi_exec($mh,$running);
	} while($running > 0);

	$res = array();
	foreach($RqXML as $i => $url)
	{	
		$info = curl_getinfo($curl_array[$i]);
		$error = curl_error($curl_array[$i]);
		if (($err = curl_error($curl_array[$i])) == '') {
			$res[] = curl_multi_getcontent($curl_array[$i]);
		}
		else {
			$res[] = $err;
		}
	}	
	foreach($RqXML as $i => $url)	{
		curl_multi_remove_handle($mh, $curl_array[$i]);
	}
	curl_multi_close($mh);
	return $res;
}
?>