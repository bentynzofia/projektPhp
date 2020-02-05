<?php
include('../inc/logisignin.php');
include('../../func/db/conn.php');
 ?>

        <form  method="post">
          <input type="text" name="login" value="" placeholder="username" autocomplete="off"
          <?php
          if(isset($row1['studentLogin'])){
            if( $row1['studentLogin'] == $login){
              echo 'style="border-bottom:1px solid red;"';
            }
          }else if(isset($row1['teacherLogin'])){
            if($row1['teacherLogin'] ==$login){
              echo 'style="border-bottom:1px solid red;"';
            }
          } ?>>
          <input type="text" name="email" value="" placeholder="email" autocomplete="off"
          <?php
          if(isset($row2['studentEmail'])){
            if(!filter_var($email, FILTER_VALIDATE_EMAIL) || $row2['studentEmail'] == $email){
              echo 'style="border-bottom:1px solid red;"';
            }
          } if(isset($row2['teacherEmail'])){
              if(!filter_var($email, FILTER_VALIDATE_EMAIL) ||$row2['teacherEmail'] ==$email){
                echo 'style="border-bottom:1px solid red;"';
              }
            } ?>>
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
