<?php
@include_once("../func/connection.php");
if(isset($_POST["but2"])){
  $sql1 = "SELECT * FROM `students` where `studentLogin`='$_SESSION[login]'";
  $result1 = mysqli_query($conn, $sql1);
  $row1 = mysqli_fetch_assoc($result1);
  $zalogowany = $row1['studentId'];
  $sql = "SELECT * FROM `sets` where `studentId`='$zalogowany'";
  $result = mysqli_query($conn, $sql);
echo '<div class="formOpt">';
echo '<form method="post" action="sets.php" class="leftPanel">';
  echo '<h3>Your sets: </h3>';
  $i = 0;
while($row = mysqli_fetch_assoc($result)){
  $setName = $row["setName"];
  echo '<input class="button" type="submit" name='.'set$i'.' value='.$setName.'>';
  $i++;
}
echo '</form>';
echo '</div>';
}

if(isset($_POST['set$i'])){
  $chosenSet = $_POST['set$i'];
  $sqlS = "SELECT `setName`, `word`, `translation` FROM `sets` inner join `words` on `words`.`setId` = `sets`.`setId` where `setName`='$chosenSet'";
  $resultS = mysqli_query($conn, $sqlS);
  echo '<div class="formOpt">';
  echo '<form method="post" action="sets.php" class="leftPanel">';
  echo '<h3>Words in \''.$chosenSet.'\' set: </h3>';
  echo '<pre><h6>words:                    translation:</h6></pre>';
  $j = 0;
  while($row = mysqli_fetch_assoc($resultS)){
    $translation = $row["translation"];
    $word = $row["word"];
     echo '<input class="button" type="submit" name='.'word$j'.' value='.$word.'>';
     echo '<input class="button" type="submit" name='.'translation$j'.' value='.$translation.'>';
     $j++;
  }
  echo '</form>';
  echo '</div>';
}
?>
