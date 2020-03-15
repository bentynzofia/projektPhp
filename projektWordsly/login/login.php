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
    $passwordH = PASSWORD_HASH($password, PASSWORD_DEFAULT);

    $studentLogin = "SELECT `studentLogin` FROM `students`";
    $studentPass = "SELECT `studentPass` FROM `students`";

    $teacherLogin = "SELECT `teacherLogin` FROM `teachers`";
    $teacherPass = "SELECT `teacherPass` FROM `teachers`";

    $adminLogin = "SELECT `adminLogin` FROM `admin`";
    $adminPass = "SELECT `adminPass` FROM `admin`";

    $_SESSION['login'] = $login;
    $_SESSION['password'] = $password;
    

    $resultT = mysqli_query($conn, $teacherLogin);
    $resultTp = mysqli_query($conn, $teacherPass);

    $resultS = mysqli_query($conn, $studentLogin);
    $resultSp = mysqli_query($conn, $studentPass);

    $resultA = mysqli_query($conn, $adminLogin);
    $resultAp = mysqli_query($conn, $adminPass);

    while($row = mysqli_fetch_assoc($resultS)){
      // echo $row["studentLogin"];

      if($login == $row["studentLogin"]){
        while($row2 = mysqli_fetch_assoc($resultSp)){
          if(password_verify($password, $passwordH)){
          header("location: ../user/student.php");

        }
        }

      }
      while($row = mysqli_fetch_assoc($resultT)){

        if($login == $row["teacherLogin"]){{
          while($row2 = mysqli_fetch_assoc($resultTp)){
            if(password_verify($password, $passwordH)){
            header("location: ../user/teacher.php");
          }
          }

        }

      }
    }
    while($row = mysqli_fetch_assoc($resultA)){

    if($login == $row["adminLogin"]){{
      while($row2 = mysqli_fetch_assoc($resultAp)){
        if($password == $row2["adminPass"]){
        header("location: ../user/admin.php");
      }
      }

    }

  }
}


    }
  }
}

 ?>
