<?php
include('../inc/logisignin.php');
include('../../func/db/conn.php');
 ?>

        <form  method="post">
          <input type="text" name="login" value="" placeholder="username" autocomplete="off">
          <input type="text" name="email" value="" placeholder="email" autocomplete="off">
          <input type="password" name="password" value="" placeholder="password" autocomplete="off"></br>
          <input type="radio" id="user1" name="user" value="student">
          <label  for="user1"><span></span>student</label>
          <input type="radio" class="" id="user2" name="user" value="teacher">
          <label for="user2"><span></span>teacher</label>
          <input type="submit" class="fillIn space button" name="register" value="let's get it">
        </form>

      </div>
      </div>

      <img src="../../img/8852.jpg" alt="">

    </div>
    <?php
    $conn->close();
     ?>
  </body>
</html>
