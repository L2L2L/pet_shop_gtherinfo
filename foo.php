<?php
//functions:
//test input:
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
//connect to database:
function connectToDB(){
  $servername = "https://sc-l2l2l.c9.io";//"localhost";
  $username = "root";
  $password = "pwdpwd";
  $db = "pet_shop";
  
  //Creating the connection to the database name pet_shop
  $conn = new mysqli($localhost,$root,$pwdpwd,$pet_shop);
  
  //Checking Connection
  if ($conn->connect_error) {
          die ("\nConnection failed: " . $conn->connect_error);
  }
  echo "\nConnected successfully";
}

//define error and regexp variables:
$error = ""; 
$ltrSpc = "/^[a-zA-Z|\s]+$/";
$reNum = "/^[0-9]+$/";

//get values:
$firstName = test_input($_POST["firstName"]);
$midInit = test_input($_POST["midInit"]);
$lastName = test_input($_POST ["lastName"]);
$city = test_input($_POST["city"]);
$stateProvince = test_input($_POST["stateProvince"]);
$country = test_input($_POST["country"]);
$catBreed = test_input($_POST["catBreed"]);
$dogBreed = test_input($_POST["dogBreed"]);
$petAge = test_input($_POST["petAge"]);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
if ( empty($firstName) ) {
 $error .= "first name is required<br />";
// check if name only contains letters and whitespace
} else if (!preg_match ($ltrSpc, $firstName)) {
 $error .= "first name only letters and no white space allow<br />";
}

if (empty($midInit)) {
  $error .= "middle initial is required<br />";
// check if name only contains letters and whitespace
} else if (!preg_match ($ltrSpc, $midInit)) {
$error .= "middle initial only letters and white space allowed<br />";
}

if ( empty($lastName)) {
$error .= " last name is required<br />";
// check if name only contains letters and whitespace
} else if (!preg_match ($ltrSpc, $lastName )) {
$error .= "last name only letters and white space allowed<br />";
}

if (empty($city) ) {
  $error .= "a city is required ";
  //check if city only contain letters and whitespace
} else if (!preg_match ($ltrSpc, $city)) {
  $error .= "city only and letters and white space allowed<br />";
}

if ( empty($stateProvince) ) {
  $error .= " a state or a province is required<br />";
  //check if state or province is checked
} else if (!preg_match ($ltrSpc, $stateProvince )) {
  $error .= "stateprovince only and letters and white space allowed<br />";
}

if (empty ($_POST ["country"] )) {
  $error .= "a country must be selected<br />";
  //check if country was selected
} else if (!preg_match ($ltrSpc, $country )) {
  $error .= "country only and letter and white space allowed<br />";
}

if ( empty($petAge) ){
 $error .= "pet age must be enter<br />";
  //check if country was selected
 } else if (!preg_match($reNum, $petAge) ) {
 $error .= "pet age only enter numbers<br />";
}

if ( ($dogBreed&&$catBreed) || 
     ($dogBreed == ""&&$catBreed == "") ) {
   $error .= "You must must pick either a dog or a cat breed<br />";
} else if ( !empty($catBreed) ) {
 if ( !preg_match($ltrSpc,$catBreed) ) {
  $error .= "cat bread only enter numbers<br />";
 }
}  else if (!empty($dogBreed) ) {
 if ( !preg_match($ltrSpc,$dogBreed) ) {
  $error .= "dog bread only enter numbers<br />";
 }
} else if ($_POST["catBreed"]) {
 #add to database
} else if ($_POST["dogBreed"]) {
 #add to database
}
if ($error){
 echo "<br />" .$error  ."<br />";
} else {
 echo "<br />Sucess! Your appointment is set!<br />";
 connectToDB();
}
} else {
 //GET request
}
?>