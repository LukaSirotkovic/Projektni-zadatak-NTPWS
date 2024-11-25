<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "registracija";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Konekcija neuspješna: " . $conn->connect_error);
}
?>
