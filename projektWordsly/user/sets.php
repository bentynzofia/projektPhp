<?php
session_start();
require("inc/index.php");
require("setAdd.php");
require("showAll.php");
 ?>
 <div class="studentInterface">
 </div>
 <div class="studentContain">
   <div class="buttons">
     <div class="menuOpt">
     <form method="post" action="sets.php" class="">
       <input class="button inputCol" type="submit" name="but2" value="show all">
       <input class="button inputCol" type="submit" name="but" value="add">
       <button type="button" class="button"name="button3">
         <a href="student.php">back</a>
       </button>
     </form>
    </div>
  </div>
 </div>
 <img src="../styles/img/notebook.svg" alt="">
</div>
</body>
</html>
