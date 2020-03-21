<?php
session_start();
require("inc/index.php");
require("showAllLessonsStud.php");
include("yourClass.php");
 ?>
 <div class="studentInterface">
 </div>
 <div class="studentContain">
   <div class="buttons">
<div class="menuOpt">
     <form method="post" action="lessonsS.php" class="">
       <input class="button inputCol" type="submit" name="but10" value="show all">
       <input class="button inputCol" type="submit" name="but9" value="your class">
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
