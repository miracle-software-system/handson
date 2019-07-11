<?php
	define("HOSTNAME","127.0.0.1");
	define("USERNAME","root");
	define("PASSWORD","iiopr");
	define("DATABASE","hybridisation");
	
	$dbhandle = new mysqli(HOSTNAME,USERNAME,PASSWORD,DATABASE)or die("Unable to connect to the database");
?>