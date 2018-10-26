<?php
$servername = "localhost";
$dbusername = "root";
$dbpassword = "root";
$db = "credit_rescue";

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $db);

// Check connection
if ($conn->connect_error) {
    die("connection error" . $conn->connect_error);
    $conn_status = "no database connection";
}else{
	//echo "Connected successfully";
	$conn_status = "database connected";
}

?>