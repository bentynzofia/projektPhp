<?php
session_start();
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

//aaa

  $sqlStudent = "INSERT INTO `students`(`studentId`, `studentLogin`, `studentPassword`, `studentEmail`) VALUES ('','$login','$password','$email')";
 $sqlTeacher = "INSERT INTO `teachers`(`teacherId`, `teacherLogin`, `teacherEmail`, `teacherPassword`) VALUES ('','$login','$email', '$password')";

  if($_POST['user'] == "student"){
    $filtr = 0;

      $studentLoginCheck = "SELECT `studentLogin` FROM `students` WHERE  `studentLogin`= '$login'";
      $resultSC = mysqli_query($conn, $studentLoginCheck);
      $row1 = mysqli_fetch_assoc($resultSC);

      $studentEmailCheck = "SELECT `studentEmail` FROM `students` WHERE `studentEmail`='$email'";
      $resultSEC = mysqli_query($conn, $studentEmailCheck);
      $row2 = mysqli_fetch_assoc($resultSEC);

      if($row1['studentLogin'] !== $login && $row2['studentEmail'] !== $email ){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){

          if(mysqli_query($conn, $sqlStudent)){
              header('Location: ../login/login.php');
          }else{
            echo "ERROR: Could not execute myself"."</br>" . mysqli_error($conn);
          }
        }else{
          $filtr = 1;
        }
        }
      }



   if($_POST['user'] == "teacher"){
     $filtr = 0;

     $teacherLoginCheck = "SELECT `teacherLogin` FROM `teachers` WHERE  `teacherLogin`= '$login'";
     $resultTC = mysqli_query($conn, $teacherLoginCheck);
     $row1 = mysqli_fetch_assoc($resultTC);

     $teacherEmailCheck = "SELECT `teacherEmail` FROM `teachers` WHERE `teacherEmail`= '$email'";
     $resultTEC = mysqli_query($conn, $teacherEmailCheck);
     $row2 = mysqli_fetch_assoc($resultTEC);

     if($row1['teacherLogin'] !== $login && $row2['teacherEmail'] !== $email){
       //echo "teacher";
       if(filter_var($email, FILTER_VALIDATE_EMAIL)){
         $_SESSION['login'] = $login;
         $_SESSION['password'] = $password;
         $_SESSION['email'] = $email;
         if(mysqli_query($conn, $sqlTeacher)){
           //echo "ok";
             header('Location: ../login/login.php');

         }else{
           echo "ERROR: Could not execute myself"."</br>" . mysqli_error($conn);

         }
       }else{
         $filtr = 1;
       }
       }
     }
  }}


  //logowanie kolejno student, teacher, admin
  if(isset($_POST['loginButton'])){
    //echo "lol";
    if(!empty($_POST['login'])&&!empty($_POST['password'])){
      $login = $_POST['login'];
      $password=$_POST['password'];
      $studentLogin = "SELECT `studentLogin`, `studentPassword` FROM `students`";
      $teacherLogin = "SELECT `teacherLogin`, `teacherPassword` FROM `teachers`";
      $adminLogin = "SELECT `username`, `userpassword` FROM `admin`";

      $_SESSION['login'] = $login;
      $_SESSION['password'] = $password;

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

    ?>
