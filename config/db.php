<?php
include("define_config.php");
global $DB;
$DB = mysqli_connect(HOST,USERNAME,PASSWORD,DBNAME);
if(!$DB)
{
	echo "Can't Connect Server/DB";
}
?>
