<?php
require_once("../func/connection.php");
$logfiltr = 0;
$emailfiltr = 0;

if(isset($_POST["registering"]) &&  $_POST['login'] && !empty($_POST['password']) &&! empty($_POST['email'])){
  $userType = $_POST['userType'];
  $login = $_POST['login'];
  $password=$_POST['password'];
  $email=$_POST['email'];


  $sqlStudent = "INSERT INTO `students`(`studentId`, `studentLogin`, `studentEmail`) VALUES ('','$login','$email')";
  $sqlTeacher = "INSERT INTO `teachers`(`teacherId`, `teacherLogin`, `teacherEmail`) VALUES ('','$login','$email')";


  if($userType=="student"){

    $studentLoginCheck = "SELECT `studentLogin` FROM `students`  WHERE  `studentLogin`= '$login'";
    $resultSC = mysqli_query($conn, $studentLoginCheck);
    $row1 = mysqli_fetch_assoc($resultSC);

    $studentEmailCheck = "SELECT `studentEmail` FROM `students` WHERE `studentEmail`='$email'";
    $resultSEC = mysqli_query($conn, $studentEmailCheck);
    $row2 = mysqli_fetch_assoc($resultSEC);



    if(!$row1){
      if(!$row2){
        mysqli_query($conn, $sqlStudent);
        header('Location: ../user/login.php');
      }else{
        $emailfiltr = 1;
      }
    }else{
      if(!$row2){
        $logfiltr = 1;
      }else{
        $logfiltr = 1;
        $emailfiltr = 1;
      }
    }

  }else if($userType =="teacher"){

    $teacherLoginCheck = "SELECT `teacherLogin` FROM `teachers`  WHERE  `teacherLogin`= '$login'";
    $resultTC = mysqli_query($conn, $teacherLoginCheck);
    $row1 = mysqli_fetch_assoc($resultTC);

    $teacherEmailCheck = "SELECT `teacherEmail` FROM `teachers` WHERE `teacherEmail`='$email'";
    $resultTEC = mysqli_query($conn, $teacherEmailCheck);
    $row2 = mysqli_fetch_assoc($resultTEC);

    $logfiltr = 0;
    $emailfiltr = 0;

    if(!$row1){
      if(!$row2){
        mysqli_query($conn, $sqlTeacher);
        header('Location: ../user/login.php');
      }else{
        $emailfiltr = 1;
      }
    }else{
      if(!$row2){
        $logfiltr = 1;
      }else{
        $logfiltr = 1;
        $emailfiltr = 1;
      }
    }

  }
}
 ?>
