<?php
ob_start();
session_start();
require_once('dbh.inc.php');

if (isset($_POST['submit'])) {
    // Sanitize input
    $email = htmlspecialchars(trim($_POST['email']));
    $passwd = trim($_POST['passwd']);

    // Prepare SQL query to fetch the user
    $sql = "SELECT * FROM admin WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the user exists
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();




        if ($passwd  ===  $user['password']) {
            $_SESSION['admin_id'] = $user['adminID'];
            $_SESSION['username'] = $user['firstname'];  // Store session data
            header("Location: admin.php");
            exit();  // Always exit after header redirect
        } else {
            $_SESSION['error']="Incorrect password!";
            header("Location: adminlogin.php");
            die();
        }
    } else {
        $_SESSION['error']="user not found!";
        header("Location: adminlogin.php");
        die();
    }
}
