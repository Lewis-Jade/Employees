<?php
// Database connection

require_once('dbh.inc.php');

// Check if 'id' is passed in the URL
if (isset($_GET['id'])) {
    $employeeId = intval($_GET['id']); // Sanitize input to prevent SQL injection
    $sql = "DELETE FROM emps WHERE id = $employeeId";

    if ($conn->query($sql) === TRUE) {

        $_SESSION['status']="Employee deleted successfully.";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "No employee ID provided.";
}

// Close connection
$conn->close();

// Redirect back to the main page
header("Location: employee_Management.php");
exit;
?>
