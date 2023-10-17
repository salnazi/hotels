<?php
error_reporting(0);
// Server DB Config
define("HOST", "localhost", true);
define("USERNAME", "root", true);
define("PASSWORD", "", true);
define("DBNAME", "hbtours", true);

/*define("HOST", "fdb18.awardspace.net", true);
define("USERNAME", "3126676_chat", true);
define("PASSWORD", "splender84", true);
define("DBNAME", "3126676_chat", true);*/

// Front End Config
define("_TITLE", "HolidayBooking.Com", true);
define("_TITLE_DESC", "Top Thailand hotels. Full list of Hotels in Thailand. Detail hotel information and best rates available for Thailand.Book now and Save .", true);
define("_TITLE_KEYWORDS", "Booking Online, Budget Booking, Holiday Trips, Package, Sightseeing, Package Tours");
define("_AUTHOR", "HolidayBooking");

define("_LOGO_NAME", "HolidayBooking.Com", true);

//API Config
/*define("_API_TOKEN", "3ca6065a20ea7aab866adfbb19911b86", true); // sal email
define("_MARKER", "250758", true);*/
define("_API_TOKEN", "229aaf145a185e5e03fc99613c06b0ef", true); // bigg email
define("_MARKER", "262512", true);


define("_BASE_URL", "https://search.hotellook.com/?", true);
define("_SEARCH_URL", "http://engine.hotellook.com/api/v2/static/hotels.json?", true);
define("_PRICE_CHECK_URL", "http://yasen.hotellook.com/tp/public/widget_location_dump.json?", true);
define("_VIEW_HOTEL_URL", "http://engine.hotellook.com/api/v2/search/getResult.json?", true);


http://engine.hotellook.com/api/v2/search/start.json?signature=7f631debd480c318ac17b1d281e1c10a&marker=250758&adultsCount=2&checkIn=2023-12-12&checkOut=2023-12-13&currency=USD&customerIP=77.111.247.75&iata=HKT&lang=en&waitForResult=0

//define("_VIEW_HOTEL_URL", "https://search.hotellook.com/hotels?=1&", true);
//https://search.hotellook.com/hotels?=1&adults=2&checkIn=2023-08-29&checkOut=2023-09-05&children=&cityId=25864&currency=rub&destination=Chennai&language=en_us&marker=direct.Zz3c2ad2ee05314c26be6d662-126017&locationId=25864&hotelId=45430733&searchId=e52a5e11-2c8b-4db7-82af-3e743f5e23b9&hotelName=MAJESTIC%20MANOR

define("_LANG", "en", true);
define("_CURRENCY", "INR", true);
define("_LIMIT", "10", true);
define("_TYPE", "price", true);
?>