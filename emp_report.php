<?php
require_once('dbh.inc.php');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM emps";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Report</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* General Styles */
body {
    font-family: Arial, sans-serif;
    background-image:url(theone.jpg);
        background-size:cover;
        background-blend-mode:multiply;
 
    background-color:rgba(244, 244, 249, 0.25);
    margin: 0;
    color:black;
    padding: 0;
}

.container {
    max-width: 1200px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

h1 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

/* Table Styles */
table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
}

th, td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #007BFF;
    color: white;
}

tr:hover {
    background-color: #f1f1f1;
}

/* Button Styles */
.download-btn {
    display: inline-block;
    padding: 12px 20px;
    margin-top: 20px;
    background-color: #007BFF;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    text-align: center;
    font-size: 16px;
}

.download-btn:hover {
    background-color: #0056b3;
}

p {
    text-align: center;
    font-size: 18px;
    color: #666;
}
/* General Body Styling */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f9;
}

/* Navbar Container */
.navbar {
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #007BFF;
    padding: 15px 0;
    margin: 0;
}

.navbar a {
    color: white;
    text-decoration: none;
    font-size: 18px;
    padding: 12px 20px;
    margin: 0 10px;
    background-color: #007BFF;
    border-radius: 5px;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.navbar a:hover {
    background-color: #0056b3;
    transform: scale(1.05); /* Slight zoom effect on hover */
}

.navbar a:active {
    background-color: #004085;
}

/* Add some responsive behavior */
@media (max-width: 768px) {
    .navbar {
        flex-direction: column;
        padding: 20px;
    }

    .navbar a {
        margin-bottom: 15px;
    }
}


    </style>
</head>
<body>
    <div class="container">
        <h1>Employee Report</h1>
        
        <?php if ($result->num_rows > 0) { ?>
            <table class="employee-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>firstname</th>
                        <th>lastname</th>
                        <th>Department</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php echo $row["first_name"]; ?></td>
                            <td><?php echo $row["last_name"]; ?></td>
                            <td><?php echo $row["job_role"]; ?></td>
                            <td><?php echo $row["created_at"]; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <p>No employee records found.</p>
        <?php } ?>

       
    </div>
     
    <div class="navbar">
    <a href="att_report.php">Attendance Report</a>
    <a href="salary_rpt.php">Salary Report</a>
    <a href="admin.php">Dashboard</a>
</div>

</body>
</html>

<?php
$conn->close();
?>
