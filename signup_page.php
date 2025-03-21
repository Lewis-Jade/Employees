<?php
require_once('dbh.inc.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data and sanitize inputs
    $firstname = htmlspecialchars(trim($_POST['firstname']));
    $lastname = htmlspecialchars(trim($_POST['lastname']));
    $email = htmlspecialchars(trim($_POST['email']));
    $gender = htmlspecialchars(trim($_POST['gender']));
    $passwd = htmlspecialchars(trim($_POST['passwd']));
    $cnf_passwd = htmlspecialchars(trim($_POST['conf_pwd']));

    if($passwd !== $cnf_passwd){

        $_SESSION['status']  = "Passwords do not match";
        header("Location:  ./signup.php");
        die();

    }
    $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0){
            $_SESSION['status']="User already exists!";
            header("Location: signup.php");
            die();
        }

    // Validate that all fields are filled
    if (empty($firstname) || empty($lastname) || empty($gender) || empty($passwd)) {
        $message = "All fields are required!";
    } else {
        // Encrypt the password
        $hashed_password = password_hash($passwd, PASSWORD_DEFAULT);

        // Insert into the database
        $sql = "INSERT INTO users (firstname, lastname, gender, passwd,email) VALUES ('$firstname', '$lastname', '$gender', '$hashed_password','$email')";

        if ($conn->query($sql) === TRUE) {
           

            $_SESSION['status'] = "User signed up successfully!";
            header("Location: signup.php");
            die();

        } else {
            $message = "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
