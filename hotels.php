<?php include("config/func.php"); ?>
<!DOCTYPE HTML>
<html>
    <?php include("head.php");  ?>
    <title>[:hotel_city:], [:check_in:] - [:check_out:] - The best hotel deals</title>
    <meta name="description" content="Check the best deals for [:hotel_name:] ([:hotel_city:]). We compared all deals so you can choose the best one. [:check_in:] - [:check_out:], [:guests:]"/>
    <meta property="og:title" content="[:hotel_name:] ([:hotel_city:]): the best deals and discounts" />
    <meta property="og:description" content="Check the best deals for [:hotel_name:] ([:hotel_city:]). We compared all deals so you can choose the best one. [:check_in:] - [:check_out:], [:guests:]" />
    <meta content="en_US" property="og:locale">
    <meta content="product.group" property="og:type">
    <meta content="[:og_image:]" property="og:image">

    <meta content="[:hotel_name:] ([:hotel_city:]): the best deals and discounts" name="twitter:title">
    <meta content="Check the best deals for [:hotel_name:] ([:hotel_city:]). We compared all deals so you can choose the best one. [:check_in:] - [:check_out:], [:guests:]" name="twitter:description">
    <meta content="summary_large_image" name="twitter:card">

    <body>      
    <!-- <div class="salnazi-loader"></div> -->

    <div id="page">
        <?php 
        include ("top_menu.php");
        ?>

        <div class="salnazi-wrap" >
            <div class="container">
                <div class="row" >
                    <div class="col-md-12" >
                          <div class="col-md-12 col-md-offset-0 heading2 animate-box" >                                       
                                    </div>
                                <div class="wrap-division"  style='display: flex;  flex-wrap: wrap;'>
                            
                                    

                                        <!-- Result Section Start -->
                                        <?php

                                        if($_GET['Action'] == "Find Hotel")
                                        {

                                            $CityId = GetCityCode($_GET['CityName']);
                                            $CheckIn = DateFormatter($_GET['CheckIn'],0);
                                            $CheckOut = DateFormatter($_GET['CheckOut'],0);
                                            $Pax = $_GET['Pax'];

                                            $SearchRQ = SearchRQ($CheckIn,$CheckOut,$CityId);   

                                            //$SearchRQ = SearchRQByCity($CityId);                                       
                                            $SearchRP = multiple_threads_request($SearchRQ , _SEARCH_URL);
                                            //print_r ($SearchRQ);
                                           // print_r ($SearchRP); 

                                            if($_GET['debug'] == 84)
                                            {
                                                echo "\n ====  URL RQ =======\n";
                                                print_r ($headerURL);

                                                echo "\n ====  Search RQ =======\n";
                                                print_r ($SearchRQ);

                                                echo "\n ====  Search RP =======\n";
                                                print_r ($SearchRP);
                                            }

                                            $i = 0;
                                            $j = count($SearchRP);
                                            while($i < $j)
                                            {
                                                $json = json_decode($SearchRP[$i], true);
                                                $arHotels = $json['hotels'];
                                                if(!isset($arHotels[0])) {
                                                    $arHotels = array("0" => $json['hotels']);
                                                }
                                                foreach($arHotels as $hotel)
                                                {
                                                    $arimage = $hotel['photos'][0];                                              

                                                    if(!isset($arimage[0])){
                                                        $arimage = array("0" => $arimage);
                                                    } 
                                                    $image = (empty($arimage[0]['url'])) ? 'images/noimg.png': $arimage[0]['url'];  

                                                    $address = $hotel['address']['en'];
                                            ?>
                                            

                                            <div class="col-md-4 col-sm-4 animate-box1">
                                                <div class="hotel-entry">
                                                    <a href="view-hotels.php?CityName=<?php echo $_GET['CityName']; ?>&CheckIn=<?php echo $_GET['CheckIn']; ?>&CheckOut=<?php echo $_GET['CheckOut']; ?>&Pax=<?php echo $_GET['Pax']; ?>&HotelId=<?php echo $hotel['id']; ?>&Action=View+Hotel" class="hotel-img" style="background-image: url(<?php echo $image; ?>);">
                                                        <!-- <p class="price"><span>$120</span><small> /night</small></p> -->
                                                        <p class="price"><small>View Hotels</small></p> 
                                                    </a>
                                                    <div class="desc">
                                                        <p class="star"><span><?php echo StarRating($hotel['rating']); ?></span></p>
                                                        <!-- <h3><a href="http://hotellook.com<?php echo $hotel['link']; ?>?checkIn=2019-10-30&checkOut=2019-10-31"><?php echo $hotel['name']['en']; ?></a></h3> -->

                                                        <h3><a href="<?php echo _BASE_URL."hotelId=".$hotel['id']."&checkIn=".DateFormatter($_GET['CheckIn'],1)."&checkOut=".DateFormatter($_GET['CheckOut'],1)."&adults=".$_GET['Pax']; ?>"><?php echo $hotel['name']['en']; ?></a></h3>


                                                        <span class="place"><?php echo $hotel['address']['en']; ?></span>  
                                                        <p>
                                                        
                                                        <?php 
                                                        
                                                        foreach($hotel['facilities'] as $f) {
                                                         echo  CheckFacilities($f);                                                                                                                     
                                                        } 
                                                        ?>                                                        
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>


                                        <?php
                                                }
                                            $i++;
                                            }
                                        }
                                        ?>

                                        <!-- Result Section End -->

                             </div>
                        </div>
                    </div>  
                            </div>
                        </div>
                    </div>
                    <!-- sBar Start-->
                    <!-- sBar End-->
                
       
           
        </div>
        
        
        <?php 
            include("footer.php");
            include("footer_js.php"); 
        ?>
    </div>
    </body> 
</html>


