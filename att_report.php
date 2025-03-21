<?php
require_once('dbh.inc.php');

// SQL query to fetch data from both emps and attendance tables
$sql = "
    SELECT emps.first_name, emps.last_name, emps.job_role, emps.salary, attendance.date, attendance.status 
    FROM attendance
    JOIN emps ON attendance.employee_id = emps.id
";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Report</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* General Body Styling */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f7fc;
    background-image:url(theone.jpg);
        background-size:cover;
        background-blend-mode:multiply;
        background-color: rgb(243, 243, 243);
    margin: 0;
    padding: 0;
}

/* Container Styling */
.container {
    max-width: 1200px;
    margin: 50px auto;
    padding: 30px;
    background-color:#fff;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

/* Header Styling */
h1 {
    text-align: center;
    color: #333;
    font-size: 28px;
    margin-bottom: 30px;
}

/* Table Styling */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    padding: 15px 20px;
    text-align: left;
    border-bottom: 2px solid #f2f2f2;
    color:#000;
}

th {
    background-color: #007BFF;
    color: white;
    font-size: 16px;
    text-transform: uppercase;
}

td {
    color: #555;
    font-size: 15px;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

tr:hover {
    background-color: #f1f1f1;
}

/* No Records Message Styling */
p {
    text-align: center;
    font-size: 18px;
    color: #888;
    margin-top: 20px;
}

/* Button Styling */
.download-btn {
    display: inline-block;
    padding: 12px 20px;
    margin-top: 30px;
    background-color: #28a745;
    color: white;
    font-size: 16px;
    text-align: center;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.download-btn:hover {
    background-color: #218838;
}

/* Responsive Design */
@media (max-width: 768px) {
    table, th, td {
        font-size: 14px;
        padding: 10px;
    }

    h1 {
        font-size: 24px;
    }

    .container {
        padding: 20px;
    }

    .download-btn {
        font-size: 14px;
        padding: 10px 15px;
    }
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
    <div class="container">
        <h1>Employee Attendance Report</h1>
        
        <?php if ($result->num_rows > 0) { ?>
            <table class="attendance-table">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Job Role</th>
                    
                        <th>Attendance Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row["first_name"]; ?></td>
                            <td><?php echo $row["last_name"]; ?></td>
                            <td><?php echo $row["job_role"]; ?></td>
                            <td><?php echo $row["date"]; ?></td>
                            <td><?php echo $row["status"]; ?></td>
                        
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <p>No attendance records found.</p>
        <?php } ?>

    </div>

    <a href="emp_report.php">back</a>

</body>
</html>

<?php
$conn->close();
?>
