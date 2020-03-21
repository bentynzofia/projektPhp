<?php
@include_once("../func/connection.php");
if(isset($_POST["but9"])){
  $sql1 = "SELECT * FROM `students` where `studentLogin`='$_SESSION[login]'";
  $result1 = mysqli_query($conn, $sql1);
  $row1 = mysqli_fetch_assoc($result1);
  $zalogowany = $row1['studentId'];

  $sql2 = "SELECT * FROM `students` where `studentId`='$zalogowany'";
  $result2 = mysqli_query($conn, $sql2);
  $row = mysqli_fetch_assoc($result2);
  $klasa = $row["classId"];

  $sql3 = "SELECT * FROM `classes` where `classId`='$klasa'";
  $result3 = mysqli_query($conn, $sql3);
  $row2 = mysqli_fetch_assoc($result3);
  $klasaName = $row2["className"];
  echo '<div class="formOpt">';
  echo '<form method="post" action="lessonsS.php" class="leftPanel">';
  echo '<h3>Your class: </h3>';
  echo '<input class="button" type="submit" name="klasa" value='.$klasaName.'>';
  echo '</form>';
  echo '</div>';
}
?>
