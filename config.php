<?php 
	session_start();

	// connect to database
	$conn = mysqli_connect("localhost", "root", "", "db");

	if (!$conn) {
		die("Error connecting to database: " . mysqli_connect_error());
	}

	define ('ROOT_PATH', realpath(dirname(__FILE__)));
	define('BASE_URL', 'http://localhost/foodprint/');
?>