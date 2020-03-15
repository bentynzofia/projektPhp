<?php
@include_once("../func/connection.php");
if(isset($_POST["but"])){

echo<<<fo
<div class="formOpt">

  <form method="post" action="sets.php" class="leftPanel">
  <input placeholder="how many words?" class="button" type="number" name="amount"/>
    <input class="button" type="submit" name="wordsAmt" value="done!"/>
  </form>
  </div>
fo;




}
if(isset($_POST['wordsAmt'])){


  $wordsAmount = $_POST["amount"];
echo  '<div class="formOpt">';

echo    '<form method="post" action="sets.php" class="leftPanel">';
echo '<input placeholder="set name" class="button" type="text" name="setName"/>';

    for($i=1; $i<=$wordsAmount; $i++){
      echo "<div class='leftPanelDiv'>";
        echo "<input placeholder='word $i' class='button' type='text' name='eng[]'/>";
        echo "<input placeholder='translation $i' class='button' type='text' name='pl[]'/>";
      echo "</div>";
    }
echo      "<input class='button' type='hidden' name='hiddenInput' value='$wordsAmount'/>";
echo      '<input class="button" type="submit" name="wordsSub" value="done!"/>';

echo    '</form>';
echo    '</div>';

}
if(isset($_POST['wordsSub'])&& !empty($_POST["setName"])){
  $wordsAmount = $_POST['hiddenInput'];
  $setName = $_POST["setName"];
  $sql = "INSERT INTO `sets`(`setId`, `setName`) VALUES (null,'$setName')";
  $result = mysqli_query($conn, $sql);

  for($j=0; $j<$wordsAmount; $j++){
    $word = $_POST["eng"][$j];
    $translation = $_POST["pl"][$j];

    $sqlW = "INSERT INTO `words`(`word`, `translation`)
              values ('$word', '$translation')";

    $resultW = mysqli_query($conn, $sqlW);
  }

}else if(isset($_POST['wordsSub']) && empty($_POST["setName"])){
  echo  '<div class="formOpt">';

  echo '<p class="alert">Name your set!</p>';
  echo    '</div>';
}
 ?>
