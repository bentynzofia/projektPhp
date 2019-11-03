<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>login</title>
    <link rel="stylesheet" href="css/login.css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,900|Varela+Round&display=swap" rel="stylesheet">
  </head>
  <body >
    <div class="content">
      <div class="imagePanel">
        <img src="css/img/loginPic.png" alt="">
        <h1>wiseau</h1>
        <h3>wiseau</h3>

      </div>
      <div onmouseover="f1()" class="login">
        <input class="logIn"placeholder="Username" type="text" name="username" autocomplete="off" autofocus><br />
        <input class="logIn" placeholder="Password" type="password" name="password" autocomplete="off"><br />
        <input class="loginButton"type="submit" name="submit" value="Let's get started!"
         onclick="window.location.href='http://localhost/projektPhp/user/index.php'">
        <input class="loginButton"type="submit" name="submit" value="Catch up!"
         onclick="window.location.href='http://localhost/projektPhp/signIn.php'">

      </div>

    </div>
    <script type="text/javascript">

      function f1(){
        document.getElementsByClassName("imagePanel")[0].style.backgroundColor = "#9fb8d1";
        setTimeout(f2, 1000);
      }
      function f2(){
        document.getElementsByClassName("imagePanel")[0].style.backgroundColor = "white";

      }

    </script>
  </body>
</html>
