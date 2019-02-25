<?php 
	
	define ('ROOT_PATH', realpath(dirname(__FILE__)));
	define('BASE_URL', 'https://foodprint.ecellvnit.org/');
	 // connect to database
	$conn = mysqli_connect("localhost", "root", "", "db");
    // $conn = mysqli_connect("localhost:3306", "vishnu", "vishnufoodprint123", "foodprint");

    if (!$conn) {
        die("Error connecting to database: " . mysqli_connect_error());
    }
?>