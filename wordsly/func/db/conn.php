<?php

$conn = mysqli_connect('localhost', 'root', '', 'wordsly');
// sprawdzam polaczenie
if ($conn===false) {
    die("Błąd połączenia: " . mysqli_connect_error());
}else{
//echo "szczypiorek";

}
//sql for registration
if(isset($_POST['register'])) {
//echo "szcz";
if(!empty($_POST['login'])&&!empty($_POST['password'])&&!empty($_POST['email'])&&isset($_POST['user'])){
  $login = $_POST['login'];
  $password=$_POST['password'];
  $email=$_POST['email'];

  //sprawdzam loginy
  $teacherLoginCheck = "SELECT `teacherLogin` FROM `teachers`";
  $resultTC = mysqli_query($conn, $teacherLoginCheck);
//aaa

  $sqlStudent = "INSERT INTO `students`(`studentId`, `studentLogin`, `studentPassword`, `studentEmail`) VALUES ('','$login','$password','$email')";
 $sqlTeacher = "INSERT INTO `teachers`(`teacherId`, `teacherLogin`, `teacherEmail`, `teacherPassword`) VALUES ('','$login','$email', '$password')";

  if($_POST['user'] == "student"){

      $studentLoginCheck = "SELECT `studentLogin` FROM `students` WHERE  `studentLogin`= '$login'";
      $resultSC = mysqli_query($conn, $studentLoginCheck);
      echo "<p>Ten login już jest zajęty</p>";
      $row1 = mysqli_fetch_assoc($resultSC);
      if($row1['studentLogin'] !== $login){
        //echo "student";
        if(mysqli_query($conn, $sqlStudent)){
            //echo "jeje";
            header('Location: http://localhost/projektPhp/wordsly/user/login/login.php');
        }else{
          echo "ERROR: Could not execute myself"."</br>" . mysqli_error($conn);
        }}
      }
      }


   if($_POST['user'] == "teacher"){
    //echo "teacher";
    if(mysqli_query($conn, $sqlTeacher)){
      //echo "ok";
        header('Location: http://localhost/projektPhp/wordsly/user/login/login.php');

    }else{
      echo "ERROR: Could not execute myself"."</br>" . mysqli_error($conn);

    }}}


  //logowanie kolejno student, teacher, admin
  if(isset($_POST['loginButton'])){
    //echo "lol";
    if(!empty($_POST['login'])&&!empty($_POST['password'])){
      $login = $_POST['login'];
      $password=$_POST['password'];
      $studentLogin = "SELECT `studentLogin`, `studentPassword` FROM `students`";
      $teacherLogin = "SELECT `teacherLogin`, `teacherPassword` FROM `teachers`";
      $adminLogin = "SELECT `username`, `userpassword` FROM `admin`";

      $resultT = mysqli_query($conn, $teacherLogin);
      $resultS = mysqli_query($conn, $studentLogin);
      $resultA = mysqli_query($conn, $adminLogin);
      while($row = mysqli_fetch_assoc($resultS)){
        // echo $row["studentLogin"];

        if($login == $row["studentLogin"]){
          if($password == $row["studentPassword"]){
            header("location: ../student/index.php");
          }
        }else if($row = mysqli_fetch_assoc($resultT)){
          if($login == $row["teacherLogin"]){
            if($password == $row["teacherPassword"]){
              header("location: ../teacher/index.php");
        }
      }
    } if($row = mysqli_fetch_assoc($resultA)){
      if($login == $row["username"]){
        if($password == $row["userpassword"]){
          echo "ok";
          header("location: ../admin/index.php");
    }
  }
}

}}}

  //sprawdzenie czy login jest juz w bazie
    ?>
