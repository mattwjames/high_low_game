<?php
require "ConnectionInfo.php";
session_start();

function resetData($conn){
    $query = "DELETE FROM game WHERE id > 1";
    $conn->query($query);
    $conn->close();
    unset($_SESSION);
}

if(isset($_POST['sub'])){
    $_SESSION['guessNum']= $_POST['guessNum'];
}
//I give up button was clicked
if(isset($_POST['btnSubmit'])){
    resetData($conn);
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
    <body>
        <?php //guessed correctly reset
        if($_SESSION['guessNum'] == $_SESSION['randomNum']){
            echo "<h1>You guessed correctly! It took you " .$_SESSION['count'] . " time to get the correct answer<h1>";
            resetData($conn);
            echo "<h2><a href='index.php'>Start Over</a></h2>";
        }
        //incorrect guess
        else{ 
            if($_SESSION['guessNum'] > $_SESSION['randomNum']){
                echo "<h1>".$_SESSION['name']. " ". $_SESSION['guessNum']. " is to high</h1>";
            }
            else{
                echo "<h1>".$_SESSION['name']. " ". $_SESSION['guessNum']. " is to low</h1>";
            }
            $_SESSION['count']++;?>

            <form action="high_low_form.php" method="post">
            Enter another guess:<br>
            <input type="text" name="guessNum">
            <input type="submit" name="sub">


            <button type="submit" name="btnSubmit">I give up</button>
            </form>
            <?php

           
        }?>
        
    </body>
</html>