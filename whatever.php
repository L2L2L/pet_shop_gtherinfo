<?php

$servername = "localhost";
$username = "root";
$password = "pwdpwd";
$db = "pet_shop";

//Creating the connection to the database name pet_shop
$conn = new mysqli($localhost,$root,$pwdpwd,$pet_shop);

//Checking Connection
if ($conn->connect_error) {
        die ("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

?>
