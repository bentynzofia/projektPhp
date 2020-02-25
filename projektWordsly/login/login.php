<?php
require_once("../func/connection.php");

if(isset($_POST['button'])) {
  header('Location: signin.php');
}

if(isset($_POST['loginButton'])){
  //echo "lol";
  if(!empty($_POST['login'])&&!empty($_POST['password'])){
    $login = $_POST['login'];
    $password=$_POST['password'];
    $studentLogin = "SELECT `studentLogin` FROM `students`";
    $teacherLogin = "SELECT `teacherLogin` FROM `teachers`";
    $adminLogin = "SELECT `username` FROM `admin`";

    $_SESSION['login'] = $login;
    $_SESSION['password'] = $password;

    $resultT = mysqli_query($conn, $teacherLogin);
    $resultS = mysqli_query($conn, $studentLogin);
    $resultA = mysqli_query($conn, $adminLogin);
    while($row = mysqli_fetch_assoc($resultS)){
      // echo $row["studentLogin"];

      if($login == $row["studentLogin"]){

          header("location: ../user/student.php");
        }else if($row = mysqli_fetch_assoc($resultT)){
        if($login == $row["teacherLogin"]){

            header("location: ../user/teacher.php");
      }
    }


}}}

 ?>
