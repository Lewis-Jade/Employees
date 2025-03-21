<?php
// Database connection
require_once('dbh.inc.php');

// Fetch attendance records
$attendance = $conn->query("
    SELECT a.date, a.status, e.first_name, e.last_name 
    FROM attendance a
    INNER JOIN emps e ON a.employee_id = e.id
    ORDER BY a.date DESC
");

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Attendance</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* General styling for the page */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f9;
    color: #333;
    display: flex;
    flex-direction:column;
}

/* Container for the content */
h2 {
    text-align: center;
    margin-top: 20px;
    color: #444;
}

/* Table styling */
table {
    width: 80%;
    margin: 20px auto;
    border-collapse: collapse;
    background-color: #fff;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

table th, table td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: left;
}

table th {
    background-color: #4CAF50;
    color: white;
    font-weight: bold;
    text-transform: uppercase;
}

table tr:nth-child(even) {
    background-color: #f9f9f9;
}

table tr:hover {
    background-color: #f1f1f1;
}

table td {
    color: #555;
}

/* Centering text for empty records */
table tbody tr td[colspan] {
    text-align: center;
    color: #999;
    font-style: italic;
}

/* Styling for links */
a {
    text-decoration: none;
    color: #4CAF50;
}

a:hover {
    text-decoration: underline;
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
</head>
<body>
    <h2>Attendance Records</h2>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Employee Name</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($attendance->num_rows > 0): ?>
                <?php while ($row = $attendance->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['date']); ?></td>
                        <td><?php echo htmlspecialchars($row['first_name'] . ' ' . $row['last_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['status']); ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">No attendance records found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <a href="attendence.php">Attendance</a>
</body>
</html>
