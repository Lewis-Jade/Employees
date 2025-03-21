<?php
session_start();


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin signup</title>
     <link rel="stylesheet" href="admin.css">
</head>
<body>
<form action="adminpage.php" method="POST">
        <h3>Sign Up</h3>
        <input type="text" placeholder="Firstname" name="firstname" required>
        <input type="text" placeholder="Lastname" name="lastname" required>
        <input type="email"  name="email"  placeholder="email" required>
        <p id="gen">Gender</p>
       <div class="gender">
       
       <label for="">Male</label>
        <input type="radio" name="gender" value="male" required>
        <label for="">Female</label>
        <input type="radio"  name="gender" value="Female" required>
       </div>
        <input type="password" placeholder="password" name="passwd" required>
        <input type="password"   name="conf_pwd" placeholder="confirm password" required>

        <input type="submit"  name="submit" value="Sign Up">
        <a href="adminlogin.php">Login</a>
        <?php
  if(isset($_SESSION['status'])){
      echo "<p>".$_SESSION['status'] ."</p>";
      unset($_SESSION['status'] );
  }
?>
    </form>
</body>
</html>