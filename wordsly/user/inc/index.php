<?php

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../css/user/main.css">
    <title></title>
  </head>
  <body>
    <div class="content">
      <div class="text">
        <h3 class="logo">
          wordsly
        </h3>
        <p class="greeting">
          hi there   <?php
            echo $_SESSION['login'];
            ?>
        </p>
      </div>
