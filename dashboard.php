<?php
session_start();
require_once('dbh.inc.php');
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management System Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="main">

  
 
        <header>
        <?php

 
       $userid =  $_SESSION['user_id'] ;
      if(isset($_SESSION['firstname'])){

          echo "<p  id='para'>  Welcome ".$_SESSION['firstname']."</p>";

      }
   
   
   ?>
            
                <ul>
                    <li>
                     <li><a href="#">Profile</a></li>
               
                    <li><a href="leave_request.php">Leave Requests</a></li>
                    <li><a href="test.php">Training Sessions</a></li>
                   
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            
        </header>
       
       <main>
       
            <button  id="btn">View Profile</button>
          
 
            
            <button id="edit">Edit Profile</button>
            <?php
            
            if(isset( $_SESSION['success'] )){

                echo '<strong   id="success">'. $_SESSION['success'] .'</strong>';

                unset( $_SESSION['success'] );
            }
        
        
        
        ?>
    

       
       </main>
       
       <div class="view" id="view-prof">
              <div class="view-profile">
     
              
              <h3  id="quit">❌</h3>

              <h4>Employee profile</h4>

                <?php
                
                $sql = "SELECT  firstname,lastname,gender,email FROM users WHERE userid = '$userid' ";

                $result = $conn->query($sql);

                if($result){


                    $row = $result->fetch_assoc();
                    echo '<p  class="info">  <strong>firstname :  </strong>  '.$row['firstname'].'</p>';
                    echo '<br>';
                    echo '<p  class="info"><strong>lastname:    </strong>     '.$row['lastname'].'</p>';
                    echo '<br>';
                    echo '<p  class="info"> <strong>Gender :    </strong>    '.$row['gender'].'</p>';
                    echo '<br>';
                    echo '<p  class="info"> <strong>Email :    </strong>    '.$row['email'].'</p>';
                
          
                }
                
                
                ?>



              </div>
              
          </div>
  
    </div>
   
      <section  class='edit'  id="show-edit">
    
      <form action="editProfile.php"  method="POST">
      <h3  id="exit">❌</h3>
   
          <h1>Edit profile</h1>
          <input type="text" name="firstname" placeholder="firstname">
          <input type="text" name="lastname" placeholder="lastname">
          <input type="email" name="email" placeholder="email">
            <label for="">Gender</label>
            <div class="box">
            <label for="">Male</label>
            <input type="radio" name="gender"  value="Male" >
            <label for="">Female</label>
            <input type="radio" name="gender"  value="Female" >
            </div>
            <input type="submit" name="submit" value="Save">

        
      </form>
      </section>
 
      

 

</body>
<script src="script.js"></script>


</html>
