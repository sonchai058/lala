<?php
function conDB() {
	$servername = "localhost";
	$username = "lalabeauty_root";
	$password = "Nt8ri3c73L";
	$db = "lalabeauty_db201911170914";

	$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
	if($uriSegments[1]=='lala') {
		$servername = "lalabeauty.co.th";
	}

	// Create connection
	$conn = mysqli_connect($servername, $username, $password);
	mysqli_select_db($conn,$db);
	mysqli_set_charset($conn,"utf8");

	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	//echo "Connected successfully";
	return $conn;
}
?>