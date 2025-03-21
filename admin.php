<?php

session_start();


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin panel</title>
    <link rel="stylesheet" href="adminPanel.css">
</head>
<body>
  <section>
    <header>
 
    <h1>The Admin Panel</h1>
    <form action="adminLogout.php"  method="POST">
    <button  type="submit"><a href="adminlogin.php"id="logout">Logout</a></button>
</form>
    
    </header>
  <ul>
  <li> <a href="employee_management.php">Employee Management</a></li>
<li><a href="add_salary.php">Salary Management</a></li>
<li><a href="emp_report.php">Reports</a></li>
<li><a href="attendence.php">Attendance</a></li>
  </ul>
 
  </section>
</body>
 
</html>