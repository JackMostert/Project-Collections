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
      <div id="amed" class=''><p id="mess"></p></div>

      <form class="center" id="myForm">
        <input id="email" class="email"      type="email"     name="email"    placeholder="Email*"    >
        <input id="password" class="password"   type="password"  name="password" placeholder="Password*" >
        <input class="submit"     type="submit"    name="submit"   value="LOGIN">
      </form>

      <p style="margin-bottom: 0px;"><b>Email :</b> test@test.com</p>
      <p><b>Password :</b> abc</p>

    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
      $("#myForm").submit(function(event){
        event.preventDefault();
        var email = $("#email").val();
        var password = $("#password").val();
        $.post("login.php", {email: email, password: password}, function(data, status){
          if (status === 'success') {
            let returned = JSON.parse(data);
            $("#amed").attr("class","message " + returned.status);
            $("#mess").text(returned.message);
          }
        });
      });
    </script>

  </body>

</html>