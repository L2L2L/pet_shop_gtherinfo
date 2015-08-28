
<?php
// define variables and set to empty values
$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["firstName1"])) {
     $error .= "first name is required<br />";
   } else {
     $firstName1 = test_input($_POST["firstName1"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$firstName1)) {
       $error .= "first name Only letters and white space allowed<br />"; 
     }
   }
   
   if (empty($_POST["lastName1"])) {
     $error .= "last name is required<br />";
   } else {
     $lastName1 = test_input($_POST["lastName1"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$lastName1)) {
       $error .= "last name Only letters and white space allowed<br />"; 
     }
   }
   
   if (empty($_POST["email1"])) {
     $error .= "Email is required<br />";
   } else {
     $email1 = test_input($_POST["email1"]);
     // check if e-mail address is well-formed
     if (!filter_var($email1, FILTER_VALIDATE_EMAIL)) {
       $error .= "Invalid email format<br />"; 
     }
   }

   if (empty($_POST["textcomments1"])) {
     $error .= "comment cannot be empty<br />";
   } else {
     $textcomments1 = test_input($_POST["textcomments1"]);
   }
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

if (strlen($error)!==0) {
    echo "Error: The following field has an error:<br />" .$error;
} else {
    echo "success";
}
?>