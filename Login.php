<?php

session_start();


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>


@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
  *{
    padding:0;
    margin:0;
    font-family: "Poppins", sans-serif;

  }
        /* General Body Styling */
body {
 
    background-color: #f4f4f9;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction:column;
    justify-content: center;
    align-items: center;
    height: 100vh;
}
section{
    height:100%;
    width:100%;
     background-image:url(guard.jpg);
     background-size:cover;
     background-blend-mode:multiply;
     background-color: rgba(255, 11, 23, 0.27);
    display: flex;
    flex-direction:column;
    justify-content: center;
    align-items: center;
}


/* Form Container */
form {
    background:rgb(250, 21, 21);
    padding: 20px 30px;
    border-radius: 8px;
    box-shadow: 4px 4px 8px rgba(23, 25, 27, 0.47),
                 -4px -4px 8px rgba(13, 17, 20, 0.36);
    width: 100%;
    max-width: 400px;
    box-sizing: border-box;
}

/* Form Title */
h2 {
    text-align: center;
    color:white;
    margin-bottom: 20px;
    font-size: 24px;
}

/* Labels */
form label {
    display: block;
    margin-bottom: 5px;
    font-size: 14px;
    color: white;
}

/* Input Fields */
form input[type="text"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    box-sizing: border-box;
}

form input[type="text"]:focus {
    border-color: #007BFF;
    outline: none;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}
form input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    box-sizing: border-box;
}

form input[type="password"]:focus {
    border-color: #007BFF;
    outline: none;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

/* Submit Button */
form input[type="submit"] {
    width: 100%;
    padding: 12px;
    background-color: #007BFF;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    text-transform: uppercase;
    cursor: pointer;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

form input[type="submit"]:hover {
    background-color: #0056b3;
}


/* Responsive Design */
@media (max-width: 480px) {
    form {
        padding: 15px;
    }
}

p{
    color:white;
}
a{
    text-decoration:none;
    color:white;
}
h1{
    position: absolute;
    left:10px;
    top:20px;
    font-size:35px;
    color:#fff;
    border-radius:8px;
    color:white;
    font-size:50px;
    text-transform: uppercase;
    
}
    </style>
</head>
<body>
     <section>
      <h1>Employee Management System</h1>
    <form action="login_page.php" method="POST">
    <h2>Login</h2>
          <label for="">username</label>
        <input type="text" name="firstname" required>
          <label for="">password</label>
        <input type="password" name="passwd" required>

        <input type="submit"  name="submit" value="Login">
        <a href="signup.php">register</a>
     
    </form>
    <?php
      if(isset($_SESSION['error'])){

          echo "<p>".$_SESSION['error']."</p>";
          unset($_SESSION['error']);

      }
   
   
   ?>
 

     </section>

</body>
</html>