<?php
session_start();
require_once('dbh.inc.php');// Database connection

// Get leave request data from the form
$employee_id = mysqli_real_escape_string($conn, $_POST['employee_id']);
$leave_type = mysqli_real_escape_string($conn, $_POST['leave_type']);
$start_date = mysqli_real_escape_string($conn, $_POST['start_date']);
$end_date = mysqli_real_escape_string($conn, $_POST['end_date']);
$status = 'Pending'; // Initial status is Pending

// Check if the employee exists
$sql = "SELECT id FROM emps WHERE id = '$employee_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    // Employee exists, insert leave request
    $sql = "INSERT INTO leave_records (employee_id, leave_type, start_date, end_date, status) 
            VALUES ('$employee_id', '$leave_type', '$start_date', '$end_date', '$status')";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] ="Leave request submitted successfully!";
        header("Location: leave_request.php");
        die();
    } else {
        echo "Error: " . mysqli_error($conn);
        header("Location: leave_request.php");
        die();
    }
} else {
    $_SESSION['message']= "Invalid Employee ID. Please check and try again.";
    header("Location: leave_request.php");
    die();
}
?>
