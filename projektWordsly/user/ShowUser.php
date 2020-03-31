<?php
@include_once("../func/connection.php");

if(isset($_POST["butT"])){
  $sq = "SELECT * FROM `teachers`";
  $result1 = mysqli_query($conn, $sq);
  $row1 = mysqli_fetch_assoc($result1);
  echo '<div class="formOpt">';
  echo '<form method="post" action="ShowUser.php" class="leftPanel">';
    echo '<h3>Teachers:</h3>';
    $i = 0;
  while($row1 = mysqli_fetch_assoc($result1)){
    $teac = $row1["teacherLogin"];
    echo '<input disabled class="button" type="submit" name='.'user$i'.' value='.$teac.'>';
    $i++;
  }
  echo '</form>';
  echo '</div>';

}

if(isset($_POST["butS"])){
  $sql = "SELECT * FROM `students`";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  echo '<div class="formOpt">';
  echo '<form method="post" action="ShowUser.php" class="leftPanel">';
    echo '<h3>Students:</h3>';
    $i = 0;
  while($row = mysqli_fetch_assoc($result)){
    $stud = $row['studentLogin'];
    echo '<input disabled class="button" type="submit" name='.'user$i'.' value='.$stud.'>';
    $i++;
  }
  echo '</form>';
  echo '</div>';
}
 ?>
