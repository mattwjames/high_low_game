<?php
//this page gets the random number from the database then redirects to high_low.php
header('Location: high_low_form.php');
require "ConnectionInfo.php";
session_start();

$_SESSION['count'] = 1;
$query = "SELECT (guess) FROM Game WHERE id > 1";
$result = $conn->query($query);
$row = $result -> fetch_assoc();
$_SESSION["randomNum"] = $row['guess']; 

$result->close();
$conn->close();
?>