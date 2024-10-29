<?php
$host = 'localhost';
$db = 'bank_mukhonde';
$user = 'root'; 
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

//Die the execution if the connection fails
if(!$conn){
    
    die(mysqli_error($conn));
}


?>
