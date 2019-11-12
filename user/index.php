<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>UserAcc</title>
    <link rel="stylesheet" href="../css/mainUser.css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,900|Varela+Round&display=swap" rel="stylesheet">
  </head>
  <body>
    <div onmouseover="f1()" class="nav">
      <p id="logo">wiseau</p>
      <div class="menu">
        <p class="menuUser"><a href="#">new lesson</a></p>
        <p class="menuUser"><a href="#">repetition</a></p>
      </div>

    </div>
    <div class="content">
      <div onmouseover="f2()" class="profile">
        <h1>Howdy Zosia</h1>
      </div>
      <div onmouseover="f3()" class="lvl">
        <h1>2 lvl</h1>
      </div>
      <div  onmouseover="f4()" class="lastShownWord">
        <h1>Lent</h1>
      </div>
      <div onmouseover="f5()" class="date">
        <h1>23-04-2020</h1>
      </div>


    </div>
    <script type="text/javascript">

    function f1(){
      document.getElementsByClassName("nav")[0].style.backgroundColor = #fff;
      setTimeout(f2, 1000);
    }
    function f2(){
      document.getElementsByClassName("profile")[0].style.backgroundColor = #fff;
      setTimeout(f2, 1000);
    }
    function f3(){
      document.getElementsByClassName("lvl")[0].style.backgroundColor = #fff;
      setTimeout(f2, 1000);
    }
    function f4(){
      document.getElementsByClassName("lastShownWord")[0].style.backgroundColor = #fff;
      setTimeout(f2, 1000);
    }
    function f5(){
      document.getElementsByClassName("date")[0].style.backgroundColor = #fff;
      setTimeout(f2, 1000);
    }
    function f2(){
      document.getElementsByClassName("nav")[0].style.backgroundColor = #9fa4d1;

    }

    </script>
  </body>
</html>
