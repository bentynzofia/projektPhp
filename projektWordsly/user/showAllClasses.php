<?php
@include_once("../func/connection.php");
if(isset($_POST["but4"])){
  $sql1 = "SELECT * FROM `teachers` where `teacherLogin`='$_SESSION[login]'";
  $result1 = mysqli_query($conn, $sql1);
  $row1 = mysqli_fetch_assoc($result1);
  $zalogowany = $row1['teacherId'];
  $sql = "SELECT * FROM `classes` where `teacherId`='$zalogowany'";
  $result = mysqli_query($conn, $sql);
  echo '<div class="formOpt">';
  echo '<form method="post" action="classes.php" class="leftPanel">';
  echo '<h3>Classes created: </h3>';

  $i = 0;
while($row = mysqli_fetch_assoc($result)){
  $className = $row["className"];
  echo '<input class="button" type="submit" name='.'class$i'.' value='.$className.'>';
  $i++;
}
  echo '</form>';
  echo '</div>';
}

if(isset($_POST['class$i'])){
  $chosenClass = $_POST['class$i'];
  $sqlS = "SELECT `className`, `studentLogin` FROM `classes` inner join `students` on `students`.`classId` = `classes`.`classId` where `className`='$chosenClass'";
  $resultS = mysqli_query($conn, $sqlS);
  echo  '<div class="formOpt">';
  echo    '<form method="post" action="classes.php" class="leftPanel">';
  echo '<h3>Students in your \''.$chosenClass.'\' class:  </h3>';

  $j = 0;
  while($row = mysqli_fetch_assoc($resultS)){
    $stud = $row["studentLogin"];
    echo '<input class="button" type="submit" name='.'stud$j'.' value='.$stud.'>';
    $j++;
  }
  echo '</form>';
  echo '</div>';
}
?>
