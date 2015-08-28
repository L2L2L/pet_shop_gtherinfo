<?php
//define variables and set to empty values
$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

if (empty($_POST["firstName"])) {
$error .= "first name is required <br />";
} else {
$firstName = test_input($_POST["firstName"]);
//check is name only contains letters and whitespace
if (!preg_match("/^[a-zA-Z]*$/",$firstName)){
$error .= "first name only letters and white space allowed <br />";
  }
}



if (empty($_POST["midInit"])) {
$error .= "middle inital is required<br />";
}else{
$midInit = test_input($_POST["midInit"]);
//check is name only contain letters and whitespace
if (!preg_match("/^[a-zA-Z] *$/",$midInit)) {
$error .="middle inital only letters and white space allowed<br />";
 }
}


if (empty($_POST["lastName"])) {
$error .="last name is required<br />";
}else{
$lastName = test_input($_POST["lastName"]);
//check if name only contains letters and whitespace
if (!preg_match("/^[a-zA-Z]*$/",$lastName)) {
$error .="last name only letters and white space allowed<br />";
  }
}


if (empty($_POST["city"])) {
$error .="city is required<br />";
}else{
$city = test_input($_POST["city"]);
//check if name only contains letters and whitespace
if(!preg_match("/^[a-zA-Z]*$/",$city)) {
$error .="city name only letters and white space allowed<br />";
  }
}


if(empty($_POST["country"])) {
$error .="country is required<br />";
}else{
$country = test_input($_POST["country"]);
//check if name only contains letters and whitespace
if(!preg_match("/^[a-zA-Z]*$/",$country)) {
$error .="please select only letters<br />";
  }
}



//attempted to complete it using number for regular expression
if(empty($_POST["zipCode"])) {
$error .= "zip code is required<br />";
}else{
$email = test_input($_POST["zipCode"]);
//check if zip code only contains numbers
if (!preg_match("/^[0-9]{5}([-]?[0-9]{4})?$/",$zipCode)) {
$error .="must select only numbers<br />";
  }
}


//attempted to complete it using email
if(empty($_POST["email"])) {
$error .= "Email is required<br />";
}else{
$email = test_input($_POST["e-mail"]);
//check if email address is well formed
if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
  $error .= "Invalid email format<br />";
  }
}


if(empty($_POST["petName"])) {
$error .= "pet name is required<br />";
}else{
$petName = test_input($_POST["petName"]);
//check if pet name only contains letters and whitespace
if(!preg_match("/^[a-zA-Z]*$/",$petName)) {
$error .= "pet name only letters and white space allowed <br />";
  }
}



//Issue doing the spayedOrNeutred combination



//attempted to complete the reqular expression for pet age using numbers
if(empty($_POST["petAge"])) {
$error .="pet age is required<br />";
}else{
$petAge = test_input($_POST["petAge"]);
//check if pet age only contains numbers
if (!preg_match("/^[0-9]{5}([-]?[0-9]{4})?$/",$petAge)) {
$error .= "pet age is only numbers and not letters<br />";
  }
}






function test_input($data) {
$data = trim(data);
$data = stripslashes($data);
$data = htmlspecialchars(data);
return $data;
}



if (strlen($error)!==0) {
    echo "Error: The following field has an error:<br />" .$error;
} else {
    echo "success";
}





?>
