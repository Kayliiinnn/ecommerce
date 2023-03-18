<?php 
$servername ="localhost";
$username="root";
$password="";
$midterm="midterm";

$conn = mysqli_connect($servername, $username, $password, $midterm);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

include_once("sql_utilities.php");

 ?>