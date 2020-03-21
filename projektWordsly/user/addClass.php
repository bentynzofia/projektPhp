<?php
@include_once("../func/connection.php");
if(isset($_POST["but5"])){

echo<<<fo
<div class="formOpt">
  <form method="post" action="classes.php" class="leftPanel">
  <h3>Add class: </h3>
  <input placeholder="how many students?" class="button" type="number" name="studAmount"/>
    <input class="button" type="submit" name="wordsAmt" value="done!"/>
  </form>
  </div>
fo;
}

if(isset($_POST['wordsAmt'])){
  $studAmount = $_POST["studAmount"];
echo '<div class="formOpt">';
echo '<form method="post" action="classes.php" class="leftPanel">';
echo '<h3>Add class: </h3>';

echo '<input placeholder="class name" class="button" type="text" name="className"/>';

    for($i=1; $i<=$studAmount; $i++){
      echo "<div class='leftPanelDiv'>";
      echo "<input placeholder='$i students login' class='button' type='text' name='slog[]'/>";
      echo "</div>";
    }
echo "<input class='button' type='hidden' name='hiddenInput' value='$studAmount'/>";
echo '<input class="button" type="submit" name="studSub" value="done!"/>';
echo    '</form>';
echo    '</div>';
}

if(isset($_POST['studSub'])&& !empty($_POST["className"])){
  $sql1 = "SELECT * FROM `teachers` where `teacherLogin`='$_SESSION[login]'";
  $result1 = mysqli_query($conn, $sql1);
  $row1 = mysqli_fetch_assoc($result1);
  $zalogowany = $row1['teacherId'];
  $studAmount = $_POST['hiddenInput'];
  $className = $_POST["className"];
  $sql = "INSERT INTO `classes`(`classId`, `className`, `teacherId`) VALUES (null,'$className', '$zalogowany')";
  $result = mysqli_query($conn, $sql);
  $sqlSI = "SELECT `classId`,`className` from `classes` where `className`='$className'";
  $result = mysqli_query($conn, $sqlSI);
  $row = mysqli_fetch_assoc($result);
  $classId=$row['classId'];
  for($j=0; $j<$studAmount; $j++){
    $stud = $_POST["slog"][$j];
    $sqlW= "UPDATE `students` SET `classId`=$classId WHERE `studentLogin`='$stud'";
    $resultW = mysqli_query($conn, $sqlW);
    if($resultW){
      //echo "ok";
    }else{
      echo mysqli_error($resultW);
      echo $stud;
      echo $classId;
    }
  }
}else if(isset($_POST['studSub']) && empty($_POST["className"])){
  echo  '<div class="formOpt">';
  echo '<p class="alert">Name your class!</p>';
  echo    '</div>';
}
 ?>
