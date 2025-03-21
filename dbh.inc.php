<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'empdatabase';

$conn = mysqli_connect($servername,$username,$password,$dbname);

if(mysqli_connect_error()){
   echo "Connected to databse succesfully";
}

