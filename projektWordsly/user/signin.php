<?php
include("inc/loginlayout.php");
include("../rejestration/register.php");
 ?>
        <form  method="post">
          <input type="text" name="login" value="" placeholder="username" autocomplete="off"
          <?php
            if($logfiltr==1){
                echo 'style="border-bottom:1px solid red;"';
            }
           ?>
          >
          <input type="text" name="email" value="" placeholder="email" autocomplete="off"
          <?php
            if($emailfiltr==1){
                echo 'style="border-bottom:1px solid red;"';
            }
           ?>
          >
          <input type="password" name="password" value="" placeholder="password" autocomplete="off"></br></br>
          <select class="userType" name="userType">
            <option  value="student">student</option>
            <option  value="teacher">teacher</option>
          </select>
          <input type="submit" class="fillIn space button" name="registering" value="let's get it">
        </form>
      </div>
      </div>
      <img src="../../img/8852.jpg" alt="">
    </div>
  </body>
</html>
