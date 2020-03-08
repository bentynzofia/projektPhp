<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '', 'wrdsy');

if ($conn===false) {
    die("Błąd połączenia: " . mysqli_connect_error());
}
?>
