<?php
require "ConnectionInfo.php"; //contains info to connect to the database
session_start();
$_SESSION = $_POST;

$name = '';
$guessNum = '';

if(count($_POST)>0){
    //redirect to get_num_db.php if user filled out name and guessed a number
    if(($_POST['name'] != "") && ($_POST['guessNum'] != "")){
        header("Location: get_num_db.php");
        //Insert number into database
        $randNum = rand(1,100);  
        $query = "INSERT INTO game(guess) Values($randNum)";
        $conn->query($query);
        $conn->close();
    }
    //pre fill inputs values attribute in case form wasn't filled out completly
    $name = $_POST['name'];
    $guessNum = $_POST['guessNum'];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Number guessing game</title>
    </head>
    <body>
        <h1>Welcome to the number guessing game!</h1>
        <form action = "index.php" method="post">
            Enter your name:<br>
            <input type="text" name="name" value="<?php 
            echo "$name";?>"><br>
            Guess a number between 1-100:<br>
            <input type="text" name="guessNum" value="<?php 
            echo "$guessNum";?>"><br><br>
            <input type="submit" name="submit">
        </form>
    </body>
</html>