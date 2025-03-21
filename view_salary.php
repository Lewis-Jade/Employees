<?php
// Database connection
require_once('dbh.inc.php');

// Fetch salary records with unique aliases
$salaries = $conn->query("
    SELECT 
        s.id AS salary_id,
        e.first_name AS employee_first_name,
        e.last_name AS employee_last_name,
        s.basic_salary,
        s.allowances,
        s.deductions,
        s.net_salary,
        s.created_at
    FROM salaries s
    INNER JOIN emps e ON s.id = e.id
    ORDER BY s.created_at DESC
");

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Salaries</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f8f9fa;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            color:#000;
        }

        table th {
            background-color: #007bff;
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #ddd;
        }

        .no-data {
            text-align: center;
            color: #777;
        }
    </style>
</head>
<body>
    <h2>Salary Records</h2>
    <table>
        <thead>
            <tr>
                <th>Employee Name</th>
                <th>Basic Salary</th>
                <th>Allowances</th>
                <th>Deductions</th>
             
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($salaries->num_rows > 0): ?>
                <?php while ($row = $salaries->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['employee_first_name'] . ' ' . $row['employee_last_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['basic_salary']); ?></td>
                        <td><?php echo htmlspecialchars($row['allowances']); ?></td>
                        <td><?php echo htmlspecialchars($row['deductions']); ?></td>
                        
                        <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">No salary records found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <a href="add_salary.php">back</a>
</body>
</html>
