<?php
 session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Employee</title>
    <link rel="stylesheet" href="signup.css">

    
</head>
<body>
  <section>
  <h1>Employee Management System</h1>
  <form action="signup_page.php" method="POST">
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
        <a href="Login.php">Login</a>
    
    </form>
    <?php
  if(isset($_SESSION['status'])){
      echo "<p>".$_SESSION['status'] ."</p>";
      unset($_SESSION['status'] );
  }
?>

  </section>

</body>
</html>
