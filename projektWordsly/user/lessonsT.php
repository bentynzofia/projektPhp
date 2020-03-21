<?php
session_start();
require("inc/index.php");
require("addLesson.php");
require("showAllLessons.php");
 ?>
 <div class="studentInterface">
 </div>
 <div class="studentContain">
   <div class="buttons">
<div class="menuOpt">
     <form method="post" action="lessonsT.php" class="">
       <input class="button inputCol" type="submit" name="but6" value="show all">
       <input class="button inputCol" type="submit" name="but7" value="add">
       <button type="button" class="button" name="button8">
         <a href="teacher.php">back</a>
       </button>
     </form>
</div>
  </div>
 </div>
 <img src="../styles/img/notebook.svg" alt="">
</div>
</body>
</html>
