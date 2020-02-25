<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '', 'wrdsly');

if ($conn===false) {
    die("Błąd połączenia: " . mysqli_connect_error());
}
?>
