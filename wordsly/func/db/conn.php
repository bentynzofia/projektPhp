<?php

$conn = mysqli_connect('localhost', 'root', '', 'wordsly');
// sprawdzam polaczenie
if ($conn===false) {
    die("Błąd połączenia: " . mysqli_connect_error());
}else{
echo "szczypiorek";

}
//sql for registration
if(isset($_POST['register'])) {
echo "szcz";
if(!empty($_POST['login'])&&!empty($_POST['password'])&&!empty($_POST['email'])&&isset($_POST['user'])){
  $login = $_POST['login'];
  $password=$_POST['password'];
  $email=$_POST['email'];

  $sqlStudent = "INSERT INTO `students`(`studentId`, `studentLogin`, `studentPassword`, `studentEmail`) VALUES ('','$login','$password','$email')";
  $sqlTeacher = "INSERT INTO `teachers`(`teacherId`, `teacherLogin`, `teacherEmail`, `teacherPassword`) VALUES ('','$login','$email', '$password')";


  if($_POST['user'] == "student"){
    echo "student";
    if(mysqli_query($conn, $sqlStudent)){
        echo "jeje";
    }else{
      echo "ERROR: Could not able to execute myself"."</br>" . mysqli_error($conn);
    }}
  } if($_POST['user'] == "teacher"){
    echo "teacher";
    if(mysqli_query($conn, $sqlTeacher)){
      echo "fufu";
    }else{
      echo "ERROR: Could not able to execute myself"."</br>" . mysqli_error($conn);

    }}
    ?>
