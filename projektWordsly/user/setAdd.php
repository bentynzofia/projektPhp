<?php
@include_once("../func/connection.php");
if(isset($_POST["but"])){
echo<<<fo
<div class="formOpt">
  <form method="post" action="sets.php" class="leftPanel">
  <h3>Add set: </h3>
  <input placeholder="how many words?" class="button" type="number" name="amount"/>
    <input class="button" type="submit" name="wordsAmt" value="done!"/>
  </form>
  </div>
fo;
}

if(isset($_POST['wordsAmt'])){
$wordsAmount = $_POST["amount"];
echo '<div class="formOpt">';
echo '<form method="post" action="sets.php" class="leftPanel">';
echo '<h3>Add set: </h3>';

echo '<input placeholder="set name" class="button" type="text" name="setName"/>';
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

if(isset($_POST['wordsSub'])&& !empty($_POST["setName"])){
  $sql1 = "SELECT * FROM `students` where `studentLogin`='$_SESSION[login]'";
  $result1 = mysqli_query($conn, $sql1);
  $row1 = mysqli_fetch_assoc($result1);
  $zalogowany = $row1['studentId'];
  $wordsAmount = $_POST['hiddenInput'];
  $setName = $_POST["setName"];
  $sql = "INSERT INTO `sets`(`setId`, `setName`, `studentId`) VALUES (null,'$setName', '$zalogowany')";
  $result = mysqli_query($conn, $sql);
  $sqlSI = "SELECT `setId`,`setName` from `sets` where `setName`='$setName'";
  $result = mysqli_query($conn, $sqlSI);
  $row = mysqli_fetch_assoc($result);
  $setId=$row['setId'];
  for($j=0; $j<$wordsAmount; $j++){
    $word = $_POST["eng"][$j];
    $translation = $_POST["pl"][$j];
    $sqlW = "INSERT INTO `words`(`wordId`, `word`, `translation`, `setId`)
              values (null, '$word', '$translation', $setId)";
    $resultW = mysqli_query($conn, $sqlW);
    if($resultW){
      //echo "ok";
    }else{
      echo mysqli_error($resultW);
      echo $word;
      echo $setId;
    }
  }
}else if(isset($_POST['wordsSub']) && empty($_POST["setName"])){
  echo  '<div class="formOpt">';
  echo '<p class="alert">Name your set!</p>';
  echo    '</div>';
}
 ?>
