<?php

session_start();

if(isset($_POST['submit'])){

    $userid =  $_SESSION['user_id'] ;
require_once('dbh.inc.php');
  $firsname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $gender  = $_POST['gender'];
  $email = $_POST['email'];
   
   $query = "UPDATE  users SET firstname='$firsname',lastname='$lastname',gender='$gender',email='$email' WHERE userid=$userid  ";

   $result= $conn->query($query);

   if($result){

    $_SESSION['success'] = "Profile updated";

    header("Location:  dashboard.php");
    die();
   }


}