<?php
// Database connection
require_once('dbh.inc.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addEmployee'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $jobRole = $_POST['jobRole'];
    $salary = $_POST['salary'];

    $sql = "INSERT INTO emps(first_name, last_name, job_role, salary) VALUES ('$firstName', '$lastName', '$jobRole', '$salary')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Employee added successfully.</p>";
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
    <title>Employee Management</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Employee Management</h2>
    <form  action="add_employee.php" method="POST" class="employee-form">
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" required>

        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" required>

        <label for="jobRole">Job Role:</label>
        <input type="text" id="jobRole" name="jobRole" required>

        <label for="salary">Salary:</label>
        <input type="number" id="salary" name="salary" required>

        <button type="submit" name="addEmployee">Add Employee</button>
    </form>
    <div class="employee-list">
        <h3>Employee List</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Job Role</th>
                    <th>Salary</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM emps");

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['first_name'] . "</td>";
                        echo "<td>" . $row['last_name'] . "</td>";
                        echo "<td>" . $row['job_role'] . "</td>";
                        echo "<td>" . $row['salary'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No employees found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
