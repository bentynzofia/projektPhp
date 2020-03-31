<?php
session_start();
include("inc/index.php");
include("ShowUser.php");
 ?>
      <div class="studentInterface">
      </div>
      <div class="studentContain">
        <div class="buttons">
          <div class="menuOpt">
            <form class="" action="admin.php" method="post">

              <input type="submit" class="button" name="butT" value="teachers">
              <input type="submit" class="button"name="butS" value="students" />
            </form>
            <button type="button" name="button" class="button">
              <a href="../login/logout.php">log out</a>
            </button>
          </div>
        </div>
      </div>
      <img src="../styles/img/settings (1).svg" alt="">
    </div>
  </body>
</html>
