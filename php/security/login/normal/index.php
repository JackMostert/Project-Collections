<?php 

//checks if server messages were sent
if (isset($_COOKIE["status"]) && !empty($_COOKIE["status"])) {
  $status = $_COOKIE["status"];
  $message = $_COOKIE["message"];
}

?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link rel="stylesheet" href="main.css">
  <body>

    <div class="container center">

      <h1>Login</h1>
      <div class='message <?php echo $status ?>'><p><?php echo $message ?></p></div>

      <form class="center" action="./login.php" method="POST">
        <input class="email"      type="email"     name="email"    placeholder="Email*"    >
        <input class="password"   type="password"  name="password" placeholder="Password*" >
        <input class="submit"     type="submit"    name="submit"   value="LOGIN">
      </form>

      <p style="margin-bottom: 0px;"><b>Email :</b> test@test.com</p>
      <p><b>Password :</b> abc</p>

    </div>

  </body>

</html>