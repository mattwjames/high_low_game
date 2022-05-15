<?php
 $servername = "localhost";
 $username = "game";
 $password = "game";
 $dbname = "num_game";

 $conn = new mysqli($servername, $username, $password, $dbname);
 // Check connection
 if ($conn -> connect_errno) {
    echo "Failed to connect to MySQL: " . $conn -> connect_error;
    exit();
}
 ?> 