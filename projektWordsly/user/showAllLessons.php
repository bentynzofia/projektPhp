<?php
@include_once("../func/connection.php");
if(isset($_POST["but6"])){
  $sql1 = "SELECT * FROM `teachers` where `teacherLogin`='$_SESSION[login]'";
  $result1 = mysqli_query($conn, $sql1);
  $row1 = mysqli_fetch_assoc($result1);
  $zalogowany = $row1['teacherId'];
  //echo $zalogowany;
  $sql = "SELECT * FROM `lessons` where `teacherId`='$zalogowany'";
  $result = mysqli_query($conn, $sql);
echo '<div class="formOpt">';
echo '<form method="post" action="lessonsT.php" class="leftPanel">';
echo '<h3>Lessons created: </h3>';

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
  echo '<form method="post" action="lessonsT.php" class="leftPanel">';
  echo '<h3>Words in your \''.$chosenLesson.'\' lesson: </h3>';
  echo '<pre><h6>words:                    translation:</h6></pre>';



  $j = 0;
  while($row = mysqli_fetch_assoc($resultS)){
    $translation = $row["Ltranslation"];
    $word = $row["Lword"];
     echo '<input disabled class="button" type="submit" name='.'word$j'.' value='.$word.'>';
     echo '<input disabled class="button" type="submit" name='.'translation$j'.' value='.$translation.'>';
     $j++;
  }
  echo '</form>';
  echo '</div>';
}
?>
