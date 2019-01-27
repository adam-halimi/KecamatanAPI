<?php

	$server		= "localhost"; //sesuaikan dengan nama server
	$user		= "root"; //sesuaikan username
	$password	= ""; //sesuaikan password
	$database	= "db_smart"; //sesuaikan target databese
	
	$conn = mysqli_connect($server, $user, $password, $database);

	if (mysqli_connect_errno()) {

	echo "Gagal terhubung MySQL: " . mysqli_connect_error();

 	}

?>