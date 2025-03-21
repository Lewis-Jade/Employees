<?php
// Database connection
require_once('dbh.inc.php');

// Get employee details
if (isset($_GET['id'])) {
    $employeeId = intval($_GET['id']);
    $result = $conn->query("SELECT * FROM emps WHERE id = $employeeId");

    if ($result->num_rows > 0) {
        $employee = $result->fetch_assoc();
    } else {
        die("Employee not found.");
    }
}

// Update employee details
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $jobRole = $_POST['jobRole'];
    $salary = $_POST['salary'];

    $sql = "UPDATE emps SET first_name = '$firstName', last_name = '$lastName', job_role = '$jobRole', salary = '$salary' WHERE id = $employeeId";

    if ($conn->query($sql) === TRUE) {
    
        $_SESSION['status']="Employee updated successfully.";
        header("Location: employee_Management.php"); // Redirect back to the main page
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Edit Employee</h2>
    <form method="POST" class="employee-form">
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" value="<?php echo htmlspecialchars($employee['first_name']); ?>" required>

        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" value="<?php echo htmlspecialchars($employee['last_name']); ?>" required>

        <label for="jobRole">Job Role:</label>
        <input type="text" id="jobRole" name="jobRole" value="<?php echo htmlspecialchars($employee['job_role']); ?>" required>

        <label for="salary">Salary:</label>
        <input type="number" id="salary" name="salary" value="<?php echo htmlspecialchars($employee['salary']); ?>" required>

        <button type="submit">Update Employee</button>
    </form>
</body>
</html>
