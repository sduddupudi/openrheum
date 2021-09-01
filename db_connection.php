<?php

$servername = "localhost";

$username = "openrheum.com";

$password = "Dorier@2021";

$dbname = "openrheum.com";



// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection

if ($conn->connect_error) {

  die("Connection failed: " . $conn->connect_error);

}

$siteURL = 'https://staging.openrheum.com/';

$customerID = '1';




?>