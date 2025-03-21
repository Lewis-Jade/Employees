<?php
// Database connection
require_once('dbh.inc.php');

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addSalary'])) {
    $employeeId = intval($_POST['employee_id']);
    $basicSalary = floatval($_POST['basic_salary']);
    $allowances = floatval($_POST['allowances']);
    $deductions = floatval($_POST['deductions']);

    $sql = "INSERT INTO salaries (id, basic_salary, allowances, deductions)
            VALUES ($employeeId, $basicSalary, $allowances, $deductions)";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Salary details added successfully.</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Get employees
$employees = $conn->query("SELECT * FROM emps");

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Salary</title>
    <link rel="stylesheet" href="styles.css">
    
    <link rel="stylesheet" href="styles.css">
    <style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f9;
    color: #333;
    display: flex;
    flex-direction:column;
    justify-content: center;
    align-items: center;
    background-image:url(theone.jpg);
        background-size:cover;
        background-blend-mode:multiply;
        background-color: rgba(32, 32, 221, 0.51);
    min-height: 100vh;
}

h2 {
    text-align: center;
    color: #007bff;
    margin-bottom: 20px;
    position: absolute;
}

.employee-form {
    width: 100%;
    max-width: 500px;
    padding: 20px;
    background: #fff;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.employee-form label {
    font-weight: bold;
    margin-bottom: 5px;
}

.employee-form input,
.employee-form select,
.employee-form button,
.employee-form a {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

.employee-form input:focus,
.employee-form select:focus {
    border-color: #007bff;
    outline: none;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

.employee-form button {
    background-color: #007bff;
    color: #fff;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s;
}

.employee-form button:hover {
    background-color: #0056b3;
}

.employee-form a {
    display: inline-block;
    text-align: center;
    background-color: #6c757d;
    color: #fff;
    text-decoration: none;
    padding: 10px 0;
    margin-top: 10px;
    transition: background-color 0.3s;
}

.employee-form a:hover {
    background-color: #5a6268;
}

    </style>


</head>
<body>
    <h2>Add Salary</h2>
    <form method="POST" class="employee-form">
        <label for="employee_id">Select Employee:</label>
        <select id="employee_id" name="employee_id" required>
            <option value="">-- Select Employee --</option>
            <?php while ($row = $employees->fetch_assoc()): ?>
                <option value="<?php echo $row['id']; ?>">
                    <?php echo htmlspecialchars($row['first_name'] . ' ' . $row['last_name']); ?>
                </option>
            <?php endwhile; ?>
        </select>

        <label for="basic_salary">Basic Salary:</label>
        <input type="number" id="basic_salary" name="basic_salary" step="0.01" required>

        <label for="allowances">Allowances:</label>
        <input type="number" id="allowances" name="allowances" step="0.01" required>

        <label for="deductions">Deductions:</label>
        <input type="number" id="deductions" name="deductions" step="0.01" required>

        <button type="submit" name="addSalary">Add Salary</button>
        <a href="view_salary.php">View salary</a>
        <a href="admin.php">back</a>
    </form>
</body>
</html>
