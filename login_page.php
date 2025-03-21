<?php

session_start();
// Include the database connection
require_once('dbh.inc.php');

if (isset($_POST['submit'])) {
    // Get the firstname and password from the form
    $firstname = htmlspecialchars(trim($_POST['firstname']));
    $passwd = htmlspecialchars(trim($_POST['passwd']));

    // Check if both fields are filled
    if (empty($firstname) || empty($passwd)) {
        $message = "Both fields are required!";
    } else {
        // Prepare the SQL query to fetch the user
        $sql = "SELECT * FROM users WHERE firstname = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $firstname);
        $stmt->execute();
        $result = $stmt->get_result();
          
        // Check if the user exists
        if ($result->num_rows > 0) {

              
            $user = $result->fetch_assoc();
            // Verify the password
            if (password_verify($passwd, $user['passwd'])) {
              
           
                $_SESSION['user_id'] = $user['userid'];
                $_SESSION['firstname'] = $user['firstname'];
                // Redirect to another page, e.g., dashboard.php
                header("Location: dashboard.php");
                exit();
            } else {
                $_SESSION['error']="Incorrect password!";
                header("Location: Login.php");
                die();
            }
        } else {
            $_SESSION['error']="Incorrect password!";
            header("Location: Login.php");
            die();
        }
    } 
}


            