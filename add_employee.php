<?php
require_once("dbh.inc.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addEmployee'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $jobRole = $_POST['jobRole'];
    $salary = $_POST['salary'];

    // Insert into the employees table
    $sql = "INSERT INTO emps (first_name, last_name, job_role, salary) 
            VALUES ('$firstName', '$lastName', '$jobRole', '$salary')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>.</p>";
        $_SESSION['status'] ="Employee added successfully";
        header("Location: employee_management.php ");
        die();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add employee</title>
</head>
<style>
    /* General styling for the form */
.employee-form {
    max-width: 500px;
    margin: 20px auto;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background-color: #f9f9f9;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    font-family: Arial, sans-serif;
}

/* Label styling */
.employee-form label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    color: #333;
}

/* Input styling */
.employee-form input {
    width: calc(100% - 20px); /* To fit inside the form nicely with padding */
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
    outline: none;
    box-sizing: border-box;
}

.employee-form input:focus {
    border-color: #4CAF50;
    box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
}

/* Button styling */
.employee-form button {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    display: block;
    width: 100%;
}

.employee-form button:hover {
    background-color: #45a049;
}

/* Form container alignment */
.employee-form {
    text-align: left;
}
/* Styling for the Back Link */
a {
    display: inline-block;
    padding: 12px 20px;
    background-color: #007BFF;
    color: white;
    font-size: 16px;
    text-align: center;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease, transform 0.3s ease;
    margin-top: 20px; /* Adds space above the link */
}

a:hover {
    background-color: #0056b3;
    transform: scale(1.05); /* Slightly increase size on hover for effect */
}

a:focus {
    outline: none; /* Removes focus outline */
}

a:active {
    background-color: #004085; /* Darker blue when clicked */
}


</style>
<body>
<form method="POST" class="employee-form">
    <label for="firstName">First Name:</label>
    <input type="text" id="firstName" name="firstName" required>

    <label for="lastName">Last Name:</label>
    <input type="text" id="lastName" name="lastName" required>

    <label for="jobRole">Job Role:</label>
    <input type="text" id="jobRole" name="jobRole" required>

    <label for="salary">Salary:</label>
    <input type="number" id="salary" name="salary" required>

    <button type="submit" name="addEmployee">Add Employee</button>
    <a href="employee_management.php">back</a>
</form>

</body>
</html>