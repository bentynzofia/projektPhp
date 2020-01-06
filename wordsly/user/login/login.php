<?php
include('../inc/logisignin.php');
include('../../func/login/registration.php')
 ?>
 <form  method="post">
   <input type="text" name="login" value="" placeholder="username" autocomplete="off">
   <input type="password" name="password" value="" placeholder="password" autocomplete="off"></br>
   <input type="submit" class="button fillIn" name="login" value="login">
   <p class="space ">Not having an account already?</p>
   <input class="button space" type="submit" name="button" value="register">

 </form>


      </div>
      </div>

      <img src="../../img/8852.jpg" alt="">

    </div>

  <!-- <script>
//Create div element
var div = document.createElement("div");
//Give a height to div
div.style.height ="100vh";
//Append div to document
document.body.appendChild(div);
//Add event listener so document can listen to mouse movements
div.addEventListener("mousemove", function(event) {
var x = event.clientX - 70,
y = event.clientY-250;
div.style.backgroundColor = "rgb("+x +", "+y+", 205)";
} )
</script> -->
  </body>
</html>
