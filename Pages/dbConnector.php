<?php
	$username = "root";
	$password = "";
	$host = "localhost";

	global $connector;
	$connector = mysqli_connect($host, $username, $password, "ticket")
		or die("Unable to connect to my sql.");

?>