<?php
require_once('dbh.inc.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data and sanitize inputs
    $firstname = htmlspecialchars(trim($_POST['firstname']));
    $lastname = htmlspecialchars(trim($_POST['lastname']));
    $email = htmlspecialchars(trim($_POST['email']));
    $gender = htmlspecialchars(trim($_POST['gender']));
    $passwd = trim($_POST['passwd']);
    $cnf_passwd = htmlspecialchars(trim($_POST['conf_pwd']));

    if($passwd !== $cnf_passwd){

        $_SESSION['status']  = "Passwords do not match";
        header("Location: admin_signup.php");
        die();

    }
    $sql = "SELECT * FROM admin WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0){
            $_SESSION['status']="User already exists!";
            header("Location: admin_signup.php");
            die();
        }

    // Validate that all fields are filled
    if (empty($firstname) || empty($lastname) || empty($gender) || empty($passwd)) {
        $message = "All fields are required!";
    } else {
        // Encrypt the password
      

        // Insert into the database
        $sql = "INSERT INTO admin (firstname, lastname,password,gender,email) VALUES ('$firstname', '$lastname', '$passwd','$gender','$email')";

        if ($conn->query($sql) === TRUE) {
           

            $_SESSION['status'] = "Admin signed up successfully!";
            header("Location: admin_signup.php");
            die();

        } else {
            $message = "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
