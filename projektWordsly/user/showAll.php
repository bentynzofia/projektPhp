<?php
@include_once("../func/connection.php");
if(isset($_POST["but2"])){
$sql = 'SELECT * FROM `sets`';
$result = mysqli_query($conn, $sql);

echo  '<div class="formOpt">';

echo    '<form method="post" action="sets.php" class="leftPanel">';
  $i = 0;
while($row = mysqli_fetch_assoc($result)){
  $setName = $row["setName"];
  echo      '<input class="button" type="submit" name='.'set$i'.' value='.$setName.'>';
  $i++;
}
echo    '</form>';
echo    '</div>';

}
if(isset($_POST['set$i'])){
  
}

?>
