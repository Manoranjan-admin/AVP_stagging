<?php

error_reporting(0);
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$org_servername = "localhost";
$org_dbusername = "rishidhkannantest";
$org_dbpassword = "#!Sx8;Ix9O3^isb-";
$org_dbname = "rishidhkannan_test";

/**** SQL CONNECTION START ****/
connecttodb($org_servername,$org_dbname,$org_dbusername,$org_dbpassword);
mysqli_query($GLOBALS["___mysqli_ston"], "SET @@global.sql_mode= ''");

function connecttodb($org_servername,$org_dbname,$org_dbusername,$org_dbpassword)
{
	global $org_link;
	$org_link=($GLOBALS["___mysqli_ston"] = mysqli_connect($org_servername, $org_dbusername, $org_dbpassword));
	if(!$org_link)
	{
		die("could not connect to mysql 321");
	}

	mysqli_select_db($org_link, $org_dbname) or die ("could not open database".mysqli_error($GLOBALS["___mysqli_ston"]));
	((bool)mysqli_set_charset($GLOBALS["___mysqli_ston"], "utf8"));

}
?>