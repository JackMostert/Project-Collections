<?php

// <--- ---> where you include the database connection

//ENV vars
$ENV_salt = '$6$rounds=1000$845jsgdhf82xgdktm47cf5$';

// custom functions
function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
   return preg_replace('/[^A-Za-z0-9@.\-]/', '', $string); // Removes special chars.
}

function serverMessage($stat, $mesg) {
  setcookie("status", $stat, time() + 1, "/");
  setcookie("message", $mesg, time() + 1, "/");
  header('Location: index.php');
  exit();
}

//will return false if not empty
define("EMAIL", !empty($_POST['email']));
define("PASSWORD", !empty($_POST['password']));

//check if inputs are populated
//else if used to make sure nothing gets missed
if (EMAIL == false) {
  serverMessage("error", "Error: email cannot be left blank");
} else if (PASSWORD == false) {
  serverMessage("error", "Error: password cannot be left blank");
} else {
  define("cleanEMAIL", clean($_POST['email']) );
  define("cleanPASSWORD", clean($_POST['password']) );
  //where you would querry the database for a matching email
  if (cleanEMAIL == 'test@test.com') {

    //crypt the password to send off the the server
    $safePassword = crypt(cleanPASSWORD, $ENV_salt);

    //where you would querry the database for a matching password
    if ('$6$rounds=1000$845jsgdhf82xgdkt$lZzG9QPFNJjQTE0cLfKxFU6wwdXSdQspMDyC1BGNCOa4p2WPeCuLmcS5FmQfGVyBkmJ0LZRdUcudTmnIh8cBx/' == $safePassword) {
      serverMessage("success", "Success: you are now loged in");
    } else {
      serverMessage("error", "Error: email or password is incorrect");
    }

  } else {
    serverMessage("error", "Error: email or password is incorrect");
  }
}


?>