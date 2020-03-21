<?php
@include_once("../func/connection.php");
if(isset($_POST["but7"])){

echo<<<fo
<div class="formOpt">
  <form method="post" action="lessonsT.php" class="leftPanel">
<h3>Add lesson: </h3>
  <input placeholder="how many words?" class="button" type="number" name="amount"/>
    <input class="button" type="submit" name="wordsAmt" value="done!"/>
  </form>
  </div>
fo;
}

if(isset($_POST['wordsAmt'])){
$wordsAmount = $_POST["amount"];
echo '<div class="formOpt">';
echo '<form method="post" action="lessonsT.php" class="leftPanel">';
echo '<h3>Add lesson: </h3>';

echo '<input placeholder="lesson name" class="button" type="text" name="lessonName"/>';
echo '<input placeholder="class name" class="button" type="text" name="className"/>';
    for($i=1; $i<=$wordsAmount; $i++){
      echo "<div class='leftPanelDiv'>";
        echo "<input placeholder='word $i' class='button' type='text' name='eng[]'/>";
        echo "<input placeholder='translation $i' class='button' type='text' name='pl[]'/>";
      echo "</div>";
    }
echo "<input class='button' type='hidden' name='hiddenInput' value='$wordsAmount'/>";
echo '<input class="button" type="submit" name="wordsSub" value="done!"/>';
echo '</form>';
echo '</div>';
}

if(isset($_POST['wordsSub'])&& !empty($_POST["lessonName"])&& !empty($_POST["className"])){
  $sql1 = "SELECT * FROM `teachers` where `teacherLogin`='$_SESSION[login]'";
  $result1 = mysqli_query($conn, $sql1);
  $row1 = mysqli_fetch_assoc($result1);
  $zalogowany = $row1['teacherId'];
  //echo $zalogowany;
  $className = $_POST["className"];
  $sql1 = "SELECT * FROM `classes` where `className`='$className'";
  $result1 = mysqli_query($conn, $sql1);
  $row1 = mysqli_fetch_assoc($result1);
  $classId = $row1['classId'];
  $wordsAmount = $_POST['hiddenInput'];
  $lessonName = $_POST["lessonName"];
  $sql = "INSERT INTO `lessons`(`lessonId`, `lessonName`, `classId`, `teacherId`) VALUES (null,'$lessonName', '$classId', $zalogowany)";
  $result = mysqli_query($conn, $sql);
  $sqlSI = "SELECT `lessonId`,`lessonName` from `lessons` where `lessonName`='$lessonName'";
  $result = mysqli_query($conn, $sqlSI);
  $row = mysqli_fetch_assoc($result);
  $lessonId=$row['lessonId'];
  for($j=0; $j<$wordsAmount; $j++){
    $word = $_POST["eng"][$j];
    $translation = $_POST["pl"][$j];
    $sqlW = "INSERT INTO `lessonswords`(`LwordId`, `Lword`, `Ltranslation`,`lessonId`)
              values (null, '$word', '$translation', $lessonId)";
    $resultW = mysqli_query($conn, $sqlW);
    if($resultW){
      //echo "ok";
    }else{
      echo mysqli_error($resultW);
      echo $word;
      echo $lessonId;
    }
  }
}else if(isset($_POST['wordsSub']) && empty($_POST["lessonName"]) || isset($_POST['wordsSub']) && empty($_POST["className"])){
  echo  '<div class="formOpt">';
  echo '<p class="alert">Name your lesson and pick your class!</p>';
  echo    '</div>';
}
 ?>
