<?php

// <--- ---> where you include the database connection

//ENV vars
$ENV_salt = '$6$rounds=1000$845jsgdhf82xgdktm47cf5$';

// custom functions
function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
   return preg_replace('/[^A-Za-z0-9@.\-]/', '', $string); // Removes special chars.
}

function message($code, $msg) {
  $return_arr = [
    "message" => $msg,
    "status" => $code
  ];
  return json_encode($return_arr);
}

//will return false if not empty
define("EMAIL", !empty($_POST['email']));
define("PASSWORD", !empty($_POST['password']));

//check if inputs are populated
//else if used to make sure nothing gets missed
if (EMAIL == false) {
  echo message("error", "Email cannot be left blank");
} else if (PASSWORD == false) {
  echo message("error", "Password cannot be left blank");
} else {
  define("cleanEMAIL", clean($_POST['email']) );
  define("cleanPASSWORD", clean($_POST['password']) );
  //where you would querry the database for a matching email
  if (cleanEMAIL == 'test@test.com') {

    //crypt the password to send off the the server
    $safePassword = crypt(cleanPASSWORD, $ENV_salt);

    //where you would querry the database for a matching password
    if ('$6$rounds=1000$845jsgdhf82xgdkt$lZzG9QPFNJjQTE0cLfKxFU6wwdXSdQspMDyC1BGNCOa4p2WPeCuLmcS5FmQfGVyBkmJ0LZRdUcudTmnIh8cBx/' == $safePassword) {
      echo message("success", "You are now loged in");
    } else {
      echo message("error", "email or password is incorrect");
    }

  } else {
    echo message("error", "email or password is incorrect");
  }
}


?>