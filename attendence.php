<?php
// Database connection
require_once('dbh.inc.php');

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['markAttendance'])) {
    $employeeId = intval($_POST['employee_id']);
    $date = $_POST['date'];
    $status = $_POST['status'];

    // Check if attendance already marked
    $checkQuery = "SELECT * FROM attendance WHERE employee_id = $employeeId AND date = '$date'";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        echo "<p>Attendance already marked for this employee on $date.</p>";
    } else {
        $sql = "INSERT INTO attendance (empid, date, status) VALUES ($employeeId, '$date', '$status')";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Attendance marked successfully.</p>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
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
    <title>Mark Attendance</title>
    <link rel="stylesheet" href="styles.css">
    <style>
     @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
  *{
    padding:0;
    margin:0;
    font-family: "Poppins", sans-serif;

  }


        body{
            diplay:flex;
             color:#fff;
            flex-direction:column;
            background-image: url(theone.jpg);
            background-size: cover;
            background-blend-mode: multiply;
            background-color: rgba(0, 0, 255, 0.45);
        }
.employee-form {
    max-width: 500px;
    margin: 20px auto;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 8px;
    height:500px;
    background-color: #f9f9f9;

    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    font-family: Arial, sans-serif;
}

/* Form title styling */
h2 {
    text-align: center;
    color:#fff;
    margin-bottom: 20px;
    font-size: 24px;
}

/* Label styling */
.employee-form label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    color: #000;
}

/* Input and select styling */
.employee-form input,
.employee-form select {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
    outline: none;
    box-sizing: border-box;
}

/* Focus effect for inputs */
.employee-form input:focus,
.employee-form select:focus {
    border-color: #4CAF50;
    box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
}

/* Submit button styling */
.employee-form button {
    background-color: #4CAF50;
    color: white;
    padding: 10px 15px;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
    width: 100%;
}

.employee-form button:hover {
    background-color: #45a049;
    transform: scale(1.02);
}

/* Feedback messages styling */
.employee-form p {
    text-align: center;
    color: #4CAF50;
    font-size: 16px;
    font-weight: bold;
    margin-top: 10px;
}

/* Aligning the form centrally */
body {
    background-color: #f3f3f3;
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
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
    <h2>Mark Attendance</h2>
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

        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required>

        <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="Present">Present</option>
            <option value="Absent">Absent</option>
            <option value="Leave">Leave</option>
        </select>

        <button type="submit" name="markAttendance">Mark Attendance</button>

        <a href="view_attendance.php">view attendence</a>
        <a href="admin.php">Dashboard</a>
    </form>
</body>
</html>
