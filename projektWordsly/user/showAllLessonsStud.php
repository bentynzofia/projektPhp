<?php
@include_once("../func/connection.php");
if(isset($_POST["but10"])){
  $sql1 = "SELECT * FROM `students` where `studentLogin`='$_SESSION[login]'";
  $result1 = mysqli_query($conn, $sql1);
  $row1 = mysqli_fetch_assoc($result1);
  $zalogowany = $row1['studentId'];
  //echo $zalogowany;
  $sql2 = "SELECT * FROM `students` where `studentId`='$zalogowany'";
  $result2 = mysqli_query($conn, $sql2);
  $row = mysqli_fetch_assoc($result2);
  $klasa = $row["classId"];
//echo $klasa;
  $sql = "SELECT * FROM `lessons` where `classId`='$klasa'";
  $result = mysqli_query($conn, $sql);
echo '<div class="formOpt">';
echo '<form method="post" action="lessonsS.php" class="leftPanel">';
echo '<h3>Your lessons: </h3>';

  $i = 0;
while($row = mysqli_fetch_assoc($result)){
  $lessonName = $row["lessonName"];
  echo '<input class="button" type="submit" name='.'lesson$i'.' value='.$lessonName.'>';
  $i++;
}
echo '</form>';
echo '</div>';
}

if(isset($_POST['lesson$i'])){
  $chosenLesson = $_POST['lesson$i'];
  $sqlS = "SELECT `lessonName`, `Lword`, `Ltranslation` FROM `lessons` inner join `lessonswords` on `lessonswords`.`lessonId` = `lessons`.`lessonId` where `lessonName`='$chosenLesson'";
  $resultS = mysqli_query($conn, $sqlS);
  echo '<div class="formOpt">';
  echo '<form method="post" action="lessonsS.php" class="leftPanel">';
  echo '<h3>Words in your \''.$chosenLesson.'\' lesson: </h3>';
  echo '<pre><h6>words:                    translation:</h6></pre>';
  $j = 0;
  while($row = mysqli_fetch_assoc($resultS)){
    $translation = $row["Ltranslation"];
    $word = $row["Lword"];
     echo '<input class="button" type="submit" name='.'word$j'.' value='.$word.'>';
     echo '<input class="button" type="submit" name='.'translation$j'.' value='.$translation.'>';
     $j++;
  }
  echo '</form>';
  echo '</div>';
}
?>
